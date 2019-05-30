<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\User;

class Message extends Model
{
    //
    protected $fillable = ['message', 'name', 'id', 'sourceuserid'];
    protected $appends = ['selfMessage'];

    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
