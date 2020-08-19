<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Flash;
use DataTables;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function index(){
        return view('producto.index');
    }

    public function listar(Request $request){
        
        //Consulta con join

        $productos = Producto::select("producto.*","categoria.nombre_categoria")
        ->join("categoria", "producto.categoria_id", "=", "categoria.id")
        ->get();

        return DataTables::of($productos)
        ->editColumn("imagen", function($producto){
            $defecto = "favicon.ico";
            return "<img src='/uploads/".($producto->imagen==null?$defecto:$producto->imagen)."' width='100px' >";
        })     
        ->editColumn("estado", function($producto){ 
            return $producto->estado == 1 ? "Activo" : "Inactivo";
        })
        ->addColumn('editar', function ($producto) {
            return '<a class="btn btn-primary btn-sm" href="/producto/editar/'.$producto->id.'">Editar</a>';
        })
        ->addColumn('cambiar', function ($producto) {
            if($producto->estado == 1)
            {
                return '<a class="btn btn-danger btn-sm" href="/producto/cambiar/estado/'.$producto->id.'/0">Inactivar</a>';
            }
            else
            {
                return '<a class="btn btn-success btn-sm" href="/producto/cambiar/estado/'.$producto->id.'/1">Activar</a>';
            }
        })
        ->rawColumns(['editar', 'cambiar', 'imagen'])
        ->make(true);
    }



    public function create(){
        $categorias = Categoria::all();
        return view('producto.create', compact("categorias"));
    }

    public function save(Request $request){
        //dd('ruta ok');

        $request->validate(Producto::$rules);
        $input = $request->all();

        try {

            $imagen = null;
            if($request->imagen != null)
            {
                $imagen = $input["nombre_producto"].'.'.time().'.'.$request->imagen->extension();
                $request->imagen->move(public_path('uploads'), $imagen);
            }

            Producto::create([
                "nombre_producto" => $input["nombre_producto"],
                "categoria_id" => $input["categoria_id"],
                "precio" => $input["precio"],
                "cantidad" =>0,
                "estado" =>1,
                "imagen" => $imagen
            ]);

            Flash::success("Registro éxitoso de producto");
            return redirect("/producto");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/producto/crear");
        }   
    }

    public function edit($id){
        
        $categorias = Categoria::all();
        $producto = Producto::find($id);

        if ($producto==null) {
            
            Flash::error("Producto no encontrado");
            return redirect("/producto");
        }
        //else{
            return view("producto.edit", compact("producto", "categorias"));
        // }
    }

    public function update(Request $request){

        $request->validate(Producto::$rules);
        $input = $request->all();

        try {

            $producto = Producto::find($input["id"]);

            if ($producto==null) {
                Flash::error("Producto no encontrado");
                return redirect("/producto");
            }

            $producto->update([
                "nombre_producto"=>$input["nombre_producto"],
                "categoria_id"=>$input["categoria_id"],
                "precio"=>$input["precio"]
               
            ]);

            Flash::success("Se modifico el producto");
            return redirect("/producto");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/producto");
        }   
    }

    public function updateState($id, $estado){
        
        $producto = Producto::find($id);

        if ($producto==null) {
            Flash::error("Producto no encontrado");
            return redirect("/producto");
        }

        try {
            
            $producto->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado del producto");
            return redirect("/producto");

        } catch (\Exception $e) {
            
            Flash::error($e->getMessage());
            return redirect("/producto");
        }
    }
}


