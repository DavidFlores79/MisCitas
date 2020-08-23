<?php

namespace App\Http\Controllers\Doctor;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workday; /** Se tuvo que agregar esta linea para poder trabajar el Workday */

class ScheduleController extends Controller
{
    //
    public function edit()
    {
        $days = [
            'Lunes', 'Martes', 'Miércoles','Jueves','Viernes','Sábado','Domingo'
        ];
        return view('schedule', compact('days'));
    }

    public function store(Request $request)
    {
        // dd($request-> all()); 
        /**
         * Se recibe el Request en una variable, todas son arrays de 7
         * elementos excepto $status porque no todos los dias estan
         * activos
         */
        $status = $request->input('status') ?: []; //si el status no existe genera un array vacio 
        $mornning_start = $request->input('mornning_start');
        $mornning_end = $request->input('mornning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');

        /**
         * El metodo updateOrCreate realiza una busqueda del dia y el userid relacionados
         * y si no esta escrito lo crea, si ya esta lo actualiza.
         * 
         * Luego encerramos todo en un ciclo for, para que el indice recorra los 7 dias
         */
        for ($i=0; $i < 7; $i++)

            Workday::updateOrCreate(
                [
                    'day' => $i,
                    'user_id'  => auth()->id(),
    
                ], [
                    'status' => in_array($i, $status),
                    'mornning_start' => $mornning_start[$i],
                    'mornning_end' => $mornning_end[$i],
                    
                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i],
                ]
            );        
            return redirect('/schedule');
    }
}
