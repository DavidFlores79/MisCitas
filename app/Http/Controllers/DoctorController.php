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
        $doctors = User::doctors()->get();
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
            'email' => 'required|email|unique:users',
            'identity_card' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:10',
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Nombre como mínimo debe ser de 3 caracteres',
            'email.required' => 'Es necesario ingresar un email',
        ];
        $this->validate($request, $rules, $messages); 


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
        
        
        //mass assignment
        User::create($request->only('name','email','identity_card','address','phone')
        + [
            'role' => 'doctor',
            'password' => bcrypt($request->input('password')),
        ] 
    
        );

        $notification = 'El médico '.$request->name.' se ha creado correctamente';
        return redirect('/doctors')->with(compact('notification'));        
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
        $user = User::doctors()->FindOrFail($id);
        return view('doctors.edit', compact('user'));
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'identity_card' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:10',
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Nombre como mínimo debe ser de 3 caracteres',
            'email.required' => 'Es necesario ingresar un email',
        ];
        $this->validate($request, $rules, $messages); 

        $user = User::doctors()->FindOrFail($id);

        $data = $request->only('name','email','identity_card','address','phone');
        $password = $request->input('password');
        if($password){
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();

        $notification = 'El médico '.$user->name.' se ha sido editado';
        return redirect('/doctors')->with(compact('notification'));   
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
        $user = User::doctors()->FindOrFail($id);
        $user->delete();
        $notification = 'El médico '.$user->name.' ha sido eliminado';
        return redirect('/doctors')->with(compact('notification'));        
    }
}
