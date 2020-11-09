<?php

namespace App\DbModel;
use DB; 
use App\User;

class UserModel {

    public function getUserRoles() 
    {
        $userRoles= DB::table('app_menu_details')
            ->join('app_forms', 'app_forms.FormID', '=', 'app_menu_details.FormID')
            ->join('app_menus', 'app_menus.MenuID', '=', 'app_menu_details.MenuID')
            ->select('app_menu_details.*','app_forms.FormName','app_menus.Title as ParentTitle')
            ->where('app_menus.Status',1)
            ->where('app_forms.Status',1)
            ->get();

        return $userRoles;
    }
    public function getAllRoles()
    {
        $userRoles= DB::table('app_roles')
            ->select('*')
            ->where('Status',1)
            ->orderby('RoleID')
            ->get();

        return $userRoles;
    }
    public function SaveUpdateUser($request)
    {
      try {
        $userData = new User([
            'UserID' => $request->get('UserID'),
            'FirstName' => $request->get('FirstName'),
            'LastName' => $request->get('LastName'),
            'Username' => $request->get('Username'),
            'RoleID' => $request->get('RoleID'),
            'Phone' => $request->get('Phone'),
            'Email' => $request->get('Email'),
            'Password' => md5($request->get('Password')),
            'Status' => 1,
            'IsMaster' => 0,
        ]);

        $userData->save();
        $insertedUserID = $userData->id;

        //SAVE USER PERMISSIONS;
        $rolesData = json_decode($request->get('roles'));
        SaveUserPermissions($insertedUserID,$rolesData); 
        return true;

      } catch (Exception $e) {
        return false;
      }       
    }
    public function SaveUserPermissions($UserID,$roles)
    {
        if($roles != null) {
          foreach ($roles as $row) {
              DB::table('app_roles_permission')->insert([
                [   'MenuDetailID' => $row->MenuDetailID,
                    'UserID' => $UserID,
                    'IsView' =>  $row->IsView,
                    'CreatedBy' => 1,
                ]
              ]);
          }
        }
    }
}