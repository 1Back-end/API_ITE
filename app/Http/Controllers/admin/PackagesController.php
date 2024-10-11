<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageAdvantage;
use App\Models\Setting;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index(Request $request)
    {
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }

        $packages = Package::orderBy('name','asc')->get();
        // $packages = Package::with('session')->where('session_id',active_session()->id)->orderBy('name','asc')->get();

        return view('admin.packages.index',['packages'=>$packages]);
    }

     public function packagesBySetting($id)
    {
        $packages = Package::where('setting_id',$id)->orderBy('name','asc')->get();

        return response([
            'success'=>1,
            'packages'=>$packages
        ]);
    }

    public function edit($id)
    {
        $package = Package::find($id);
        $settings = Setting::all();
        if ($package) {
            return view('admin.packages.edit',['package'=>$package,'settings' => $settings]);
        }
        return back()->with('error','Package not found');

    }

    public function create()
    {

        $settings = Setting::all();
        return view('admin.packages.create',['settings'=> $settings]);
    }

    // configure priorities here
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_fr' => 'required',
            'amount' => 'required',
            'type' => 'required',
            // 'short_description_en' => 'required',

        ]);

        $package = new Package();
        $package->name = [
            'en' => $request->name_en,
            'fr' => $request->name_fr,
        ];
        $package->amount = $request->amount;
        $package->type = $request->type;
        $package->short_description = [
            'en'=>$request->short_description_en,
            'fr'=>$request->short_description_fr,
        ];
        $package->save();

        for ($i=0; $i < 8; $i++) {
            if ($request->input('advantage_fr_'.$i)!= null) {
                # code...
                $advantage = new PackageAdvantage();
                $advantage->advantage = [
                    'en' =>$request->input('advantage_en_'.$i),
                    'fr' =>$request->input('advantage_fr_'.$i),
                ];

                $advantage->package_id = $package->id;
                $advantage->save();
            }
        }

        return redirect('/admin/packages')->with('status','');
    }

    // configure priorities here
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name_en' => 'required',
            'name_fr' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);

        $package = Package::with('advantages')->find($request->id);
        if ($package) {
            $package->name = [
                'en' => $request->name_en,
                'fr' => $request->name_fr,
            ];
            $package->amount = $request->amount;
            $package->type = $request->type;
            $package->short_description = [
                'en'=>$request->short_description_en,
                'fr'=>$request->short_description_fr,
            ];
            $package->save();

            foreach ($package->advantages as $ad) {
                $advantage = PackageAdvantage::find($ad->id);
                $advantage->advantage = [
                    'en' => $request->input('0advantage_en_'.$ad->id),
                    'fr' => $request->input('0advantage_fr_'.$ad->id),
                ];
                $advantage->save();
            }

            for ($i=0; $i < 8; $i++) {
                if ($request->input('advantage_fr_'.$i)!= null) {
                    # code...
                    $advantage = new PackageAdvantage();
                    $advantage->advantage = [
                        'en' =>$request->input('advantage_en_'.$i),
                        'fr' =>$request->input('advantage_fr_'.$i),
                    ];

                    $advantage->package_id = $package->id;
                    $advantage->save();
                }
            }

            return redirect('/admin/packages')->with('status','');
        }
        return back()->with('error','Unknown Package');
    }

    public function reusePackages()
    {
        # code...
    }

}
