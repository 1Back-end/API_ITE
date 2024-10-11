<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Package;
use App\Models\Page;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        // $services = Product::where('type','SERVICE')->inRandomOrder()->limit(8)->get();
        // $products = Product::where('type','PRODUCT')->inRandomOrder()->limit(8)->get();
        // $projects = Project::inRandomOrder()->limit(8)->get();
        // $sponsors = Sponsor::inRandomOrder()->get();
        // $home = PageBanner::with('page')->where('page_id',pages('HOME')->id)->inRandomOrder()->get();

        // return view('index',[
        //     "services"=>$services,
        //     "products"=>$products,
        //     "projects"=>$projects,
        //     "home"=>$home,
        //     "sponsors"=>$sponsors
        // ]);
        return view('index',[
            'partners' => Sponsor::inRandomOrder()->limit(12)->get(),
            'reviews' => Review::inRandomOrder()->limit(4)->get(),
            'package' => Package::with('advantages')->inRandomOrder()->limit(3)->first(),
            'faqs' => Faq::inRandomOrder()->limit(4)->get(),
            'projects' => Project::with('categories','images')->inRandomOrder()->limit(4)->get(),
            'services' => Service::with('categories')->inRandomOrder()->limit(4)->get(),

        ]);

    }
    public function careers()
    {
        return view('coming-soon');
    }

    public function service($id)
    {
        $service = Service::with('categories','approaches')->where('id',$id)->first();
        $reviews = Review::where('type','SERVICE')->inRandomOrder()->get();
        return view('service-detail',['service'=>$service,'reviews' => $reviews]);
    }

    public function product($id)
    {
        $reviews = Review::where('type','PRODUCT')->inRandomOrder()->get();
        $product = Product::with('categories')->find($id);
        return view('product-detail',[
            'reviews'=>$reviews,
            'product'=>$product
        ]);
    }

    public function services()
    {
        $services = Service::with('categories')->inRandomOrder()->get();
        return view('services',[
            'services'=>$services,
        ]);
    }


    public function products()
    {
        $products = Product::with('categories')->inRandomOrder()->get();
        return view('products',[
            'products'=>$products,
        ]);
    }


    public function project($id)
    {
        $project = Project::with('categories','images')->find($id);
        // $random_projects = Project::inRandomOrder()->limit(2)->get();
        return view('project',[
            'project' => $project,
            // 'random_projects' => $random_projects,
        ]);
    }
    public function projects()
    {
        $projects = Project::with('categories','images')->get();
        // dd($projects[0]->images);
        return view('projects',[
            'projects' => $projects,
        ]);
    }

    public function pricing()
    {
        // $packages = ;
        return view('pricing',[
            'packages' => Package::with('advantages')->get()
        ]);
    }

    public function faq()
    {

        return view('faq',[
            'faqs' => Faq::all()
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function app()
    {
        return view('app');
    }

     public function terms()
    {
        return view('terms');
    }

     public function policy()
    {
        return view('policy');
    }

    public function translate(Request $request)
    {
        session(['lang' => $request->lang]);
        return redirect($_SERVER['HTTP_REFERER']);
    }
    // public function test()
    // {
    //     $p = PageBanner::with('page')->where('page_id',pages('HOME')->id)->inRandomOrder()->get();
    //     dd($p);
    //     die;
    // }

}
