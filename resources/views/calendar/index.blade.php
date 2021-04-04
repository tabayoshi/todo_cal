
            @extends('layout')
            @section('title', 'カレンダー')
            @section('content')
                {!!$cal_tag!!}
                
            <!-- <a href="{{ url('/holiday') }}">休日設定</a> -->
        </div>
        
        <div class="col-sm">
            <div class="container mt-3">
                <h3>Todo</h3>
            </div>
            <div class="container mt-3">
                <div class="container mb-4">
                    {!! Form::open(['route' => 'store', 'method' => 'POST']) !!}
                    {{ csrf_field() }}
                        <div class="row">
                            {{ Form::text('newTodo', null, ['class' => 'form-control col-8 mr-5']) }}
                            {{ Form::date('newDeadline', null, ['class' => 'mr-5']) }}
                            
                            {{ Form::submit('新規追加', ['class' => 'btn btn-primary']) }}
                        </div>
                    {!! Form::close() !!}
                </div>
                @if ($errors->has('newTodo'))
                    <p class="alert alert-danger">{{ $errors->first('newTodo') }}</p>
                @endif
                @if ($errors->has('newDeadline'))
                    <p class="alert alert-danger">{{ $errors->first('newDeadline') }}</p>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 60%">Todo</th>
                            <th scope="col">期限</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $todo)
                        <tr>
                            <th scope="row"><a href="{{ url('memos', $todo->id) }}"><input type="radio">{{ $todo->todo }}</a></th>
                            <td>{{ $todo->deadline }}</td>
                            <td><a href="" class="btn btn-primary">編集</a></td>
                            {!! Form::open(['route' => ['delete', $todo->id], 'method' => 'POST']) !!}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <td>{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}</td>
                            {!! Form::close() !!}
                        </tr>
                        @endforeach

                        
                    </tbody>
                </table>
            </div>

            <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
            <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
            {!! Toastr::message() !!}
        </div>
            @endsection
    </div>
</body>
</html>