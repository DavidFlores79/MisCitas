<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = User::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctors.create');
    }

    private function performValidation($request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Nombre como mínimo debe ser de 3 caracteres',
            'email.required' => 'Es necesario ingresar un email',
        ];
        $this->validate($request, $rules, $messages); //, $messages);
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->performValidation($request);
        //imprime en pantalla el resultado
        // dd($request-> all()); 
        $user = new User;
        $user -> name = $request -> input('name'); 
        $user -> email = $request -> input('email');
        $user -> identity_card = $request -> input('identity_card');
        $user -> save(); //INSERT EN LA BASE DE DATOS. Hay que agregar arriba use App\user; 

        $notification = 'La Especialidad '.$user->name.' se ha creado correctamente';
        return redirect('/specialties')->with(compact('notification'));        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
