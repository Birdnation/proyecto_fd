@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h2>Estado de <b>Usuarios</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido P.</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>cambiar estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->rut }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellido_paterno }}</td>
                            <td>{{ $user->telefono_movil }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>
                            @if ($user->status === 1)
                                <td>
                                    <form name="{{ $user->nombre }}" class="formulario" method="GET"
                                        action="{{ route('cambiarEstado', ['id' => $user->id]) }}">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form name="{{ $user->nombre }}" class="formulario" method="GET"
                                        action="{{ route('cambiarEstado', ['id' => $user->id]) }}">
                                        <button type="submit" class="btn btn-warning"><i
                                                class="fas fa-ban"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay users en la base de datos</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    @if ($users->links())
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    @endif
    <script>
        const formularios = document.getElementsByClassName("formulario");

        for (const form of formularios) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: `Cambiar estado usuario ${form.getAttribute("name")}`,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            })
        }
    </script>
@endsection
