@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Enfermedades</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @can('crear-enfermedad')
                        <a class="btn btn-success" href="{{ route('enfermedades.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color: #9AA49F;">
                                <th style="display: none;">ID</th>
                                <th style="color:#000000;">Nombre</th>
                                <th style="color:#000000;">Síntomas</th>
                                <th style="color:#000000;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($enfermedad as $enf)
                                <tr>
                                    <td style="display: none;">{{ $enf->id }}</td>
                                    <td>{{ $enf->nombreEnfermedad }}</td>
                                    <td>{{ $enf->sintomas }}</td>
                                    <td>
                                        <form action="{{ route('enfermedades.destroy',$enf->id) }}" method="POST">
                                            @can('editar-enfermedad')
                                            <a class="btn btn-info" href="{{ route('enfermedades.edit',$enf->id) }}">Editar</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-enfermedad')
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
                            {!! $enfermedad->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection