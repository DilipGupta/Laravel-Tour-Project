<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\verifyAdmin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

        /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        
        $request->validate([
            'name'=>'bail|required|max:50',
            'email'=>'bail|required|email|unique:admins|max:50',
            'password'=>'bail|required|confirmed|min:8|max:15',
        ]);

        $adminUser=new Admin();
        $adminUser->name=$request->input('name');
        $adminUser->email=$request->input('email');
        $adminUser->password=Hash::make($request->input('password'));
        $adminUser->verifyToken=Str::random(40);

        $adminUser->save();
        
        $adminUser=Admin::findOrFail($adminUser->id);
        // dd($adminUser);
        Mail::to($adminUser->email)->send(new verifyAdmin($adminUser));

        return redirect('/admin/login')->with('adminAccountConfirmationSent','Registered but verify your email to activate this account');
        
    }

    public function sendAdminEmail($email,$verifyToken)
    {
        $adminUser=Admin::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($adminUser){
            Admin::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>null]);
            return redirect('/admin/login')->with('adminVerifiedSuccessfully','Account Activated!');
        }else{
            return 'User not found';
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
