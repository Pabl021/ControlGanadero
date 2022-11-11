@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Registrar animal preñado</h3>
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

                        <form action="{{ route('animalesPreniados.store') }}" method="POST">
                            @csrf

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="animal">Animal</label>
                                    <select required name="nombreAnimal" class="form-control" value="" autocomplete="off" autofocus>
                                        <option value="" selected disabled>Seleccionar un animal</option>
                                        @foreach ($registroAnimal as $animal)
                                        <option value="{{$animal->id}}">{{$animal->nombreAnimal}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fechapreniado">Fecha del animal preñado</label>
                                    <input type="date" name="fechapreniado" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="madreMurioEnParto">La madre murió en el parto?</label>
                                    <select required name="madreMurioEnParto" class="form-control" value="" autocomplete="off" autofocus>
                                        <option value="" selected disabled>Seleccionar una opción</option>

                                        <option value="Si">Si</option>
                                        <option value="No">No</option>

                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="cantidadDeNacidos">Cantidad de nacimientos</label>
                                    <input type="number" name="cantidadDeNacidos" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" style="height: 100px"></textarea>

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