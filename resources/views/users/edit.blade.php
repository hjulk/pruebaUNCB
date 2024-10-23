@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <a class="btn btn-primary" href="{{ url('users') }}">
        Volver
    </a>
<br>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $user->apellido }}" required>
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <div class="form-group">
            <label for="estado">Activo:</label>
            <select name="estado" class="form-control">
                <option value="1" {{ $user->estado ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$user->estado ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>
@endsection