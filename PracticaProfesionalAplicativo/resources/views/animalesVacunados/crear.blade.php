@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Registrar control de salud animal</h3>
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

                        <form action="{{ route('animalesVacunados.store') }}" method="POST">
                            @csrf

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="animal">Animal</label>
                                    <select required name="nombreAnimal" class="form-control" value="" autocomplete="off" autofocus>
                                        <option value="" selected disabled>Seleccionar un animal</option>
                                        @foreach ($animales as $animal)
                                        <option value="{{$animal->id}}">{{$animal->nombreAnimal}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="medicamento">Medicamento</label>
                                    <select required name="medicamento" class="form-control" value="" autocomplete="off" autofocus>
                                        <option value="" selected disabled>Seleccionar un medicamento</option>
                                        @foreach ($medicamento as $med)
                                        <option value="{{$med->id}}">{{$med->nombreMedicamento}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fechaMedAplicado">Fecha de aplicación del medicamento</label>
                                    <input type="date" name="fechaMedAplicado" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="proximoMedicamento">Siguente fecha de aplicación</label>
                                    <input type="date" name="proximoMedicamento" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="enfermedad">Enfermedad</label>
                                    <select required name="enfermedad" class="form-control" value="" autocomplete="off" autofocus>
                                        <option value="" selected disabled>Seleccionar un enfermedad</option>
                                        @foreach ($enfermedad as $enf)
                                        <option value="{{$enf->id}}">{{$enf->nombreEnfermedad}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">
                                    <label for="efectosSecundarios">Efectos secundarios</label>
                                    <textarea class="form-control" name="efectosSecundarios" style="height: 100px"></textarea>

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