<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notification\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     use notifiable;
     protected $guard = 'regularuser';
     // protected $table = 'regular_users';
     // protected $primaryKey = 'id';
     // public $timestamps = false;


     protected $fillable = [
     'name',
     'email',
     'organization',
     'password',
     'is_active'
   ];

    protected $hidden = ['password',  'remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
