<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = ['name','phone_number','address'];

    public static $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'address' => 'required'
    ];
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
