@extends('layouts.base')
@section('title', 'Crear empleados')
@section('scripts')
    <script src={{ asset('/js/empleado.js') }}></script>
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Crear empleado</h2>
            <div class="row">
                <form action={{ route('empleados.store') }} method="POST" class="col s12" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="IDEMPLEADO" required>
                            <label for="IDEMPLEADO">Id Empleado</label>
                            @error('IDEMPLEADO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="NOMBRE">
                            <label for="NOMBRE">NOMBRE</label>
                            @error('NOMBRE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="datepicker" name="FECHAINI" required>
                            @error('FECHAINI')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn grey darken-2">
                                    <span>Foto</span>
                                    <input type="file" name="FOTO">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            @error('FOTO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn grey darken-2">
                                    <span>Hoja de vida</span>
                                    <input type="file" name="HOJAVIDA" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            @error('HOJAVIDA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="TELEFONO" required>
                            <label for="TELEFONO">TELEFONO</label>
                            @error('TELEFONO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="EMAIL" required>
                            <label for="EMAIL">EMAIL</label>
                            @error('EMAIL')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="DIRECCION" required>
                            <label for="DIRECCION">DIRECCION</label>
                            @error('DIRECCION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="Y" required>
                            <label for="Y">Y</label>
                            @error('Y')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="X" required>
                            <label for="X">X</label>
                            @error('X')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <select name="fkEMPLE_JEFE">
                                <option value="" disabled selected>fkEMPLE_JEFE</option>
                                @foreach ($empleados as $empleado)
                                    <option value={{ $empleado->IDEMPLEADO }}>{{ $empleado->NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field col s4">
                            <select name="FKCARGO">
                                <option value="" disabled selected>Elija su opción</option>
                                @foreach ($cargos as $cargo)
                                    <option value={{ $cargo->IDCARGO }}>{{ $cargo->NOMBRE }}</option>
                                @endforeach
                            </select>
                            <label>Cargo</label>
                            @error('FKCARGO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <select name="fkAREA">
                                <option value="" disabled selected>Elija su opción</option>
                                @foreach ($areas as $area)
                                    <option value={{ $area->IDAREA }}>{{ $area->NOMBRE }}</option>
                                @endforeach
                            </select>
                            <label>Area</label>
                            @error('fkAREA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="center">
                        <a href={{ route('empleados.index') }} class="btn waves-effect waves-light grey darken-2">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Crear
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
