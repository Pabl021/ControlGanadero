@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading" style="color: #000000;">Categoría de medicamentos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-categoriaMedicamentos')
                        <a class="btn btn-success" href="{{ route('categoriaDeMedicamentos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color: #9AA49F;">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#000000;">Nombre</th>
                                    <th style="color:#000000;">Descripción</th>                                    
                                    <th style="color:#000000;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($categoriaDeMedicamentos as $catMed)
                            <tr>
                                <td style="display: none;">{{ $catMed->id }}</td>                                
                                <td>{{ $catMed->nombreCategoria }}</td>
                                <td>{{ $catMed->descripcion }}</td>
                                <td>
                                    <form action="{{ route('categoriaDeMedicamentos.destroy',$catMed->id) }}" method="POST">                                        
                                        @can('editar-categoriaMedicamentos')
                                        <a class="btn btn-info" href="{{ route('categoriaDeMedicamentos.edit',$catMed->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-categoriaMedicamentos')
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
                            {!! $categoriaDeMedicamentos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
