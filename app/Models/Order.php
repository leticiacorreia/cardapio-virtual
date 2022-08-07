<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'table_number',
      'status',
      'total_cents',
      'menu_id'
    ];

    public function menu()
    {
      return $this->belongsTo(Menu::class);
    }

    public function products()
    {
      return $this->belongsToMany(Product::class)->withPivot(['subtotal_cents', 'quantity']);
    }
}
