@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Productos</strong>
            <a href="/producto/crear" class="btn btn-link">Crear Producto</a>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_producto" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Editar</th>
                    <th>Cambiar Estado</th>
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
        $('#tbl_producto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/producto/listar',
                columns: [
                    {
                     data: 'nombre_producto',
                     name: 'nombre_producto'
                    },
                    {
                     data: 'imagen',
                     name: 'imagen',
                     orderable: false,
                     searchable: false
                    },
                    {
                        data: 'nombre_categoria',
                        name: 'nombre_categoria'
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
                        data: 'estado',
                        name: 'estado'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'editar',
                        name: 'editar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'cambiar',
                        name: 'cambiar',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

    </script>
@endsection

