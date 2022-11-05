@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Crear un registro animal</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Por favor revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <form action="{{ route('registrosAnimales.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombreAnimal">Nombre del animal</label>
                                        <input type="text" name="nombreAnimal" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fechaDeNacimiento">Fecha de nacimiento</label>
                                        <input type="date" name="fechaDeNacimiento" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="genero">Genero</label>
                                        <select required name="genero" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar Categoría</option>

                                            <option value="Toro">Toro</option>
                                            <option value="Vaca">Vaca</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <input type="numeric" name="peso" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="raza">Raza</label>
                                        <select required name="raza" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar una raza</option>
                                            @foreach ($raza as $raza)
                                            <option value="{{$raza->id}}">{{$raza->nombreRaza}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="enVenta">En venta</label>
                                        <select required name="enVenta" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar una opción</option>

                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="vendido">Vendido</label>
                                        <select required name="vendido" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar una opción</option>

                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select required name="estado" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar una opción</option>

                                            <option value="Vivo">Vivo</option>
                                            <option value="Muerto">Muerto</option>

                                        </select>

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-floating">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" name="descripcion" style="height: 100px"></textarea>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" id="imagen" name="imagen" class="hidden">
                                    </div>
                                </div>

                                <br>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection