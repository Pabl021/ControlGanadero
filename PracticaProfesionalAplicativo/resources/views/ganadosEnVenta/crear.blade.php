@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Registrar animal en venta</h3>
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

                        <form action="{{ route('ganadosEnVenta.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="animal">Animal</label>
                                    <select id="animal" required name="nombreAnimal" class="form-control" value="" autocomplete="off" autofocus onchange="getDetails()">
                                        <option value="" selected disabled>Seleccionar un animal</option>
                                        @foreach ($registroAnimal as $animal)
                                        <option value="{{$animal->id}}">{{$animal->nombreAnimal}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="peso">Peso</label>
                                    <input id="peso" type="numeric" name="peso" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="raza">Raza</label>
                                    <input id="raza" type="text" name="raza" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <input id="genero" type="text" name="genero" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="precioDeVenta">Precio de venta</label>
                                    <input type="numeric" name="precioDeVenta" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fechaDeVenta">Fecha de venta</label>
                                    <input type="date" name="fechaDeVenta" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombreNuevoDuenio">Nombre del nuevo dueño</label>
                                    <input type="text" name="nombreNuevoDuenio" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" style="height: 100px"></textarea>

                                </div>
                            </div>
                            <br> 
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label  for="imagen">Imagen</label> <br>
                                        <input type="file" id="imagen" name="imagen">
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

@include('ganadosEnVenta.detail')

@endsection












