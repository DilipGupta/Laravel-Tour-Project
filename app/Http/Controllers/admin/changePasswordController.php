<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\changePassword;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class changePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $idd=Auth::check();
        // dd(Auth::id());
        return view('admin.change-password');
        // return view('admin.change-password',['change_password'=>admin::where(['email'=>])]);
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
        request()->validate([
            'current_password'=>'required',
            'password'=>'bail|required|min:8|confirmed'
        ]);

        $adminPassword=Admin::findOrFail($id);
        if(Hash::check($request->current_password, $adminPassword->password)){
            // dd('valid'.' = '.$request->current_password.' = '.$adminPassword->password);
            $latestPassword=Hash::make($request->password);
            Admin::where(['id'=>$id])->update(['password'=>$latestPassword]);
            $request->session()->flush();
            session()->flash('passwordChanged','password change successfully!');
            Cookie::queue(Cookie::forget('a@e'));
            Cookie::queue(Cookie::forget('a@p'));
            Cookie::queue(Cookie::forget('a@r'));
            Auth::logout();
            return redirect()->route('admin.login');
        }else{
            // session()->flash('currentPasswordCheck','Current Password Incorrect!');
            return redirect()->back()->with('currentPasswordCheck','Current Password Incorrect!');
        }
        

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
