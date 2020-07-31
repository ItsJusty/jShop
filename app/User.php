<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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

    // public function routeNotificationForMail($notification)
    // {
    //     return $this->first_name;
    // }

    public function orders()
    {
      return $this->belongsToMany('App\Order');
    }

    public function addresses()
    {
      return $this->belongsToMany('App\Address');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification($this->first_name));
        // $this->notify(new \App\Notifications\OrderConfirmationNotification);
    }

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new \App\Notifications\ResetPasswordNotification($token));
    }
}
