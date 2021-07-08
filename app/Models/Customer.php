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

  public function addresses() {
    return $this->hasMany(Address::class, 'customerId');
  }
}

?>
