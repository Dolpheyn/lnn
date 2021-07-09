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

  public function getSubTotalAttribute() {
    $foods = $this->foods;
    $total = 0;

    foreach($foods as $food) {

    }
  }

  public function customer() {
    return $this->belongsTo(Customer::class, 'customerId');
  }

  function foods() {
    return $this
            ->belongsToMany(Food::class, 'cart_food', 'cartId', 'foodId')
            ->withPivot('quantity')
            ->withTimestamps();
  }
}
