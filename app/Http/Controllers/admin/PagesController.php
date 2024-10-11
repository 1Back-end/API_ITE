<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageBanner;
use App\Models\Session;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function edit(Request $request,$page_name)
    {
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }

        $page = Page::with('banners')->where('name',$page_name)->first();

        return view("admin.pages.edit",[
            "page_name" => $page_name,
            'page' => $page
        ]);
    }

    public function update(Request $request)
    {

       $request->validate([
        'page' => "required",
       ]);

       $page = Page::with('banners')->where('name',strtoupper($request->page))->first();
    //    var_dump($page);die;
       $page->title = [
        'en' => $request->title_en,
        'fr' => $request->title_fr
        ];
       $page->sub_title = [
        'en' => $request->sub_title_en,
        'fr' => $request->sub_title_fr
        ];;
       $page->setting_id = 1;
       $page->description = [
        'en' => $request->description_en,
        'fr' => $request->description_fr
        ];
        $page->short_description = [
        'en' => $request->short_description_en,
        'fr' => $request->short_description_fr
        ];

    //    if ($page->name == 'RATES') {
    //     $page->extra = [
    //      "users"=>$request->input('rates_users'),
    //      "contacts"=>$request->input('rates_contacts'),
    //      "partners"=>$request->input('rates_partners'),
    //      ];
    //    }
       if ($request->hasFile('banner')) {
            $ext = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('banner')->move(public_path('pages/banners'),$img_name)){
                $test =true;
            }
            $page->banner =  $img_name;
        }
        // extra for home page here

        //
       $page->save();

    //    if($request->page == 'home'){
    //     $existing_banners = PageBanner::where('page_id',$page->id)->get();
    //     foreach($existing_banners as $existing_banner){
    //         if ($request->hasFile('existing_banner_'.$existing_banner->id)) {
    //             $ext = pathinfo($_FILES['existing_banner_'.$existing_banner->id]['name'], PATHINFO_EXTENSION);
    //             $img_name=randomString(1).'.'.$ext;
    //             if($request->file('existing_banner_'.$existing_banner->id)->move(public_path('pages/images'),$img_name)){
    //                 $page_banner = new PageBanner();
    //                 $page_banner->img =  $img_name;
    //                 $page_banner->page_id =  $page->id;
    //                 $page_banner->save();
    //             }
    //         }
    //     }
    //     for ($i=1; $i < (5 - sizeof($existing_banners)); $i++) {
    //         if ($request->hasFile('banner_'.$i)) {
    //             $ext = pathinfo($_FILES['banner_'.$i]['name'], PATHINFO_EXTENSION);
    //             $img_name=randomString(1).'.'.$ext;
    //             if($request->file('banner_'.$i)->move(public_path('pages/images'),$img_name)){
    //                 $page_banner = new PageBanner();
    //                 $page_banner->img =  $img_name;
    //                 $page_banner->page_id =  $page->id;
    //                 $page_banner->save();
    //             }
    //         }
    //     }
    //    }

    if ($request->page == 'home') {
        // edit old pics first if there is any
        foreach ($page->banners as $banner) {
            $banner = PageBanner::find($banner->id);
            if ($request->hasFile('0banner'.$banner->id)) {
                $img_name=randomString(1).".jpg";
                if($request->file('0banner'.$banner->id)->move(public_path('pages/images'),$img_name)){
                    $test =true;
                }

                $banner->banner = $img_name;
            }
            $banner->title = $request->input('banner_home_title_'.$banner->id);
            $banner->tag = $request->input('banner_home_tag_'.$banner->id);
            $banner->save();
        }
        for ($i=1; $i < (10-sizeof($page->banners)); $i++) {
            if ($request->hasFile('banner'.$i)) {
                $img_name=randomString(1).".jpg";
                if($request->file('banner'.$i)->move(public_path('pages/images'),$img_name)){
                    $test =true;
                }

                $banner = new PageBanner();
                $banner->page_id = $page->id;
                $banner->banner = $img_name;
                $banner->title = $request->input('home_title_'.$i);
                $banner->tag = $request->input('home_tag_'.$i);
                $banner->save();
            }
        }
    }

    return redirect('/admin/pages/'.$request->page)->with('status','Page Edited Successfully');
    }

}
