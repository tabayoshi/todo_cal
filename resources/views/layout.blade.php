<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Todo-カレンダー</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
        <style>
            .todo_cal {
                display: flex;
                justify-content: space-between;
            }
            .todo .calendar {
                width: 50%;
            }
        </style>
    </head>
    <body>
        <div class="container mt-3">
            <h1>Todo-カレンダー</h1>
        </div>
        <div class="container">
            @yield('content')
            <!-- <a href="{{ url('/holiday') }}">休日設定</a> -->
        </div>

       
    </body>
</html>