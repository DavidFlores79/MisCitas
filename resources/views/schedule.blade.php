@extends('layouts.panel')

<!-- Se da valor al title -->
@section('title', 'Gestionar Horario') 

@section('content')

<form action="{{ url('/schedule') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">@yield('title')</h3>
            </div>
            <div class="col text-right">
                {{-- el lugar de un A esto será un boton submit para enviar el formulario --}}
                <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
                {{-- <a href="{{ url('doctors/create') }}" >Guardar Cambios</a> --}}
            </div>
            </div>
        </div>
    
        <div class="card-body">
            @if (session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }} {{-- Variable de sesión cuando se pasa indirectamente desde el servidor. Esto es por seguridad--}}
            </div>                    
            @endif
        </div>
    
        <div class="card-body">
    
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">DIA</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">MAÑANA</th>
                    <th scope="col">TARDE</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @for ($i = 0; $i < 7; $i++) --}}
                    @foreach ($days as $key => $day)
                    <tr>
                    <th scope="row"> {{ $day }}</th>
                    <th scope="row">
                      <label class="custom-toggle">
                      <input type="checkbox" name="status[]" value="{{ $key }}" checked> {{-- Se usa $key como id para enviar los dias de la semana activos --}}
                          <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </th>
                    <th scope="row">
                        <select class="form-control-sm" name="mornning_start[]" id="">
                            @for ($i = 5; $i < 11; $i++)
                                <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                <option value="{{$i}}:30">{{$i}}:30 a.m.</option>
                            @endfor
                        </select>        
    
                        <select class="form-control-sm" name="mornning_end[]" id="">
                            @for ($i = 5; $i < 11; $i++)
                                <option value="{{$i}}:00">{{$i}}:00 a.m.</option>
                                <option value="{{$i}}:30">{{$i}}:30 a.m.</option>
                            @endfor
                        </select>        
                    </th>
                    <th scope="row">
                        <select class="form-control-sm" name="afternoon_start[]" id="">
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i+12}}:00">{{$i}}:00 p.m.</option>
                                <option value="{{$i+12}}:30">{{$i}}:30 p.m.</option>
                            @endfor
                        </select>        
                        <select class="form-control-sm" name="afternoon_end[]" id="">
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i+12}}:00">{{$i}}:00 p.m.</option>
                                <option value="{{$i+12}}:30">{{$i}}:30 p.m.</option>
                            @endfor
                        </select>        
                    </th>
                    <th>
                    </tr>                
                    @endforeach
                    {{-- @endfor --}}
                    
                </tbody>
                </table>
        </div>
    </div>
</form>

@endsection
