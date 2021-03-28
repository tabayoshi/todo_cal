@extends('layout')
@section('title', '休日設定')
@section('content')
    <h1>休日設定</h1>
    <!-- 休日入力フォーム -->
    <form method="POST" action="{{ url('/holiday') }}"> 
    <div class="form-group">
    {{csrf_field()}}    
    <label for="day">日付[YYYY/MM/DD] </label>
    <input type="text" name="day" class="form-control" id="day">
    <label for="description">説明</label>
    <input type="text" name="description" class="form-control" id="description"> 
    </div>
    <button type="submit" class="btn btn-primary">登録</button>
    <input type="hidden" name="id" value="{{$data->id}}">
    </form> 

    <!-- 休日一覧表示 -->
    <table class="table">
    <thead>
    <tr>
    <th scope="col">日付</th>
    <th scope="col">説明</th>
    <th scope="col">作成日</th>
    <th scope="col">更新日</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $val)
    <tr>
        <th scope="row"><a href="{{ url('/holiday'. $val->id) }}">{{$val->day}}</a></th>
        <td>{{$val->description}}</td>
        <td>{{$val->created_at}}</td>
        <td>{{$val->updated_at}}</td>
        <td><form method="post" action="{{ url('/holiday') }}">
            <input type="hidden" name="id" value="{{$val->id}}">
            {{ method_field('delete') }}
            {{csrf_field()}}
            <button class="btn btn-default" type="submit">消去</button>
        </form></td>
    </tr>
    @endforeach
    </tbody>
    </table>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    <a href="{{ url('/') }}">カレンダーに戻る</a>
    <script>
      $(function(){
        $("#day").datepicker({dateFormat: 'yy-mm-dd'});
      });
    </script>
@endsection