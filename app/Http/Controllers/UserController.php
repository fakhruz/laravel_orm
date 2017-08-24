<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $detail_users = User::all();
        // dd($users);

        // echo "<pre>";
        // print_r($users);
        // echo "</pre>";

        return view('user.index',compact('detail_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        $this->validate($request,[
                'name' => 'required|min:3|max:255',
                'email'=> 'required|email',
                'password'=> 'required|min:8|max:12|confirmed',
            ]);

        $name= $request->input('name');
        $pass = $request->input('password');
        $email = $request->input('email');

        $newUser = User::create([
                'name'=> $name,
                'email'=> $email,
                'password'=>bcrypt($pass),
        ]);

        if( ! $newUser ){
            //tidak berjaya

            flash('Pengguna tidak Berjaya di daftarkan','danger');
        }else{

            //berjaya
            flash('Pengguna Berjaya di daftarkan','success');
        }

        // // dd($name);
        // flash('Pengguna Berjaya di daftarkan','success');
        //User::create($request->all());
        return redirect()->route('users.index');
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
        $user = User::find($id);

        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit',compact('user'));
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
        User::where('id',$id)->update($request->only('name', 'email'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->forceDelete();

        return redirect()->route('users.index');
    }

    // public function messages(){

    //     return[
    //         'password.required' => 'password wajib di isi',
    //     ];
    // }
}
