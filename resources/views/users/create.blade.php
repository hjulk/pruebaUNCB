@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Usuario</h2>
    <a class="btn btn-primary" href="{{ url('users') }}">
        Volver
    </a>
<br>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection