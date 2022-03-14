<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function filter($employees){
        $collection_employees = $employees
            ->map(function($employee){
                return collect($employee['sales'])->max('order_total');
            })->sort()
            ->reverse()
            ->keys()
            ->first();

        return $employees->get($collection_employees)['name'];

    }
}
