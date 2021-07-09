<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'categoryId',
      'price',
      'description',
      'img',
  ];

  function category() {
    return $this->belongsTo(FoodCategory::class, 'categoryId');
  }

  function orders() {
    return $this->hasManyThrough(
      'App\Models\Order', // the related model
      'App\Models\OrderFood', // the pivot model

      'foodId', // current model id in pivot table
      'id', // related model id attr
      'id', // current model id attr
      'orderId', // related model id in pivot table
    );
  }

  function carts() {
    return $this->hasManyThrough(
      'App\Models\Cart', // the related model
      'App\Models\CartFood', // the pivot model

      'foodId', // current model id in pivot table
      'id', // related model id attr
      'id', // current model id attr
      'cartId', // related model id in pivot table
    );
  }
}
