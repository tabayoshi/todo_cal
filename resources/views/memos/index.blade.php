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
    <div class="container mb-4">
      <!-- todo表示 -->
      @foreach($todos as $todo)
        <h3>{{ $todo->todo }}</h3>
      @endforeach
      <form action="{{ route('store') }}" method="post">
        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
        {{ csrf_field() }}
        <textarea class="form-control col-8 mr-5" rows="1" name="memo" value=""></textarea>
        <input class="btn btn-primary" type="submit" name="submit" value="タスク追加">
      </form>
    </div>

      <table class="table">
        <thead>
          <tr>
              <th scope="col" style="width: 30%"></th>
              <th scope="col" style="width: 40%"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
          </tr>
          </thead>
          @foreach($memos as $memo)
          <thead>
            <th>
            {{ $memo->memo }}
            </th>
            <th>
              @if(($memo ->memo_flag) === 1)
                <p class="badge badge-success" style="font-size: 17px;">このタスクは終了しました</p>
              @endif    
            </th>
            
            <form method="post" action="{{ route('update') }}">
            <input type="hidden" name="id" value="{{ $memo->id }}">
            @method('PATCH')
            {{ csrf_field() }}
            <input type="hidden" name="memo_flag" value="1">
            <td>
              <input class="btn btn-success" type="submit" value="タスク終了">
            </td>
            </form>

            <form method="post" action="{{ url('/memos') }}">
            <input type="hidden" name="id" value="{{$memo->id}}">
            {{ method_field('delete') }}
            {{csrf_field()}}
            <td>
              <button class="btn btn-danger" type="submit">消去</button>
            </td>
            </form>
          </thead>
        @endforeach
      </table>

    
    </div>
    
      <a href="{{ url('/') }}">カレンダーに戻る</a>
</div>
</body>
</html>
