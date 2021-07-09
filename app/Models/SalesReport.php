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

  function orders() {
    return $this->hasManyThrough(
      'App\Models\Order', // the related model
      'App\Models\SalesReportOrder', // the pivot model

      'salesReportId', // current model id in pivot table
      'id', // related model id attr
      'id', // current model id attr
      'orderId' // related model id in pivot table
    );
  }
}
