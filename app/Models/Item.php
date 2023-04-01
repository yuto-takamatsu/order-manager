<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','order_week','company_name'];

    public static $rules = [
        'item_name' => 'required',
        'order_week' => 'required',
        'company_name' => 'required'
    ];

    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
