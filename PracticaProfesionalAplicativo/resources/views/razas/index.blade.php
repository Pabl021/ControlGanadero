@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000000;">Razas</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @can('crear-raza')
                        <a class="btn btn-success" href="{{ route('razas.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color: #9AA49F;">
                                <th style="display: none;">ID</th>
                                <th style="color:#000000;">Nombre</th>
                                <th style="color:#000000;">Peso promedio nacimiento</th>
                                <th style="color:#000000;">Peso Max Adulto</th>
                                <th style="color:#000000;">Observaciones</th>
                                <th style="color:#000000;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($raza as $raz)
                                <tr>
                                    <td style="display: none;">{{ $raz->id }}</td>
                                    <td>{{ $raz->nombreRaza }}</td>
                                    <td>{{ $raz->pesoPromNac }}</td>
                                    <td>{{ $raz->pesoMaxAdulto }}</td>
                                    <td>{{ $raz->observaciones }}</td>
                                    <td>
                                        <form action="{{ route('razas.destroy',$raz->id) }}" method="POST">
                                            @can('editar-raza')
                                            <a class="btn btn-info" href="{{ route('razas.edit',$raz->id) }}">Editar</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-raza')
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
                            {!! $raza->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection