<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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

        $categories = Category::orderBy('name','asc')->get();

        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if ($category) {
            return view('admin.categories.edit',['category'=>$category]);
        }
        return back()->with('error','Category not found');

    }

    public function newCategory()
    {
        return view('admin.categories.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_fr' => 'required',
            'type' => 'required',
        ]);

        $category = new Category();
        $category->name = [
            'en'=>$request->name_en,
            'fr'=>$request->name_fr,
        ];
        $category->type = $request->type;
        $category->save();

        return redirect('/admin/categories');
        // $this->index();
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name_en' => 'required',
            'name_fr' => 'required',
            'type' => 'required',
        ]);

        $category = Category::find($request->id);
        if ($category) {
            $category->name = [
                'en'=>$request->name_en,
                'fr'=>$request->name_fr,
            ];
            $category->save();

            return redirect('admin/categories');
            // $this->index();
        }
        return back()->with('error','Unknown category');
    }



}
