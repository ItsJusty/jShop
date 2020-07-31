<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    static function color($id)
    {
      return Label::where(['id' => $id])->value('color');
    }

    static function products()
    {
      return $this->hasMany('App\Product');
    }
}
