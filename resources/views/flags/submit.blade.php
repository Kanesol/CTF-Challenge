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
        @if(Session::get('message') == "Incorrect, sorry try again!")
            <ul class="alert alert-danger">

                <li>
                    {{Session::get('message')}}
                </li>

            </ul>

        @else

            <ul class="alert alert-success">

                    <li>
                        {{Session::get('message')}}
                    </li>

            </ul>
        @endif

    @endif

@stop