<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo-カレンダー(Memo)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
</head>
<body>
  <div class="container mt-3">
    <!-- todo表示 -->
    @foreach($todos as $todo)
      <h3>{{ $todo->todo }}</h3>
    @endforeach
  </div>

  <form action="{{ url('/memos') }}" method="post">
  <input type="hidden" name='id' value="{{ $todo->id }}">
  {{ csrf_field() }}
  <input type="text" name="memo" class="form-control col-8 mr-5">
  <input type="submit" class="btn btn-primary" value="メモ追加">
  </form>
  {!! Form::open(['route' => 'store', 'method' => 'POST']) !!}
  {{ csrf_field() }}
  {{ Form::text('newMemo', null, ['class' => 'form-control col-8 mr-5']) }}
  {{ Form::hidden('todo_id', 1) }}
  {{ Form::submit('メモ追加', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

    <table class="table">
      <thead>
      @foreach($memos as $memo)
      <tr>
        <th scope="row">
        {!! Form::open(['route' => ['memo.update', $memo->id], 'method' => 'PATCH']) !!}
        {{ csrf_field() }}
        {{ Form::checkbox('memo_flag', 1) }}
        {{ $memo->memo }}
       
        {!! Form::close() !!}
        </th>
        <td>
        <form method="post" action="{{ url('/memos') }}">
          <input type="hidden" name="id" value="{{$memo->id}}">
          {{ method_field('delete') }}
          {{csrf_field()}}
          <button class="btn btn-danger" type="submit">消去</button>
        </form>
        </td>
      </tr>
      @endforeach
      </thead>
    </table>

   
  </div>
    <a href="{{ url('/') }}">カレンダーに戻る</a>

</body>
</html>
