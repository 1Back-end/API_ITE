<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductsController extends Controller
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

        $products = Product::with('categories')->get();
        return view('admin.products.index',[
            'products'=>$products,
        ]);

    }

    public function create()
    {
        return view('admin.products.create');

    }

    public function edit($id)
    {
        $product = Product::with('categories')->where('id',$id)->first();
        return view('admin.products.edit',['product'=>$product]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_fr' => 'required',
            'short_description_fr' => 'required',
            'short_description_en' => 'required',
            'image' => 'required',
        ]);

        $product = new Product();
        $product->name =  [
            'en' => $request->name_en,
            'fr' => $request->name_fr,
        ];
        // $product->img_tag = $request->img_tag;
        $product->description =[
            'en' => $request->description_en,
            'fr' => $request->description_fr
        ];
        $product->short_description =[
            'en' => $request->short_description_en,
            'fr' => $request->short_description_fr
        ];
        // file uploads
        if ($request->hasFile('image')) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('image')->move(public_path('company-products'),$img_name)){
                // resizeImg($img_name,'products_products',900,630,$ext);
                $product->img = $img_name;
            }
        }
        $product->url = $request->url;
        $product->save();


        // categories
        if ($request->categories != null) {
            foreach ($request->categories as $category) {
                $product_category = new ProductCategory();
                $product_category->product_id = $product->id;
                $product_category->category_id = $category;
                $product_category->save();
            }
        }

        return redirect('/admin/products')->with('status','product Stored Successfully');


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

        $product = Product::find($request->id);
        $product->name =  [
            'en' => $request->name_en,
            'fr' => $request->name_fr,
        ];
        // $product->img_tag = $request->img_tag;
        $product->description =[
            'en' => $request->description_en,
            'fr' => $request->description_fr
        ];
        $product->short_description =[
            'en' => $request->short_description_en,
            'fr' => $request->short_description_fr
        ];
        // file uploads
        if ($request->hasFile('image')) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $img_name=randomString(1).'.'.$ext;
            if($request->file('image')->move(public_path('company-products'),$img_name)){
                // resizeImg($img_name,'products_products',900,630,$ext);
                $product->img = $img_name;
            }
        }
        $product->url = $request->url;
        $product->save();

        // categories
        productCategory::where('product_id',$product->id)->delete();
        if ($request->categories!= null) {
            foreach ($request->categories as $category) {
                $product_category = new productCategory();
                $product_category->product_id = $product->id;
                $product_category->category_id = $category;
                $product_category->save();
            }
        }


        return redirect('/admin/products')->with('status','product updated Successfully');

    }

}
