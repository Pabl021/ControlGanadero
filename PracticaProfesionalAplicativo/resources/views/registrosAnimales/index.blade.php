@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Registro animal</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        @can('crear-registroAnimal')
                        <a class="btn btn-success" href="{{ route('registrosAnimales.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                        <thead style="background-color: #9AA49F;">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#000000;">Nombre</th>
                                    <th style="color:#000000;">Fecha de nacimiento</th> 
                                    <th style="color:#000000;">Genero</th>     
                                    <th style="color:#000000;">Peso</th>   
                                    <th style="color:#000000;">Raza</th> 
                                    <th style="color:#000000;">En venta</th> 
                                    <th style="color:#000000;">Vendido</th>     
                                    <th style="color:#000000;">Estado</th>  
                                    <!-- <th style="color:#000000;">Descripción</th>   -->
                                    <th style="color:#000000;">Imagen</th>         
                                    <th style="color:#000000;">Acciones</th>                                                                   
                              </thead>
                            <tbody>
                                @foreach ($registrosAnimales as $regAni)
                                <tr>
                                <td style="display: none;">{{ $regAni->id }}</td>                                
                                <td>{{ $regAni->nombreAnimal }}</td>
                                <td>{{ $regAni->fechaDeNacimiento }}</td>
                                <td>{{ $regAni->genero }}</td>
                                <td>{{ $regAni->peso }}</td>
                                <td>{{ $regAni->raza }}</td>
                                <td>{{ $regAni->enVenta }}</td>
                                <td>{{ $regAni->vendido }}</td>
                                <td>{{ $regAni->estado }}</td>
                                <!-- <td>{{ $regAni->descripcion }}</td> -->
                                <td><img src="/imagen/{{$regAni->imagen}}" width="60%"></td>
                                    <td>
                                        <form action="{{ route('registrosAnimales.destroy',$regAni->id) }}" method="POST">

                                        @csrf
                                            @method('DELETE')
                                            @can('borrar-registroAnimal')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan

                                            @can('editar-registroAnimal')
                                            <a class="btn btn-info" href="{{ route('registrosAnimales.edit',$regAni->id) }}">Editar</a>
                                            @endcan

                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $registrosAnimales->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection