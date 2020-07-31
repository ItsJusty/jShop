<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    static function employees()
    {
      return $this->hasMany('App\Employee');
    }

    public function permissions()
    {
      return $this->belongsToMany('App\Permission');
    }
}
