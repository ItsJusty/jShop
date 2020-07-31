<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Employee extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'employee';

    protected $fillable = [
      'first_name', 'last_name', 'email', 'password', 'bsn_number', 'role_id',
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];

    protected $casts = [
      'email_verified_at' => 'datetime',
    ];

    /**
     * Get Employee full name
     *
     * @return App\Employee
     */

    public function fullName()
    {
      return Auth::guard('employee')->user()->first_name . " " . Auth::guard('employee')->user()->last_name;
    }


    /**
     * Check if Employee has a specific permission
     *
     * @param  // IDEA:   $id
     * @return boolean
     * @usage // Auth::guard('employee')->user()->hasPermission(1)
     */

    public function hasPermission($id)
    {
      if (Auth::guard('employee')->user()->role()->permissions()->find($id)) return true;
      return false;
    }

    /**
     * Get Employee role
     *
     * @return App\Role
     */

    public function role()
    {
      return $this->belongsTo('App\Role')->first();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification($this->first_name));
        // $this->notify(new \App\Notifications\OrderConfirmationNotification);
    }
}
