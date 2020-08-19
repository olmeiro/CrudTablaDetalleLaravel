@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Modificar Insumo</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/insumo/actualizar" method="POST" enctype="multipart/form-data">
        @csrf  
        <input type="hidden" name="id" value="{{$insumo->id}}"/>
            <div class="row">         
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nombre Insumo</label>
                        <input value="{{$insumo->nombre_insumo}}" type="text" class="form-control @error('nombre_insumo') is-invalid @enderror"  name="nombre_insumo">
                        @error('nombre_insumo')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input value="{{$insumo->cantidad}}" type="text" class="form-control @error('cantidad') is-invalid @enderror"  name="cantidad">
                        @error('cantidad')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                <div class="form-group">
                        <label for="">Precio</label>
                        <input value="{{$insumo->precio}}" type="text" class="form-control" name="precio">
                    </div> 
                </div>   
                </div>
            </div>
            <button type="submit" class="btn btn-warning float-lg-right">Modificar</button>
            </form>   
        </div>
    </div>

@endsection