<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        
        $faqs = Faq::orderBy('created_at','desc')->get();
        
        
        return view('admin.faqs.index',[
            'faqs' => $faqs
        ]);
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faqs.edit',['faq'=>$faq]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_en' => 'required',
            'question_fr' => 'required',
            'answer_en' => 'required',
            'answer_fr' => 'required',
        ]);

        $faq = new Faq();
        $faq->question  = [
            "en" => $request->question_en,
            "fr" => $request->question_fr,
        ]; 
        $faq->answer = [
            "en" => $request->answer_en,
            "fr" => $request->answer_fr,
        ];
        
        
        $faq->save();
        
        return redirect('/admin/faqs')->with('status','faq Stored Successfully');
    }

     public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'question_en' => 'required',
            'question_fr' => 'required',
            'answer_en' => 'required',
            'answer_fr' => 'required',
        ]);

        $faq = faq::find($request->id);
        $faq->question  = [
            "en" => $request->question_en,
            "fr" => $request->question_fr,
        ]; 
        $faq->answer = [
            "en" => $request->answer_en,
            "fr" => $request->answer_fr,
        ];
        
        
        $faq->save();
        
        return redirect('/admin/faqs')->with('status','faq Updated Successfully');
    }

}
