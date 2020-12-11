<?php

namespace App\DbModel;
use DB; 
use App\User;

class UserModel {
    public function getAllUsers()
    {
        $userList= DB::table('app_users')
            ->join('app_roles','app_roles.RoleID','=','app_users.RoleID')
            ->select('app_users.*','app_roles.RoleName')
            ->where('app_users.Status',1)
            ->orderby('app_users.UserID','desc')
            ->limit(1000)
            ->get();

        return $userList;
    }
    public function getUserRoles() 
    {
        try {
            $userRoles= DB::table('app_menu_details')
                ->join('app_forms', 'app_forms.FormID', '=', 'app_menu_details.FormID')
                ->join('app_menus', 'app_menus.MenuID', '=', 'app_menu_details.MenuID')
                ->select('app_menu_details.*','app_forms.FormName','app_menus.Title as ParentTitle')
                ->where('app_menus.Status',1)
                ->where('app_forms.Status',1)
                ->get();

            return $userRoles;    
        } catch (Exception $e) {
            return null;
        }
        
    }
    public function getAllRoles()
    {
        try {
            $userRoles= DB::table('app_roles')
                ->select('*')
                ->where('Status',1)
                ->orderby('RoleID')
                ->get();

            return $userRoles;    
        } catch (Exception $e) {
            return null;
        }
    }

//SAVE UPDATE USER
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

        return $insertedUserID;

      } catch (Exception $e) {
        return 0;
      }       
    }
    public function SaveUserPermissions($UserID,$roles)
    {
        try {
            if($roles != null) {
                foreach ($roles as $row) {
                    DB::table('app_roles_permission')->insert([
                        [   'MenuDetailID' => $row['MenuDetailID'],
                            'UserID' => $UserID,
                            'IsView' =>  $row['IsView'],
                            'CreatedBy' => 1,
                        ]
                    ]);
                }
            }   
        } catch (Exception $e) {
            return null;
        }
    }
//END SAVE UPDATE USER

#EDIT USER MODE:
    public function getUserData($userName)
    {
        try {
            $userList= DB::table('app_users')
                ->select('*')
                ->where('Username',$userName)
                ->limit(1)
                ->get();

            return $userList;   
        } catch (Exception $e) {
            return null;            
        }
    }

    public function getUserExistingRoles($userID)
    {
        try {
            $userExistingRoles = DB::table('app_roles_permission')
                ->select('*')
                ->where('UserID',$userID)
                ->get();

            return $userExistingRoles;   
        } catch (Exception $e) {
            return null;            
        }
    }
#END EDIT USER MODE:
    
}