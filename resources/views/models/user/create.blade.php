@extends('layouts.main')

@section('title', 'IPS - crear usuario')

@section('content')
    {{-- Mensajes --}}
    <div class="row">
        <div class="col s12">
            {{-- De error --}}
            @if ($errors->any())
                <div class="card-panel orange lighten-1">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            {{-- De exito --}}
            @if(Session::has('ok'))
                <div class="card-panel green accent-4" role="alert">
                    {{Session::get('ok', '')}}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card-panel">
                <h4 class="header2">Crear usuario</h4>
                <div class="row">
                    {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
                    
                    <div class="row">
                        <div class="input-field col s12">
                          {!! Form::text('username', '', ['placeholder' => 'Username']) !!}
                          {!! Form::label('username', 'Username') !!}
                        </div>
                      </div>
                    <div class="row">
                      <div class="input-field col s12">
                        {!! Form::text('nombre', '', ['placeholder' => 'Juan']) !!}
                        {!! Form::label('nombre', 'Nombre') !!}
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                          {!! Form::text('apellido', '', ['placeholder' => 'Martínez']) !!}
                          {!! Form::label('apellido', 'Apellido') !!}
                        </div>
                      </div>
                    <div class="row">
                      <div class="input-field col s12">
                        {!! Form::text('email', '', ['placeholder' => 'juan@gmail.com']) !!}
                        {!! Form::label('email', 'Email') !!}
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::select('nacionalidad', $nationalities, null, ['placeholder' => 'Nacionalidad', 'class' => 'browser-default']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::submit('Crear', ['class' => 'btn cyan waves-effect waves-light right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection