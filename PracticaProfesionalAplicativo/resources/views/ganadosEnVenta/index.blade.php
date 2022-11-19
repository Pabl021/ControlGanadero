@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Animales en venta</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        @can('admin-crearUsuario')
                        <a class="btn btn-success" href="{{ route('ganadosEnVenta.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                        <thead style="background-color: #9AA49F;">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#000000;">Nombre del animal</th>
                                    <th style="color:#000000;">Peso</th> 
                                    <th style="color:#000000;">Raza</th>     
                                    <th style="color:#000000;">Precio de venta</th> 
                                    <th style="color:#000000;">Fecha de venta</th> 
                                    <th style="color:#000000;">Nombre nuevo dueño</th>     
                                    <th style="color:#000000;">Observaciones</th> 
                                    <th style="color:#000000;">Imagen</th> 
                                            
                                    <th style="color:#000000;">Acciones</th>                                                                   
                              </thead>
                            <tbody>
                                @foreach ($ganadosEnVenta as $ganVen)
                                <tr>
                                <td style="display: none;">{{ $ganVen->id }}</td>                                
                                <td>{{ $ganVen->nombreAnimal }}</td>
                                <td>{{ $ganVen->peso }}</td>
                                <td>{{ $ganVen->raza }}</td>
                                <td>{{ $ganVen->precioDeVenta }}</td>
                                <td>{{ $ganVen->fechaDeVenta }}</td>
                                <td>{{ $ganVen->nombreNuevoDuenio }}</td>
                                <td>{{ $ganVen->observaciones }}</td>
                                
                                <td><img id="imagen" src="/imagenEnVenta/{{$ganVen->imagen}}" width="60%"></td>
     
                                    <td>
                                        <form action="{{ route('ganadosEnVenta.destroy',$ganVen->id) }}" method="POST">

                                        @csrf
                                            @method('DELETE')
                                            @can('admin-crearUsuario')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan

                                            @can('admin-crearUsuario')
                                            <a class="btn btn-info" href="{{ route('ganadosEnVenta.edit',$ganVen->id) }}">Editar</a>
                                            @endcan

                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $ganadosEnVenta->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection