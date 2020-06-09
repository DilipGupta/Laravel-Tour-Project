<?php

namespace App\Http\Controllers;

use App\getQuote;
use App\package;
use App\package_categories;
use App\subscribe;
use App\testimonial;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=package::wherehas('category', function($query) { $query->where('status','=',1); })->get();
        $packageCategories=package_categories::all()->where('status','=',1);
        $testimonials=testimonial::all()->where('status','=',1);
        return view('index',['packageCategories'=>$packageCategories,'packages'=>$packages,'testimonials'=>$testimonials]);
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
        $request->validate([
            'place'=>'bail|required|max:50',
            'date'=>'bail|required|max:50',
            'duration'=>'bail|required|max:50',
            'contact_no'=>'bail|required|max:50',
            'email'=>'bail|required|email|max:50',
        ]);

        getQuote::create($request->all());
        // $getQuote= new getQuote();
        // $getQuote->place=$request->input('place');

        return redirect()->back()->with('getQuote','Our representative will get back to you shortly!');
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

    public function subscribe(Request $request)
    {
        $subscribe= new subscribe();
        $subscribe->email=$request->input('email');
        $subscribe->save();
    }
}
