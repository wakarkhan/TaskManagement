<?php

namespace App\Http\Controllers;
use App\DbModel\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('User.user-list');
    }

    public function create()
    {
        //GET ALL USER ROLES:
        $userModel = new UserModel();
        $roleDropDownList = $userModel->getAllRoles();
        $userRoles = $userModel->getUserRoles();

        return view('User.user-add-edit',compact('roleDropDownList','userRoles'));
    }

    public function store(Request $request)
    {
        try {
            //VALIDATIONS:
            $request->validate([
                'FirstName'=>'required',
                'LastName'=>'required',
                'Email'=>'required',
                'Username'=>'required',
                'RoleID' => 'required',
                'Password'=>'required'
            ]);

            //STORING USER DATA:
            $userModel = new UserModel();
            $array = json_decode($request->get('roles'), true);
            var_dump($array);
            // if($userModel->SaveUpdateUser($request)){
            //     echo "Success";    
            // }else{
            //     echo "Failed";
            // }

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
