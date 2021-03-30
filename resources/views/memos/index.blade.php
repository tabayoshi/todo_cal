<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Memo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
</head>
<body>
  <div class="container mt-3">
    <h1>やること</h1>
  </div>
  <div class="container mt-3">
  <div class="container mb-4">
            {!! Form::open(['route' => 'todos.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
                <div class="row">
                    {{ Form::text('newMemo', null, ['class' => 'form-control col-8 mr-5']) }}
                    {{ Form::submit('MEMO追加', ['class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    <hr>
    <p>・ふむふむφ(-ω-｀)メモメモ</p>
    <p>・φ(｡_｡*)ﾒﾓﾒﾓ (*ﾟｰﾟ)ﾂ))_ｺﾋﾟｰｺﾋﾟｰ､(ﾉﾟ▽ﾟ)ﾉ^配布配布♪</p>
    <hr>
    <a href="{{ url('/') }}">カレンダーに戻る</a>
  </div>

</body>
</html>
