<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
      return $this->hasMany('App\Image');
    }
    //
    // public function category()
    // {
    //   return $this->belongsTo('App\Category');
    // }

    public function label()
    {
      return $this->belongsTo('App\Label');
    }

    public function tax()
    {
      return $this->belongsTo('App\Tax');
    }

}
