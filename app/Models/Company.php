<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = ['company_name','phone_number','address'];

    public static $rules = [
        'company_name' => 'required',
        'phone_number' => 'required',
        'address' => 'required'
    ];
    use HasFactory;
}
