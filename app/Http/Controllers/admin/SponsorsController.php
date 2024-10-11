<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    public function index(Request $request)
    {
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }

        $sponsors = Sponsor::orderBy('name', 'asc')->paginate(10); // Changez le nombre 10 selon vos besoins


        return view('admin.sponsors.index',['sponsors'=>$sponsors]);
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => "required",
            'logo' => "required",
        ]);

        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->website = $request->website;//chcek if it begins with http or not
        if ($request->hasFile('logo')) {
            // resize and upload
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $name=randomString(1).'.'.$ext;
            if($request->file('logo')->move(public_path('sponsors'),$name)){
                // resizeImg($name,'config/logos',177,35,$ext);
                $sponsor->logo = $name;
            }
            //
        }
        $sponsor->save();

        return redirect('/admin/sponsors')->with('status','Sponsor Added Successfully');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('admin.sponsors.edit',['sponsor'=>$sponsor]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'id' => "required",
            'name' => "required",
        ]);

        $sponsor = Sponsor::find($request->id);
        $sponsor->name = $request->name;
        $sponsor->website = $request->website;//chcek if it begins with http or not
        if ($request->hasFile('logo')) {
            // resize and upload
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $name=randomString(1).'.'.$ext;
            if($request->file('logo')->move(public_path('sponsors'),$name)){
                // resizeImg($name,'config/logos',177,35,$ext);
                $sponsor->logo = $name;
            }
            //
        }
        $sponsor->save();

        return redirect('/admin/sponsors')->with('status','Sponsor Updated Successfully');
    }


    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Sponsor::where('id',$request->id)->delete();
        return back()->with('status','Operation Successful');
    }
}
