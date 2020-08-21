@extends('layouts.panel')

<!-- Se da valor al title -->
@section('title', 'Nuevo Paciente') 

@section('content')

        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">@yield('title')</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ url('patients') }}" class="btn btn-sm btn-danger">Cancelar y Volver</a>
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
                <form action="{{ url('patients') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">Nombre del Paciente</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"  autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}"  autocomplete="email" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="identity_card"> Cédula</label>
                        <input type="text" name="identity_card" class="form-control" value="{{ old('identity_card') }}"  autocomplete="identity_card" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}"  autocomplete="address" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" autocomplete="password" autofocus>
                        <p>Ingrese una contraseña solo si desea cambiar la actual.</p>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
            




@endsection
