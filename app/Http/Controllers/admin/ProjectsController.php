<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectsController extends Controller
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

        $projects = Project::with('images','categories')->get();
        return view('admin.projects.index',[
            'projects'=>$projects,
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function edit($id)
    {
        $project = Project::with('images')->where('id',$id)->first();
        return view('admin.projects.edit',['project'=>$project]);
    }

    public function store(Request $request)
    {

        // die;
        $request->validate([
            'title' => 'required',
            // 'short_description' => 'required',
            // 'long_description' => 'required',
            'url' => 'required',
            'performed_on' => 'required',
            'image' => 'required',
        ]);

        $project = new Project();
        $project->title =  $request->title;
        $project->short_description = [
            'en'=>$request->short_description_en,
            'fr'=>$request->short_description_fr,
        ];
        $project->description = [
            'en'=>$request->description_en,
            'fr'=>$request->description_fr,
        ];
        $project->url = $request->url;
        $project->client = $request->client;
        $project->rating = $request->rating;
        $project->performed_on = $request->performed_on;

        // file uploads
        if ($request->hasFile('image')) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('image')->move(public_path('project-images'),$img_name)){
                // resizeImg($img_name,'project-images',900,750,$ext);

                // $project_image = new ProjectImage();
                $project->img = $img_name;
                // $project_image->project_id = $project->id;
                // $project_image->save();
            }

        }
        $project->save();



        for ($i=0; $i < 4; $i++) {
            if ($request->hasFile('img_'.$i)) {
                $ext = pathinfo($_FILES['img_'.$i]['name'], PATHINFO_EXTENSION);
                $img_name=randomString(1).'.'.$ext;
                if($request->file('img_'.$i)->move(public_path('project-images'),$img_name)){
                    // resizeImg($img_name,'project-images',900,750,$ext);

                    $project_image = new ProjectImage();
                    $project_image->img = $img_name;
                    $project_image->project_id = $project->id;
                    $project_image->save();
                }
            }
        }



        // categories
        if ($request->categories != null) {
            foreach ($request->categories as $category) {
                $project_category = new ProjectCategory();
                $project_category->project_id = $project->id;
                $project_category->category_id = $category;
                $project_category->save();
            }
        }

        return redirect('/admin/projects')->with('status','project Stored Successfully');

    }
    public function update(Request $request)
    {
        // var_dump($request->long_description);die;
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            // 'short_description' => 'required',
            // 'long_description' => 'required',
            'url' => 'required',
            'performed_on' => 'required',
        ]);

        $project = Project::with('images','categories')->find($request->id);
        $project->title =  $request->title;
        $project->short_description = [
            'en'=>$request->short_description_en,
            'fr'=>$request->short_description_fr,
        ];
        $project->description = [
            'en'=>$request->description_en,
            'fr'=>$request->description_fr,
        ];
        $project->url = $request->url;
        $project->client = $request->client;
        $project->rating = $request->rating;
        $project->performed_on = $request->performed_on;
        // file uploads
        if ($request->hasFile('image')) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('image')->move(public_path('project-images'),$img_name)){
                // resizeImg($img_name,'project-images',900,750,$ext);
                $project->img = $img_name;
                // $project_image = ProjectImage::find($request->image_id);
                // $project_image->img = $img_name;
                // $project_image->save();
            }
        }
        $project->save();

        foreach ($project->images as $p_img) {
            if ($request->hasFile('0img'.$p_img->id)) {
                $ext = pathinfo($_FILES['0img'.$p_img->id]['name'], PATHINFO_EXTENSION);
                $img_name=randomString(1).'.'.$ext;
                if($request->file('0img'.$p_img->id)->move(public_path('project-images'),$img_name)){
                    $project_image = ProjectImage::find($p_img->id);
                    $project_image->img = $img_name;
                    $project_image->save();
                }
            }
        }

        for ($i=0; $i < 4 - sizeof($project->images); $i++) {
            if ($request->hasFile('img_'.$i)) {
                $ext = pathinfo($_FILES['img_'.$i]['name'], PATHINFO_EXTENSION);
                $img_name=randomString(1).'.'.$ext;
                if($request->file('img_'.$i)->move(public_path('project-images'),$img_name)){
                    $project_image = new ProjectImage();
                    $project_image->img = $img_name;
                    $project_image->project_id = $project->id;
                    $project_image->save();
                }
            }
        }



        // categories
        ProjectCategory::where('project_id',$project->id)->delete();
        if ($request->categories!= null) {
            foreach ($request->categories as $category) {
                $project_category = new ProjectCategory();
                $project_category->project_id = $project->id;
                $project_category->category_id = $category;
                $project_category->save();
            }
        }


        return redirect('/admin/projects')->with('status','project Updated Successfully');

    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Project::where('id',$request->id)->delete();
        ProjectCategory::where('project_id',$request->id)->delete();
        ProjectImage::where('project_id',$request->id)->delete();
        return back()->with('status','Operation Successful');
    }

}
