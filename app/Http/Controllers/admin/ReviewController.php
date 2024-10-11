<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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

        $reviews = Review::orderBy('stars','desc')->get();

        return view('admin.reviews.index',['reviews'=>$reviews]);
    }

    public function create()
    {
        return view('admin.reviews.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'reviewer_name' => "required",
            'review' => "required",
            // 'type' => "required",
        ]);

        $review = new Review();
        $review->reviewer_name = $request->reviewer_name;
        $review->type = $request->type;
        $review->review = $request->review;
        if ($request->hasFile('img')) {
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('img')->move(public_path('review/images'),$img_name)){
                $review->img =  $img_name;
            }
        }

        if ($request->hasFile('logo')) {
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $img_name==randomString(1).'.'.$ext;
            if($request->file('logo')->move(public_path('review/logos'),$img_name)){
                $review->logo =  $img_name;
            }
        }


        $review->save();

        return redirect('/admin/reviews')->with('status','review Added Successfully');
    }

    public function edit($id)
    {
        $review = Review::find($id);
        return view('admin.reviews.edit',['review'=>$review]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'reviewer_name' => "required",
            'review' => "required",
            // 'stars' => "required",
            // 'type' => "required",
            'id' => "required",
        ]);

        $review = Review::find($request->id);
        $review->reviewer_name = $request->reviewer_name;
        $review->type = $request->type;
        $review->review = $request->review;
        if ($request->hasFile('img')) {
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('img')->move(public_path('review/images'),$img_name)){
                $test =true;
            }
            $review->img =  $img_name;
        }

        if ($request->hasFile('logo')) {
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('logo')->move(public_path('review/logos'),$img_name)){
                $test =true;
            }
            $review->logo =  $img_name;
        }
        $review->save();

        return redirect('/admin/reviews')->with('status','review Updated Successfully');
    }


    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Review::where('id',$request->id)->delete();
        return back()->with('status','Operation Successful');
    }
}
