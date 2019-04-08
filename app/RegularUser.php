<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegularUser extends Model
{
    //
    protected $fillable = [
    'name',
    'email',
    'organization',
    'password',
    'is_active'
  ];
}
