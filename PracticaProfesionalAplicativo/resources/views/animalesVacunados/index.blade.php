@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Animales vacunados</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        @can('crear-aniVacunados')
                        <a class="btn btn-success" href="{{ route('animalesVacunados.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                        <thead style="background-color: #9AA49F;">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#000000;">Nombre</th>
                                    <th style="color:#000000;">Medicamento</th> 
                                    <th style="color:#000000;">Fecha Med. aplicado</th>     
                                    <th style="color:#000000;">Próximo medicamento</th>   
                                    <th style="color:#000000;">Enfermedad</th> 
                                    <th style="color:#000000;">Efectos</th> 
                                      
                                            
                                    <th style="color:#000000;">Acciones</th>                                                                   
                              </thead>
                            <tbody>
                                @foreach ($animalesVacunados as $aniVac)
                                <tr>
                                <td style="display: none;">{{ $aniVac->id }}</td>                                
                                <td>{{ $aniVac->nombreAnimal }}</td>
                                <td>{{ $aniVac->medicamento }}</td>
                                <td>{{ $aniVac->fechaMedAplicado }}</td>
                                <td>{{ $aniVac->proximoMedicamento }}</td>
                                <td>{{ $aniVac->enfermedad }}</td>
                                <td>{{ $aniVac->efectosSecundarios }}</td>
                                
                               
                                    <td>
                                        <form action="{{ route('animalesVacunados.destroy',$aniVac->id) }}" method="POST">

                                        @csrf
                                            @method('DELETE')
                                            @can('borrar-aniVacunados')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan

                                            @can('editar-aniVacunados')
                                            <a class="btn btn-info" href="{{ route('animalesVacunados.edit',$aniVac->id) }}">Editar</a>
                                            @endcan

                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $animalesVacunados->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection