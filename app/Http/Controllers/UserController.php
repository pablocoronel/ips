<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Nationality;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        $args = [
            'users' => $data
        ];

        return view('models.user.list', $args);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities    = [];
        $nationality_data = Nationality::all();

        foreach ($nationality_data as $nationality) {
            $nationalities[$nationality->id] = $nationality->nationality;
        }

        $args = [
            'nationalities' => $nationalities
        ];

        return view('models.user.create', $args);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->username       = $request->username;
        $user->nombre         = $request->nombre;
        $user->apellido       = $request->apellido;
        $user->email          = $request->email;
        $user->nationality_id = $request->nacionalidad;
        $user->save();

        $request->session()->flash('ok', 'Usuario creado');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user             = User::find($id);
        $nationalities    = [];
        $nationality_data = Nationality::all();

        foreach ($nationality_data as $nationality) {
            $nationalities[$nationality->id] = $nationality->nationality;
        }

        $args = [
            'user'          => $user,
            'nationalities' => $nationalities
        ];

        return view('models.user.edit', $args);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $user->username       = $request->username;
        $user->nombre         = $request->nombre;
        $user->apellido       = $request->apellido;
        $user->email          = $request->email;
        $user->nationality_id = $request->nacionalidad;
        $user->save();

        $request->session()->flash('ok', 'Usuario editado');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        \Request::session()->flash('ok', 'Usuario borrado');

        return back();
    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        $data = User::join('nationality', 'user.nationality_id', '=', 'nationality.id')
            ->where('user.username', $request->busqueda)
            ->orWhere('user.nombre', $request->busqueda)
            ->orWhere('user.apellido', $request->busqueda)
            ->orWhere('user.email', $request->busqueda)
            ->orWhere('nationality.nationality', $request->busqueda)
            ->get();

        $args = [
            'users' => $data
        ];

        return view('models.user.list', $args);
    }

}
