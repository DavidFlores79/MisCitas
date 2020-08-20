@extends('layouts.panel')

<!-- Se da valor al title -->
@section('title', 'Médicos') 

@section('content')




            <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">@yield('title')</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('doctors/create') }}" class="btn btn-sm btn-success">Nuevo Médico</a>
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

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                    <th scope="row">
                        {{$doctor->name}}
                    </th>
                    <td>
                        {{$doctor->email}}
                    </td>
                    <td>
                        {{$doctor->identity_card}}
                    </td>
                    <td>
                        <form action="{{ url('/doctors/'.$doctor->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/doctors/'.$doctor->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                    </tr>
                    <tr>
                @endforeach
                </tbody>
                </table>
            </div>




@endsection
