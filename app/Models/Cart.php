<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'additionalRequest',
      'deliveryFee',
  ];

  public function customer() {
    return $this->belongsTo(Customer::class, 'customerId');
  }

  function foods() {
    return $this->hasManyThrough(
      'App\Models\Food', // the related model
      'App\Models\CartFood', // the pivot model

      'cartId', // current model id in pivot table
      'id', // related model id attr
      'id', // current model id attr
      'foodId' // related model id in pivot table
    );
  }
}
