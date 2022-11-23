@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Animales preñados</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        @can('crear-animalPreñado')
                        <a class="btn btn-success" href="{{ route('animalesPreniados.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                        <thead style="background-color: #9AA49F;">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#000000;">Nombre del animal</th>
                                    <th style="color:#000000;">Fecha preñada</th> 
                                    <th style="color:#000000;">La madre murió en el parto</th>     
                                    <th style="color:#000000;">Cantidad de nacidos</th>   
                                    <th style="color:#000000;">Descripción</th> 
                                      
                                            
                                    <th style="color:#000000;">Acciones</th>                                                                   
                              </thead>
                            <tbody>
                                @foreach ($animalesPreniados as $aniPre)
                                <tr>
                                <td style="display: none;">{{ $aniPre->id }}</td>                                
                                <td>{{ $aniPre->getNombreAnimal()->nombreAnimal }}</td>
                                <td>{{ $aniPre->fechapreniado }}</td>
                                <td>{{ $aniPre->madreMurioEnParto }}</td>
                                <td>{{ $aniPre->cantidadDeNacidos }}</td>
                                <td>{{ $aniPre->descripcion }}</td>
                               
                                
                               
                                    <td>
                                        <form action="{{ route('animalesPreniados.destroy',$aniPre->id) }}" method="POST">

                                        @csrf
                                            @method('DELETE')
                                            @can('borrar-animalPreñado')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan

                                            @can('editar-animalPreñado')
                                            <a class="btn btn-info" href="{{ route('animalesPreniados.edit',$aniPre->id) }}">Editar</a>
                                            @endcan

                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $animalesPreniados->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection