<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'trading_name',
        'company_name',
        'cnpj',
        'address',
        'phone',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function managers()
    {
        return $this->users()
          ->where('type', 'manager');
    }

    public function employees()
    {
        return $this->users()
          ->where('type', 'employee');
    }

    public function menus()
    {
      return $this->hasMany(Menu::class);
    }
}
