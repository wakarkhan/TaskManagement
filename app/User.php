<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'app_users';
	public $timestamps = false;
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
