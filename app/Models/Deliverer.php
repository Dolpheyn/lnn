<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverer extends Model {

  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'phoneNumber',
      'email',
      'claimableCommission',
  ];

  public function orders() {
    return $this->hasMany(Order::class, 'delivererId');
  }

  /**
   * Notifies all the deliverer about an available-to-pickup order.
   * NOTE: Current implementation is a mock implementation.
   *
   * @param Order
   * @return void
   */
  static function notify($order) {
    $address = $order->customer->active_address->address;

    echo "Notifying all deliverers: Order available to pickup.\n";
    echo "------------------------\n";
    echo "Deliver to:\n" . $address;
  }
}

?>

