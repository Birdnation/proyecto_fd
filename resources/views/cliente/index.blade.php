@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h2>Administrar <b>Solicitudes</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Nº Solicitud</th>
                        <th>Fecha y Hora Solicitud</th>
                        <th>Estado</th>
                        <th>Estilista</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ $solicitud->fecha_solicitud }} - {{ $solicitud->hora_solicitud }}</td>
                            <td>{{ $solicitud->estado }}</td>
                            @if($solicitud->estilista_id)
                                <td>{{ App\Models\User::getUserNameById($solicitud->estilista_id) }}</td>
                                <td>
                                <a href="" class="edit"><i class="fa-solid fa-comment-dots"></i></a>
                            </td>

                            @else
                                <td>-</td>
                                <td>
                                <a href="" class="edit"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                            @endif


                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay solicitudes</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>




        </div>
    </div>
    @if ($solicitudes->links())
        <div class="d-flex justify-content-center">
            {!! $solicitudes->links() !!}
        </div>
    @endif
@endsection
