@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Editar medicamento</h3>
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


                        <form action="{{route('medicamentos.update',$medicamento->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombreCategoria">Nombre de medicamento</label>

                                        <input type="text" name="nombreMedicamento" class="form-control" value="{{ $medicamento->nombreMedicamento }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombreCategoria">Categoria</label>
                                        <select required name="nombreCategoria" class="form-control" 
                                         autocomplete="off"
                                         autofocus>

                                            <option value="" selected disabled>Seleccionar Categoría</option>
                                            @foreach ($catMedicamento as $med)
                                            <option {{$medicamento->nombreCategoria ==$med->id ? 'selected': ''}} value="{{$med->id}}">{{$med->nombreCategoria}}</option>

                                            @endforeach

                                        </select>

                                    </div>


                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="via">Vía</label>
                                        <input type="text" name="via" class="form-control" value="{{ $medicamento->via }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="dosis">Dosis</label>
                                        <input type="text" name="dosis" class="form-control" value="{{ $medicamento->dosis }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-floating">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea class="form-control" name="observaciones" style="height: 100px">{{ $medicamento->observaciones }}</textarea>

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