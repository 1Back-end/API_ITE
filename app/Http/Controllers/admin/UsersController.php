<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Mail\PasswordSent;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
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
        
        $users = User::with('roles')->get();
        return view('admin.users.index',['users' => $users]);
    }

    public function create()
    {

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = Str::random(12);
        $user->password = password_hash($password,PASSWORD_DEFAULT);
        if ($request->hasFile('image')) {
            $name=randomString(1).".jpg";
            $request->file('image')->move(public_path('user-profiles'),$name);
            
            $user->img = $name;
        }
        $user->save();

        $user->syncRoles($request->role);
        Log::info('password for '.$user->name,['password'=> $password]);
        // send mail to user for password
        Mail::to($user->email)->locale('en')->send(new PasswordSent($user->name,$password));
        // 

        return redirect('/admin/users')->with('status','');

    }
}
