<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  /**
   * The products that belong to the user.
   */
    public function products()
    {
      return $this->belongsToMany('App\Product');
    }

    public function states()
    {
      return $this->belongsToMany('App\OrderState');
    }
}
