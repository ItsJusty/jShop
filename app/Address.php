<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Address extends Model
{
    static function user()
    {
      return $this->belongsTo('App\User');
    }

    static function softDelete($id)
    {
      // Address::where(['id' => $id])->update(['is_active' => 0]);
    }
}
