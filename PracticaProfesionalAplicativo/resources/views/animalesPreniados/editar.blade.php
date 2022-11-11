@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading" style="color: #000000;">Editar raza</h3>
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


                    <form action="{{route('animalesPreniados.update',$animalPreniado->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombreAnimal">Animal</label>
                                        <select required name="nombreAnimal" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar un medicamento</option>
                                            @foreach ($registroAnimal as $med)
                                            <option {{$animalPreniado -> nombreAnimal == $med->id ? 'selected': ''}} value="{{$med->id}}">{{$med->nombreAnimal}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fechapreniado">Fecha del animal preñado</label>
                                    <input type="date" name="fechapreniado" class="form-control" value="{{ $animalPreniado->fechapreniado }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="madreMurioEnParto">La madre murió en el parto?</label>
                                        <select required name="madreMurioEnParto" class="form-control" value="" autocomplete="off" autofocus>
                                            <option value="" selected disabled>Seleccionar una opción</option>
                                            <option {{$animalPreniado->madreMurioEnParto =="Si" ? 'selected': ''}}>Si</option>
                                            <option {{$animalPreniado->madreMurioEnParto =="No" ? 'selected': ''}}>No</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="cantidadDeNacidos">Cantidad de nacimientos</label>
                                    <input type="number" name="cantidadDeNacidos" class="form-control" value="{{ $animalPreniado->cantidadDeNacidos }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" style="height: 100px">{{ $animalPreniado->descripcion }}</textarea>

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
