<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'email' => 'required|string',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>bcrypt($request->password)
        ]);
      if($user){
          return redirect('/from/one/hello')->with('message','Login Create Successfully');
      }else{
        return back()->with('message','Login Not Create Successfully');
      }


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
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:6',
        ]);
        $credinsial = $request->only('email','password');
        if(auth()->attempt($credinsial)){
            return redirect('/from/one/hello')->with('message','Login Create Successfully');
        }else{
            return back()->with('message','Login Not Create Successfully');
        }
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
