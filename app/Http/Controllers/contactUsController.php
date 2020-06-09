<?php

namespace App\Http\Controllers;

use App\contactUs;
use App\Mail\ContactUsMail;
use App\Mail\WelcomeMail;
use App\package;
use App\package_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\ContactUsMail;
use Egulias\EmailValidator\Warning\Comment;


class contactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact-us',['packageCategories'=>package_categories::all()->where('status','=',1)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact=new contactUs();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->contact_number=$request->input('contact_number');
        if($request->input('message')==''){
            $contact->message='';
        }else{
            $contact->message=$request->input('message');
        }
        
        // $data=array(
        //     'name'=>$request->input('name'),
        //     'email'=>$request->input('email'),
        //     'contact_number'=>$request->input('contact_number'),
        //     'message'=>$request->input('message'),
        // );
        $package=package::findOrFail(1);
        $data=$contact;
        $data1=$package;
        // dd($data);
        Mail::to($contact->email)->send(new ContactUsMail($data,$data1));
        $contact->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
