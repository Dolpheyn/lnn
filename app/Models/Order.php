<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'status',
  ];

  function customer() {
    return $this->belongsTo(Customer::class, 'customerId');
  }

  function deliverer() {
    return $this->belongsTo(Deliverer::class, 'delivererId');
  }

  public function payment() {
    return $this->hasOne(Payment::class, 'orderId');
  }

  function foods() {
    return $this
            ->belongsToMany(Food::class, 'order_food', 'orderId', 'foodId')
            ->withPivot('quantity')
            ->withTimestamps();
  }
}

?>

