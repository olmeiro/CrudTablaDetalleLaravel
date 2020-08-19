@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Insumos</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/insumo/guardar" method="POST" enctype="multipart/form-data">
        @csrf  
            <div class="row">  
            <div class="col-6">       
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre Insumo</label>
                        <input type="text" class="form-control @error('nombre_insumo') is-invalid @enderror"  name="nombre_insumo" id="nombre_insumo">
                        @error('nombre_insumo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="text" class="form-control @error('cantidad') is-invalid @enderror"  name="cantidad" id="cantidad">
                        @error('cantidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
          
                <div class="col-6">
                <div class="form-group">
                        <label for="">Precio</label>
                        <input type="text" class="form-control" name="precio" id="precio">
                    </div> 
                </div>   
                </div>
            </div>
            <button type="submit" class="btn btn-success float-lg-right">Guardar</button>
            </form>   
        </div>
    </div>
@endsection