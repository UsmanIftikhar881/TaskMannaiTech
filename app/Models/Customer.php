<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';   //DB Table Name

    /** Eloquent Relation to Load orders against customer */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');
    }

    /** Eloquent Relation to Load payments against customer */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'customerNumber', 'customerNumber');
    }

    // Customer with most orders.
    public function customerWithMostOrders(){
        return Order::with('customer')->addSelect(DB::raw('Count(orders.customerNumber) as total_orders,
        orders.customerNumber'))
            ->groupBy('orders.customerNumber')->limit(1)
            ->orderBy('total_orders', 'DESC')->first();;
    }

    // Customer who spent more money on orders.
    public function customerWithMoreSpedings(){
        return Payment::with('customer')->addSelect(DB::raw('sum(payments.amount) as total_payments,
        payments.customerNumber'))
            ->groupBy('payments.customerNumber')->limit(1)
            ->orderBy('total_payments', 'DESC')->first();
    }
}
