<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';  //DB Table Name

    /** Eloquent Relation to Load customer against payment */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerNumber', 'customerNumber');
    }
}
