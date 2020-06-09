<?php

namespace App\Http\Controllers;

use App\package;
use App\package_categories;
use App\packageDays;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class packageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        $packageCategories=package_categories::all()->where('status','=',1);

        $packageCategoriesId=package_categories::all()->where('status','=',1)->where('url','=',$url)->first();
        // dd($packageCategoriesId);
        $cateId=$packageCategoriesId->id;
        // dd($cateId);
        $packagesList=package::all()->where('status','=',1)->where('category_id','=',$cateId);
        return view('package',['packageCategories'=>$packageCategories,'packagesLists'=>$packagesList]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url,$id)
    {
        $packageCategories=package_categories::all()->where('status','=',1);
        $showPackageDetail=DB::table('package_categories')
                           ->join('packages','package_categories.id','=','packages.category_id')
                           ->select('packages.*')
                           ->where('package_categories.url','=',$url)
                           ->where('packages.id','=',$id)
                           ->where('packages.status',true)
                           ->get();
                        //    dd($showPackageDetail);
        $packageDays=packageDays::where('package_id','=',$id)->where('status','=',1)->get();
        // dd($packageDays);

        // $packageCategoriesId=package_categories::all()->where('status','=',1)->where('url','=',$url)->first();
        // dd($packageCategoriesId);
        // $cateId=$packageCategoriesId->id;
        // dd($cateId);
        // $showPackageDetail=package::all()->where('category_id','=',$cateId)->where('id','=',$id);
        // dd($showPackageDetail);
        return view('package-detail',['packageCategories'=>$packageCategories,'showPackageDetail'=>$showPackageDetail,'packageDays'=>$packageDays]);
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
