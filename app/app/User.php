<?php

namespace App;

use App\Notifications\PasswordResetUserNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetUserNotification($token));
    }

    public function Betting_ticket_registration()
    {
        return $this -> hasMany('App/Betting_ticket_registration');
    }

    public function Race_detail()
    {
        return $this->hasMany('App/Race_detail');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function isLikedBy($user): bool
    {
        return Like::where('user_id', $user->id)->where('user_liked_id', $this->id)->first() !== null;
    }
}
