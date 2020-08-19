@extends('layouts.app')

@section('body')
 <div class="row">
    <div class="col">
        <h3>Crear Productos</h1>
        <a href="/productoinsumo/listar">Listar</a>
    </div>
</div>
<form action="/productoinsumo/guardar" method="POST">
    @csrf
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="car-head">
                <h4 class="text-center">1. Información Producto</h4>
            </div>
            <div class="row card-body">
                <div class="form-group col-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group col-6">
                    <label for="">Categoria</label>
                    <select name="categoria_id" id="categoria_id" class="form-control">
                        <option value="">Seleccion</option>
                        @foreach($categoria as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre_categoria }}</option>
                        @endforeach
                    </select>           
                </div>
                <div class="form-group col-6">
                    <label for="">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad">
                </div>
                <div class="form-group col-6">
                    <label for="">Precio</label>
                    <input type="text" id="precio_total" class="form-control" name="precio" readonly>
                </div>
            </div>
        </div>
        <div class="col-12" style="margin-top: 5%">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-head">
            <h4 class="text-center">2. Información del insumo</h4>
            </div>
            <div class="row card-body">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <select name="insumos" id="insumos" class="form-control" onchange="colocar_precio()">
                            <option value="">Seleccione</option>
                            @foreach($insumos as $value)
                            <option precio="{{ $value->precio }}" value="{{ $value->id }}">{{ $value->nombre_insumo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" id="cantidad" class="form-control" name="cantidadinsumo" value="0">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Precio</label>
                        <input type="number" id="precio" class="form-control" value="0" name="precio">                     
                    </div>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" onclick="agregar_insumo()">Agregar</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="tblInsumos">

                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
@endsection

@section("scripts")
    <script>
        function colocar_precio(e)
        {
            let precio = $("#insumos option:selected").attr("precio");
            $("#precio").val(precio);

        }

        function agregar_insumo(){

            let insumo_id = $("#insumos option:selected").val();
            let insumo_text = $("#insumos option:selected").text();
            let cantidad = $("#cantidad").val();
            let precio = $("#precio").val();

            if(cantidad > 0 && precio > 0)
            {
                $("#tblInsumos").append(`

                    <tr id="tr-${insumo_id}">
                        <td>
                            <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            ${insumo_text}
                        </td>
                        <td>${cantidad}</td>
                        <td>${precio}</td>
                        <td>${parseInt(cantidad) * parseInt(precio)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${insumo_id}, ${parseInt(cantidad) * parseInt(precio)})">X</button>
                        </td>
                    </tr>

                `);
                let precio_total = $("#precio_total").val() || 0;
                $("#precio_total").val(parseInt(precio_total) + parseInt(cantidad) * parseInt(precio))
            }
            else{
                alert("Se debe ingresar cantidad y/o precio valido");
            }
        }

        function eliminar_insumo(id, subtotal){
            $("#tr-"+id).remove();
            let precio_total = $("#precio_total").val() || 0;
                $("#precio_total").val(parseInt(precio_total) - subtotal)
        }
    </script>
@endsection