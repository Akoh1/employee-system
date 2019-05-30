<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Message;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
     'name',
     'last_name',
     'email',
     'dob',
     'sex',
     'maritial_status',
     'date_joined',
     'position',
     'annual_salary',
     'organization_id',
     'password',
     'is_active'
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
{
    return $this->hasMany(Message::class);
}
}
