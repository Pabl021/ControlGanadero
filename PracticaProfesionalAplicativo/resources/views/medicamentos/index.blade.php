@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading" style="color: #000000;">Medicamentos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
                        @can('crear-medicamentos')
                        <a class="btn btn-success" href="{{ route('medicamentos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color: #9AA49F;">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#000000;">Nombre</th>
                                    <th style="color:#000000;">Categoría</th> 
                                    <th style="color:#000000;">Vía</th>     
                                    <th style="color:#000000;">Dosis</th>   
                                    <th style="color:#000000;">Observaciones</th>                            
                                    <th style="color:#000000;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($medicamentos as $medi)
                            <tr>
                                <td style="display: none;">{{ $medi->id }}</td>                                
                                <td>{{ $medi->nombreMedicamento }}</td>
                                <td>{{ $medi->nombreCategoria }}</td>
                                <td>{{ $medi->via }}</td>
                                <td>{{ $medi->dosis }}</td>
                                <td>{{ $medi->observaciones }}</td>
                                <td>
                                    <form action="{{ route('medicamentos.destroy',$medi->id) }}" method="POST">                                        
                                        @can('editar-medicamentos')
                                        <a class="btn btn-info" href="{{ route('medicamentos.edit',$medi->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-medicamentos')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $medicamentos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
