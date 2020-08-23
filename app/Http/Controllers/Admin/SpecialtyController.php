<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;

use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    //Usar un middleware por ejemplo si queremos poner que la ruta specialties
    // solo puedan acceder los usuarios logueados pondria lo siguiente:
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }


    // Este metodo store va a recibir un request
    // un parametro con informacion de la peticion
    // que ese esta llevanto a cabo

    
    private function performValidation($request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Nombre como mínimo debe ser de 3 caracteres',
            'description.required' => 'Es necesario ingresar una descripción',
        ];
        $this->validate($request, $rules, $messages); //, $messages);
    }

    public function store(Request $request)
    {
        $this->performValidation($request);
        //imprime en pantalla el resultado
        // dd($request-> all()); 
        $specialty = new Specialty;
        $specialty -> name = $request -> input('name'); 
        $specialty -> description = $request -> input('description');
        $specialty -> save(); //INSERT EN LA BASE DE DATOS. Hay que agregar arriba use App\Specialty; 

        $notification = 'La Especialidad '.$specialty->name.' se ha creado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty')); //enviamos en el compact los datos de la especialidad seleccionada pero hay que fijarse que no tenga el $ de la variable
    }

    public function update(Request $request, Specialty $specialty)
    {
        $this->performValidation($request);

        //imprime en pantalla el resultado
        // dd($request-> all()); 
        // Ya no es una nueva especialidad, ya existe - $specialty = new Specialty;
        $specialty -> name = $request -> input('name'); 
        $specialty -> description = $request -> input('description');
        $specialty -> save(); //INSERT EN LA BASE DE DATOS. Hay que agregar arriba use App\Specialty; 

        $notification = 'La Especialidad '.$specialty->name.' se ha sido editada';
        return redirect('/specialties')->with(compact('notification'));       
    }

    //para eliminar las especialidades
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        $notification = 'La Especialidad '.$specialty->name.' ha sido eliminada';
        return redirect('/specialties')->with(compact('notification'));
    }
}
