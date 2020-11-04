<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'app_roles';
	public $timestamps = false;
    protected $fillable = [
        'RoleID',
        'RoleName',
        'Status',
        'CreatedBy',
        'ModifiedBy',
    ];
