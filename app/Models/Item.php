<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['company_id','name','order_week','company_name','company_phone_number'];

    public static $rules = [
        'name' => 'required',
        'order_week' => 'required',
        'company_id' => 'required'
    ];

    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
