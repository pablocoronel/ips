@extends('layouts.main')

@section('title', 'IPS - lista usuario')

@section('content')
    {!! Form::open(['action' => 'UserController@search', 'method' => 'POST']) !!}
    <div class="input-field">
    {!! Form::text('busqueda') !!}

    {!! Form::submit('Buscar', ['class' => 'waves-effect waves-light btn-small']) !!}
    </div>
    {!! Form::close() !!}

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
        <div class="col s12">
            <table>
                <thead>
                  <tr>
                      <th>Username</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Nacionalidad</th>
                      <th>Editar</th>
                      <th>Borrar</th>
                  </tr>
                </thead>
        
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->nationality_user->nationality}}</td>
                            <td>
                                <a href={{asset('users/' . $user->id . '/edit')}} class="waves-effect waves-light btn-small">Editar</a>
                            </td>
                            <td>
                                {!! Form::open(['action' => ['UserController@destroy',  $user->id], 'method' => 'DELETE']) !!}
        
                                    {!! Form::token() !!}
        
                                    <input name="_method" type="hidden" value="DELETE">
                                    
                                    {!! Form::submit('Borrar', ['class' => 'waves-effect waves-light btn-small red']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection