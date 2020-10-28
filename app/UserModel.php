<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $fillable = [
        'UserID',
        'FirstName',
        'LastName',
        'Phone',
        'Email',
        'Username',
        'Password',
        'CompanyID',
        'RoleID',
        'Status',
        'CreatedBy',
        'ModifiedBy',
    ];
}
