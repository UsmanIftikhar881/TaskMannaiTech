<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private \Illuminate\Support\Collection $employees;
    private \Illuminate\Support\Collection $scores;
    private int $rank=1;

    public function __construct(){
        $this->employees = collect([
            [
                'name' => 'John',
                'email' => 'john3@example.com',
                'sales' => [
                    ['customer' => 'The Blue Rabbit Company', 'order_total' => 7444],
                    ['customer' => 'Black Melon', 'order_total' => 1445],
                    ['customer' => 'Foggy Toaster', 'order_total' => 700],
                ],
            ],
            [
                'name' => 'Jane',
                'email' => 'jane8@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Piping Bull Company', 'order_total' => 3337],
                    ['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
                ],
            ],
            [
                'name' => 'Dave',
                'email' => 'dave1@example.com',
                'sales' => [
                    ['customer' => 'The Acute Toaster Company', 'order_total' => 1091],
                    ['customer' => 'Green Mobile', 'order_total' => 2370],
                ],
            ],
        ]);

        $this->scores = collect ([
            ['score' => 76, 'team' => 'A'],
            ['score' => 62, 'team' => 'B'],
            ['score' => 82, 'team' => 'C'],
            ['score' => 86, 'team' => 'D'],
            ['score' => 91, 'team' => 'E'],
            ['score' => 67, 'team' => 'F'],
            ['score' => 67, 'team' => 'G'],
            ['score' => 82, 'team' => 'H'],
        ]);
    }

    public function index(){
        $employee = new Employee();
        $customer = new Customer();
        return view('index',[
            "task1" => $employee->filter($this->employees),
            "task2a" => $customer->customerWithMostOrders(),
            "task2b" => $customer->customerWithMoreSpedings(),
            "task3" => $this->getRanks()
        ]);
    }

    // Calculate ranks for the given teams.
    public function getRanks(){
         $collection = $this->scores;
         $rankings = $collection
             ->groupBy('score')
             ->map(function ($group) {
                 return $group->pluck('team');
             });

         $rankings_sorted = $rankings->sortKeysDesc();

         return $rankings_sorted->map(function($elem){
             return collect($elem)->put("rank",$this->rank++);
         });
    }
}
