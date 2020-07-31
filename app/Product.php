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

    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }

    public function label()
    {
      return $this->belongsTo('App\Label');
    }

}
