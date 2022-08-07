<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'price',
      'is_available',
      'establishment_id',
    ];

    protected $casts = [
      'is_available' => 'boolean',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
    
    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function orders()
    {
      return $this->belongsToMany(Order::class)
        ->withPivot(['subtotal_cents', 'quantity']);
    }
}
