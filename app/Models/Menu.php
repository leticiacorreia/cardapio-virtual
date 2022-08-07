<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'is_active',
      'establishment_id',
    ];

    protected $casts = [
      'is_active' => 'boolean',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
