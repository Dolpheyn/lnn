<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

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
  ];

  public function getActiveAddressAttribute() {
    return $this->addresses->where('isActive', 1)->first();
  }

  public function addresses() {
    return $this->hasMany(Address::class, 'customerId');
  }

  public function orders() {
    return $this->hasMany(Order::class, 'customerId');
  }

  public function cart() {
    return $this->hasOne(Cart::class, 'customerId');
  }
}

?>
