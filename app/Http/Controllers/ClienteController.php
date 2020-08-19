<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        return view('cliente.index');
    }

    public function create(){
        return view('cliente.create');
    }

    public function save(Request $request){
        
        $request->validate(Cliente::$rules);

        $input = $request->all();

        try {
            Cliente::create([
                "nombre" => $input["nombre_producto"],
                "apellido1" => $input["categoria_id"],
                "apellido2" => $input["precio"],
                "documento" => $input["precio"],
                "estado" =>1,
                "telefono" => $input["precio"],
                "correo" => $input["precio"],
            ]);

            Flash::success("Registro éxitoso de cliente");
            return redirect("/cliente");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/cliente/crear");
        } 
    }

    public function edit($id){
        
        $cliente = Cliente::find();

        if ($cliente==null) {
            
            Flash::error("cliente no encontrado");
            return redirect("/cliente");
        }
        else{
            return view("cliente.edit", compact("cliente"));
        }
    }

    public function update(Request $request){

        $request->validate(Cliente::$rules);
        $input = $request->all();

        try {

            $cliente = Cliente::find($input["id"]);

            if ($cliente==null) {
                Flash::error("Cliente no encontrado");
                return redirect("/cliente");
            }

            $cliente::update([
                "nombre"=>$input["nombre"],
                "apellido1"=>$input["apellido1"],
                "apellido2"=>$input["apellido2"],
                "documento"=>$input["documento"],
                //"estado"=>$input["estado"],
                "telefono"=>$input["telefono"],
                "email"=>$input["email"],
               
            ]);

            Flash::success("Se modifico el cliente");
            return redirect("/cliente");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/cliente");
        }   
    }

    public function updateState($id, $estado){
        
        $cliente = Cliente::find($id);

        if ($cliente==null) {
            Flash::error("Cliente no encontrado");
            return redirect("/cliente");
        }

        try {
            
            $cliente->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado del cliente");
            return redirect("/cliente");

        } catch (\Exception $e) {
            
            Flash::error($e->getMessage());
            return redirect("/cliente");
        }
    }
}
 