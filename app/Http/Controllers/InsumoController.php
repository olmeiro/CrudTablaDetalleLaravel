<?php

namespace App\Http\Controllers;

use App\Models\Insumo;

use Flash;

use DataTables;

use Illuminate\Http\Request;

class InsumoController extends Controller
{
        public function index(){
            return view('insumo.index');
        }
    
        public function listar(Request $request){

            $insumo = Insumo::all();
    
            return DataTables::of($insumo)
            ->addColumn('editar', function ($insumo) {
                return '<a class="btn btn-primary btn-sm" href="/insumo/editar/'.$insumo->id.'">Editar</a>';
            })
            ->rawColumns(['editar'])
            ->make(true);
        }
    
    
    
        public function create(){
            $insumo = Insumo::all();
            return view('insumo.create');
        }
    
        public function save(Request $request){
            //dd('ruta ok');
    
            $request->validate(Insumo::$rules);
            $input = $request->all();
    
            try {
    
                Insumo::create([
                    "nombre_insumo" => $input["nombre_insumo"],
                    "cantidad" => $input["cantidad"],
                    "precio" => $input["precio"],
                ]);
    
                Flash::success("Registro éxitoso de insumo");
                return redirect("/insumo");
    
            } catch (\Exception $e ) {
                Flash::error($e->getMessage());
                return redirect("/insumo/crear");
            }   
        }
    
        public function edit($id){
            
            $insumo = Insumo::find($id);
    
            if ($insumo==null) {
                
                Flash::error("Insumo no encontrado");
                return redirect("/insumo");
            }
            else{
                return view("insumo.edit", compact("insumo"));
            }
        }
    
        public function update(Request $request){

            $request->validate(Insumo::$rules);
            $input = $request->all();
    
            try {
    
                $insumo = Insumo::find($input["id"]);
    
                if ($insumo==null) {
                    Flash::error("Insumo no encontrado");
                    return redirect("/insumo");
                }
    
                $insumo->update([
                    "nombre_insumo"=>$input["nombre_insumo"],
                    "cantidad"=>$input["cantidad"],
                    "precio"=>$input["precio"]
                   
                ]);
    
                Flash::success("Se modifico el insumo");
                return redirect("/insumo");
    
            } catch (\Exception $e ) {
                Flash::error($e->getMessage());
                return redirect("/insumo");
            }   
        }
    
}
