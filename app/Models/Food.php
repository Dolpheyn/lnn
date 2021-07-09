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
}
