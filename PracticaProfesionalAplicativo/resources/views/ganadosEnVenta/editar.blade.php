@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Editar animales en venta</h3>
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


                        <form action="{{route('ganadosEnVenta.update',$ganadoEnVenta->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombreAnimal">Animal</label>
                                        <select required id="animal" name="nombreAnimal" class="form-control" value="" autocomplete="off" autofocus onchange="getDetails()">
                                            <option value="" selected disabled>Seleccionar un medicamento</option>
                                            @foreach ($registroAnimal as $med)
                                            <option {{$ganadoEnVenta -> nombreAnimal == $med->id ? 'selected': ''}} value="{{$med->id}}">{{$med->nombreAnimal}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <input type="numeric" id="peso" name="peso" class="form-control" value="{{ $ganadoEnVenta->peso }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="raza">Raza</label>
                                        <input type="text" id="raza" name="raza" class="form-control" value="{{ $ganadoEnVenta->raza }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <input id="genero" type="text" name="genero" class="form-control" value="{{ $ganadoEnVenta->genero }}">
                                </div>
                            </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="precioDeVenta">Precio de venta</label>
                                        <input type="numeric" name="precioDeVenta" class="form-control" value="{{ $ganadoEnVenta->precioDeVenta }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fechaDeVenta">Fecha de venta</label>
                                        <input type="date" name="fechaDeVenta" class="form-control" value="{{ $ganadoEnVenta->fechaDeVenta }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombreNuevoDuenio">Nombre del nuevo dueño</label>
                                        <input type="text" name="nombreNuevoDuenio" class="form-control" value="{{ $ganadoEnVenta->nombreNuevoDuenio }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-floating">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea class="form-control" name="observaciones" style="height: 100px">{{$ganadoEnVenta->observaciones}}</textarea>

                                    </div>
                                </div>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" class="form-control" value="{{ $ganadoEnVenta->imagen }}">
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