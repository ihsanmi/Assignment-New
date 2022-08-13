<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;
use DB;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layoute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'email' => 'required|email|unique:ducks',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'name'             => 'required',
            
        ]);
        $name=$request->input('name');
        $password=$request->input('password');
        $email= $request->input('email');
       $value= DB::table('user')->insert(['name'=>$name,'password'=>$password,'email'=>$email]);
        if($value == 'True')
        {
        return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Checklogin(Request $request)
    {   /* $request->validate([
        'email' => 'required|email|unique:ducks',
        'password' => 'required',
        
    ]);*/
        $email= $request->input('email');
        $password=$request->input('password');
        $data=DB::select('select * from user where email=? and password=?',[$email,$password]);
       if($data)
       {
         
        return redirect('deshbord/');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function successlogin()
    {
       // return redirect('deshbord/');
       return "test";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layoute.register');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return redirect('/');
    }
}
