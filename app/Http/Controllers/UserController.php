<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $userList = User::all();
        return view('User.user-list', compact('userList'));
    }

    public function create()
    {
        return view('User.user-add-edit');
    }

    public function store(Request $request)
    {    
        try {
            $request->validate([
            'FirstName'=>'required',
            'LastName'=>'required',
            'Email'=>'required',
            'Username'=>'required',
        ]);

        $userData = new User([
            'FirstName' => $request->get('FirstName'),
            'LastName' => $request->get('LastName'),
            'Username' => $request->get('Username'),
            'Phone' => $request->get('Phone'),
            'Email' => $request->get('Email'),
        ]);
        $userData->save();
        echo "Success";
        }catch(\Exception $e){
            echo "Failed";
        }
    }

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
