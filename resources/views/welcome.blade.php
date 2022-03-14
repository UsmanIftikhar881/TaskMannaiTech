<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Mannai Tech Task</title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="card pt-3 pb-3">
            <div class="col-md-12">
                <h5>Task 1: employee who made the most valuable sale.</h5>
                <h6>{{ $task1 }}</h6>
            </div>
            <hr>
            <div class="col-md-12">
                <h5>Task 2A: Find the first customer who has highest number of orders.</h5>
                <h6>Total Orders : {{ $task2a->total_orders }}</h6>
                <h6>Customer Name : {{ $task2a->customer->customerName }}</h6>
            </div>
            <hr>
            <div class="col-md-12">
                <h5>Task 2B: Find the first customer who spent more money on orders.</h5>
                <h6>Total Amount Spent : {{ $task2b->total_payments }}</h6>
                <h6>Customer Name : {{ $task2a->customer->customerName }}</h6>
            </div>
            <hr>
            <div class="col-md-12">
                <h5>Task 3: Calculate ranks for the given teams.</h5>
                @foreach ($task3 as $data)
                    <h6>{{ $data }}</h6>
                @endforeach

            </div>
        </div>
    </div>
</div>
</body>
</html>
