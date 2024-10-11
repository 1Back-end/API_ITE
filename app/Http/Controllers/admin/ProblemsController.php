<?php

namespace App\Http\Admin;
use App\Http\Controllers\Controller;

use App\Mail\Notification;
use App\Models\Problem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProblemsController extends Controller
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
        
        $all_problems = Problem::with('user')->orderBy('created_at','desc')->get();
        $problems = Problem::where('type','PROBLEM')->count();
        $suggestions = Problem::where('type','SUGGESTION')->count();
        $user_requests = Problem::where('type','REQUEST')->count();
        $contacts = Problem::where('type','CONTACT')->count();
        return view('admin.problems.index',[
            'all_problems' => $all_problems,
            'problems' => $problems,
            'suggestions' => $suggestions,
            'user_requests' => $user_requests,
            'contacts' => $contacts,
        ]);
    }

    public function myProblems(Request $request)
    {
        // $request->session()->reflash();
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }
        
        $my_problems = Problem::where('user_id',auth()->user()->id)->get();
        $problems = Problem::where('type','PROBLEM')->where('user_id',auth()->user()->id)->count();
        $suggestions = Problem::where('type','SUGGESTION')->where('user_id',auth()->user()->id)->count();
        $user_requests = Problem::where('type','REQUEST')->where('user_id',auth()->user()->id)->count();
        return view('user.problems.index',[
            'my_problems' => $my_problems,
            'problems' => $problems,
            'suggestions' => $suggestions,
            'user_requests' => $user_requests,
        ]);
    }

    public function create()
    {
        return view('admin.problems.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $problem = new Problem();
        $problem->type = $request->type;
        $problem->title = $request->title;
        $problem->description = $request->description;
        $problem->user_id = auth()->user()->id;
        if ($request->hasFile('screenshot')) {
            $img_name=randomString(1).".jpg";
            if($request->file('screenshot')->move(public_path('screenshots'),$img_name)){
                $test =true;
            }
            $problem->screenshot = $img_name;
        }
        $problem->save();
        //send mail and notification on app 
        $admins = User::role('ADMIN')->get();
        foreach ($admins as $admin) {
            # code...
            if(Mail::to($admin->email)->locale('fr')->send(new Notification(strtolower($request->type)))){
                $test = true;
            }
        }
        // 
        return redirect('/admin/problems')->with('status','Problem Stored Successfully');
    }

    public function reply(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'reply' => 'required',
            'status' => 'required',
        ]);

        $problem = Problem::find($request->id);
        $problem->reply = $request->reply;
        $problem->admin_id = auth()->user()->id;
        $problem->status = $request->status;
        $problem->save();

        return redirect('/admin/problems')->with('status','Replied Successfully');
    }

    
}
