@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Insumos</strong>
            <a href="/insumo/crear" class="btn btn-link">Crear Insumos</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_insumo" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>Nombre insumo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section("scripts")

    <script>
        $('#tbl_insumo').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/insumo/listar',
                columns: [
                 
                    {
                     data: 'nombre_insumo',
                     name: 'nombre_insumo'
                    },
                    {
                        data: 'cantidad',
                        name: 'cantidad'
                    },
                    {
                        data: 'precio',
                        name: 'precio'
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

    </script>
@endsection
