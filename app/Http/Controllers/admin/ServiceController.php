<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceApproach;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index(Request $request)
    {
        // $request->session()->reflash();
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }


        $services = Service::with('approaches','categories')->get();
        return view('admin.services.index',[
            'services'=>$services,
        ]);
    }

    public function create()
    {
        return view('admin.services.create');

    }

    public function edit($id)
    {
        $service = Service::with('approaches','categories')->find($id);
        return view('admin.services.edit',['service'=>$service]);

    }

    public function store(Request $request)
    {
        // var_dump($request->long_description);die;
        $request->validate([
            'name_en' => 'required',
            'name_fr' => 'required',
            'short_description_fr' => 'required',
            'short_description_en' => 'required',
            'image' => 'required',
        ]);

        $service = new Service();
        $service->name =  [
            'en' => $request->name_en,
            'fr' => $request->name_fr,
        ];
        // $service->img_tag = $request->img_tag;
        $service->description =[
            'en' => $request->description_en,
            'fr' => $request->description_fr
        ];
        $service->short_description =[
            'en' => $request->short_description_en,
            'fr' => $request->short_description_fr
        ];
        // file uploads
        if ($request->hasFile('image')) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('image')->move(public_path('company-services'),$img_name)){
                // resizeImg($img_name,'services_services',900,630,$ext);
                $service->img = $img_name;
            }
        }
        $service->save();


        // categories
        if ($request->categories != null) {
            foreach ($request->categories as $category) {
                $service_category = new ServiceCategory();
                $service_category->service_id = $service->id;
                $service_category->category_id = $category;
                $service_category->save();
            }
        }
        // approaches
        for ($i = 0; $i <= 5; $i++) {
            if($request->input('approach_description_'.$i)!= null){

                $service_approach = new ServiceApproach();
                $service_approach->service_id = $service->id;
                $service_approach->approach_description = $request->input('approach_description_'.$i);
                $service_approach->save();
            }
        }

        return redirect('/admin/services')->with('status','service Stored Successfully');


    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name_en' => 'required',
            'name_fr' => 'required',
            'short_description_fr' => 'required',
            'short_description_en' => 'required',
        ]);

        $service = Service::find($request->id);
        $service->name =  [
            'en' => $request->name_en,
            'fr' => $request->name_fr,
        ];
        // $service->img_tag = $request->img_tag;
        $service->description =[
            'en' => $request->description_en,
            'fr' => $request->description_fr
        ];
        $service->short_description =[
            'en' => $request->short_description_en,
            'fr' => $request->short_description_fr
        ];
        // file uploads
        if ($request->hasFile('image')) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('image')->move(public_path('company-services'),$img_name)){
                // resizeImg($img_name,'services_services',900,630,$ext);
                $service->img = $img_name;
            }
        }
        $service->save();

        // categories
        ServiceCategory::where('service_id',$service->id)->delete();
        if ($request->categories!= null) {
            foreach ($request->categories as $category) {
                $service_category = new serviceCategory();
                $service_category->service_id = $service->id;
                $service_category->category_id = $category;
                $service_category->save();
            }
        }

        // approaches
        $approaches = ServiceApproach::where('service_id',$service->id)->get();
        foreach($approaches as $approach){
            if($request->input('existing_approach_description_'.$approach->id)!= null){
                $a = ServiceApproach::find($approach->id);
                $a->approach_description = $request->input('existing_approach_description_'.$approach->id);
                $a->save();
            }
        }
        for ($i = 0; $i <= 5; $i++) {
            if($request->input('approach_description_'.$i)!= null){

                $service_approach = new ServiceApproach();
                $service_approach->service_id = $service->id;
                $service_approach->approach_description = $request->input('approach_description_'.$i);
                $service_approach->save();
            }
        }

        return redirect('/admin/services')->with('status','service updated Successfully');

    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Service::where('id',$request->id)->delete();
        ServiceCategory::where('service_id',$request->id)->delete();
        return back()->with('status','Operation Successful');
    }

}
