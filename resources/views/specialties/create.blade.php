@extends('layouts.panel')

<!-- Se da valor al title -->
@section('title', 'Nueva Especialidad') 

@section('content')




        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">@yield('title')</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ url('specialties') }}" class="btn btn-sm btn-danger">Cancelar y Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if($errors->any())
                        <div class="card-text alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                @endif
            </div>
            <div class="card-body">
                <form action="{{ url('specialties') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name"> Nombre de la Especialidad</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"  autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="description"> Descripción</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}"  autocomplete="description" autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
            




@endsection
