<?php

namespace App\Http\Controllers;
use App\DbModel\UserModel;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $userList = $userModel->getAllUsers();
        Session::put('userList', $userList);
        return view('User.user-list',compact('userList'));
    }

    public function create()
    {
        // //GET ALL USER ROLES:
        // $userModel = new UserModel();
        // $roleDropDownList = $userModel->getAllRoles();
        // $userRoles = $userModel->getUserRoles();
        // $userData = null;
        // $userExistingRoles = array();
        // $Mode = 'Add';

        // return view('User.user-add-edit',compact('roleDropDownList','userRoles','Mode','userData','userExistingRoles'));

        var_dump(Session::get('userList'));
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
                'RoleID' => 'required'
                //'Password'=>'required'
            ]);

            //STORING USER DATA:
            $userModel = new UserModel();
            $rolesData = json_decode($request->get('roles'), true);
            $insertedUserID = $userModel->SaveUpdateUser($request);
            if((int)$insertedUserID > 0) {
                //STORING ROLES:
                $userModel->SaveUserPermissions($insertedUserID,$rolesData); 
                echo "Success";    
            }else{
                echo "Failed";
            }

        }catch(\Exception $e){
            echo $e;
        }
    }

    public function edit($userName)
    {
        //GET ALL USER ROLES:
        $userModel = new UserModel();
        $roleDropDownList = $userModel->getAllRoles();
        $userRoles = $userModel->getUserRoles();

        $Mode = 'Edit';
        $userData = $userModel->getUserData($userName);
        $userExistingRoles = array();
        if(!empty($userData)) {
            $userExistingRoles = $userModel->getUserExistingRoles($userData[0]->UserID);    
        }
        
        return view('User.user-add-edit',compact('roleDropDownList','userRoles','Mode','userData','userExistingRoles'));
    }
    public function updateUserPassword(Request $request)
    {        
        try {
           $userModel = new UserModel();
           $result = $userModel->updateUserPassword($request);

           if($result){
                echo "Success";
           }else {
                echo "Failed";
           }
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function deleteUser(Request $request)
    {        
        try {
           $userModel = new UserModel();
           $result = $userModel->deleteUser($request);

           if($result){
                echo "Success";
           }else {
                echo "Failed";
           }
        } catch (Exception $e) {
            echo $e;
        }
    }
}
