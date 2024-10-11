<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index(Request $request)
    {
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }

        $settings = Setting::with('city')->get();

        return view('admin.settings.index',['settings'=>$settings]);
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        if ($setting) {
            return view('admin.settings.edit',['setting' => $setting]);
        }
        return back()->with('error','setting not found');

    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_slogan' => 'required',
            'city_id' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'logo' => 'required',
        ]);

        $setting = new Setting();
        $setting->company_name = $request->company_name;
        $setting->location = $request->location;
        $setting->company_email = $request->company_email;
        $setting->company_slogan = $request->company_slogan;
        $setting->city_id = $request->city_id;
        $setting->company_creation_date = $request->company_creation_date;
        $setting->statistics = [
            'projects' => $request->projects,
            'partners' => $request->partners,
            'clients' => $request->clients
        ];
        $setting->contact = [
            "phone" => $request->phone,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
            "pinterest" => $request->pinterest,
            "whatsapp" => $request->whatsapp,
            "linkedin" => $request->linkedin,
            "youtube" => $request->youtube,
            ];


        if ($request->hasFile('logo')) {
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $logo=randomString(1).'.'.$ext;
            if($request->file('logo')->move(public_path('config/logos'),$logo)){
                $setting->logo = $logo;
            }
        }

        if (Setting::count() == 0) {
            $setting->status = 1;
        }else{
            $setting->status = 0;
        }
        $setting->save();

        // create pages

        $page = new Page();
        $page->name = "HOME";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "SERVICES";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "PRODUCTS";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "ABOUT";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "PROJECTS";
        $page->setting_id = $setting->id;

        $page->save();

        $page = new Page();
        $page->name = "FAQ";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "TERMS";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "PRIVACY-POLICY";
        $page->setting_id = $setting->id;
        $page->save();

        $page = new Page();
        $page->name = "CONTACT";
        $page->setting_id = $setting->id;
        $page->save();

       $page = new Page();
        $page->name = "PRICING";
        $page->setting_id = $setting->id;
        $page->save();



        // if ($act_setting) {
        //     activateSetting($setting->id);
        // }


        return redirect('/admin/settings');
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'company_name' => 'required',
            'company_email' => 'required',
            'company_slogan' => 'required',
            'city_id' => 'required',
            'location' => 'required',
            'phone' => 'required',
        ]);

        $setting = Setting::find($request->id);
        if ($setting) {
            $setting->company_name = $request->company_name;
            $setting->location = $request->location;
            $setting->company_email = $request->company_email;
            $setting->company_slogan = $request->company_slogan;
            $setting->city_id = $request->city_id;
            $setting->company_creation_date = $request->company_creation_date;
            $setting->statistics = [
                'projects' => $request->projects,
                'partners' => $request->partners,
                'clients' => $request->clients,
            ];
            $setting->contact = [
                "phone" => $request->phone,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
                "twitter" => $request->twitter,
                "pinterest" => $request->pinterest,
                "whatsapp" => $request->whatsapp,
                "linkedin" => $request->linkedin,
                "youtube" => $request->youtube,
                ];

        if ($request->hasFile('logo')) {
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $logo=randomString(1).'.'.$ext;
            if($request->file('logo')->move(public_path('config/logos'),$logo)){
                // $img_info = getimagesize(public_path('config/logos').'/'.$logo);
                // $width_orig = $img_info[0];
                // $height_orig = $img_info[1];
                // if ($width_orig != 177 || $height_orig != 35) {
                //     $orig_img = imagecreatefromjpeg(public_path('config/logos').'/'.$logo);
                //     $width = 177;
                //     $height = 35;
                //     $destination_img = imagecreatetruecolor($width,$height);
                //     imagecopyresampled($destination_img,$orig_img,0,0,0,0,$width,$height,$width_orig,$height_orig);
                //     imagejpeg($destination_img,public_path('config/logos').'/'.$logo,100);
                // }
                // resizeImg($logo,'config/logos',177,35,$ext);
                $setting->logo = $logo;
            }
        }
            $setting->save();

            return redirect('/admin/settings')->with('status','Setting UpdateD Successfully');
        }
        return back()->with('error','Unknown Setting');
    }
}
