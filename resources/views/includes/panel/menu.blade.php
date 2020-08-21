<!-- Heading -->
<h6 class="navbar-heading text-muted">
    @if (auth()->user()->role == 'admin')
        Gestionar Datos
    @else
        Menú
    @endif
</h6>
<ul class="navbar-nav">
    @if (auth()->user()->role == 'admin')        
        <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('specialties') }}">
            <i class="ni ni-badge  text-blue"></i> Especialidades
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('doctors') }}">
            <i class="ni ni-ambulance text-orange"></i> Medicos
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('patients') }}">
            <i class="ni ni-circle-08 text-yellow"></i> Pacientes
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-time-alarm text-red"></i> Horarios
        </a>
        </li>
    @elseif (auth()->user()->role == 'doctor')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="ni ni-calendar-grid-58 text-red"></i> Gestionar Horario
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ url('specialties') }}">
                <i class="ni ni-time-alarm  text-blue"></i> Mis citas
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ url('doctors') }}">
                <i class="ni ni-satisfied text-orange"></i> Mis pacientes
            </a>
        </li>
    @else {{-- PATIENT--}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('doctors') }}">
                    <i class="ni ni-laptop text-red"></i> Reservar Cita
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('specialties') }}">
                    <i class="ni ni-time-alarm  text-blue"></i> Mis citas
                </a>
            </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-button-power "></i> Cerrar Sesión
        </a>
        <form action="{{ route('logout') }}" method="post" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>

</ul>
@if (auth()->user()->role == 'admin')
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Reportes</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-chart-bar-32 text-info"></i> Frecuencia de Citas
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-chart-pie-35 text-orange"></i> Médicos más activos
        </a>
    </ul>
@endif