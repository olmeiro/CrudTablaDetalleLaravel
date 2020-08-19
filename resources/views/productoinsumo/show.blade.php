@extends('layouts.app')

@section('body')
    <div class="row">
        <div class="col">
            <h4 class="text-center">Productos</h4>
            <a href="/productoinsumo/listar">Crear</a>
                @if (session('status'))
                @if(session('status') == '1')
                    <div class="alert alert-success">
                        Se guardo correctamente
                    </div>
                    @else
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Insumos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->nombre_categoria }}</td>
                            <td>{{ $value->categoria }}</td>
                            <td>{{ $value->cantidad }}</td>
                            <td>{{ $value->precio }}</td>
                            <td>
                                <a class="btn btn-info" href="/productoinsumo/listar?id={{ $value->id }}">Ver</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if(count($insumos) > 0)
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Insumos</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insumos as $value)
                        <tr>
                            <td>{{ $value->nombre_categoria }}</td>
                            <td>{{ $value->cantidad_c }}</td>
                            <td>{{ $value->precio }}</td>
                            <td>{{ $value->precio * $value->cantidad_c }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection