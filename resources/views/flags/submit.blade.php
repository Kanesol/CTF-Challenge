@extends('app')

@section('content')
    <h1>Submit a flag</h1>

    {!! Form::open(['url' => 'flags']) !!}
    <div class="form-group">
        {!! Form::label('flag', 'Flag:')!!}
        {!! Form::text('flag', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit Flag', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close([]) !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif

    @if(null != Session::get('message'))

            <ul class="alert alert-success">

                    <li>
                        {{Session::get('message')}}
                    </li>

            </ul>

    @endif

@stop