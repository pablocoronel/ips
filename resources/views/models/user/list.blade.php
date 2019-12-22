@extends('layouts.main')

@section('title', 'IPS - lista usuario')

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
            @if(Session::has('guardado'))
                <div class="card-panel green accent-4" role="alert">
                    {{Session::get('guardado', '')}}
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
                            <td>{{$user->nationality->nationality}}</td>
                            <td>
                                <a href={{asset('users/' . $user->id . '/edit')}}>Editar</a>
                            </td>
                            <td>
                                <a href="{{asset('users/delete')}}">Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection