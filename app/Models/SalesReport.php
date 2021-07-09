<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'report',
      'description',
      'from',
      'to',
      'adminId',
  ];

  function generatedBy() {
    return $this->belongsTo(Admin::class, 'adminId');
  }
}
