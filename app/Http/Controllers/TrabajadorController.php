<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{

    public function index()
    {
        $trabajadores = Trabajador::all();

        return view('trabajadores.index',compact('trabajadores'));
    }

    public function create()
    {

        return view ('trabajadores.create');
    }


    public function store(Request $request)
    {


                $validacion = $request->validate([
                    'nombre' => 'required|string',
                    'apellidos' => 'required|string',
                    'telefono' => 'required|string',
                    'email' => 'required|email',
                    'departamento' => 'required|in:compras,ventas,rrhh,i+d',
                    'cargos' => 'required',
                    'fecha_nacimiento' => 'required|date',
                    'sustituto' => 'required|boolean',
                    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                ], [
                    'nombre.required' => 'El nombre es obligatorio.',
                    'nombre.string' => 'El nombre debe ser un texto.',


                    'apellidos.required' => 'Los apellidos son obligatorios.',
                    'apellidos.string' => 'Los apellidos deben ser un texto.',


                    'telefono.required' => 'El teléfono es obligatorio.',
                    'telefono.string' => 'El teléfono debe ser un texto.',


                    'email.required' => 'El correo electrónico es obligatorio.',
                    'email.email' => 'El correo electrónico debe ser válido.',


                    'departamento.required' => 'El departamento es obligatorio.',
                    'departamento.in' => 'El departamento debe ser uno de los siguientes: compras, ventas, rrhh, i+d.',

                    'cargos.required' => 'Los cargos son obligatorios.',

                    'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
                    'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',

                    'sustituto.required' => 'El campo sustituto es obligatorio.',
                    'sustituto.boolean' => 'El campo sustituto debe ser verdadero o falso.',

                    'foto.image' => 'La foto debe ser una imagen válida.',
                    'foto.mimes' => 'La foto debe ser de tipo jpeg, png, jpg o gif.',

                ]);

                if($request->hasFile('foto')){

                    $nombrearchivo = $request->telefono;
                    $ruta =  $request->file('foto')->storeAs('avatar', $nombrearchivo.'.jpg', 'public');

                    $validacion['foto'] = $ruta;
                }else{

                    $validacion['foto'] = 'default.jpg';
                }


                $fecha_nacimiento = new DateTime($request->input('fecha_nacimiento'));
                $fecha_actual = new DateTime();
                $edad = $fecha_actual->diff($fecha_nacimiento)->y;


                $validacion['mayor55'] = ($edad >= 55) ? 1 : 0;
                $cargosArray = array_map('trim', explode(',', $request->cargos));

                $validacion['cargos'] = $cargosArray;

                Trabajador::create($validacion);
            return redirect()->route('trabajadores.index');



    }


    public function show($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        return view('trabajadores.show',compact('trabajador'));
    }


    public function edit($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        return view('trabajadores.edit',compact('trabajador'));
    }


    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email',
            'departamento' => 'required|in:compras,ventas,rrhh,i+d',
            'cargos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sustituto' => 'required|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',


            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser un texto.',


            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser un texto.',


            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',


            'departamento.required' => 'El departamento es obligatorio.',
            'departamento.in' => 'El departamento debe ser uno de los siguientes: compras, ventas, rrhh, i+d.',

            'cargos.required' => 'Los cargos son obligatorios.',

            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',

            'sustituto.required' => 'El campo sustituto es obligatorio.',
            'sustituto.boolean' => 'El campo sustituto debe ser verdadero o falso.',

            'foto.image' => 'La foto debe ser una imagen válida.',
            'foto.mimes' => 'La foto debe ser de tipo jpeg, png, jpg o gif.',

        ]);

        if($request->hasFile('foto')){

            $nombrearchivo = $request->telefono;
            $ruta =  $request->file('foto')->storeAs('avatar', $nombrearchivo.'.jpg', 'public');

            $validacion['foto'] = $ruta;
        }

        $fecha_nacimiento = new DateTime($request->input('fecha_nacimiento'));
        $fecha_actual = new DateTime();
        $edad = $fecha_actual->diff($fecha_nacimiento)->y;


        $validacion['mayor55'] = ($edad >= 55) ? 1 : 0;

       $trabajador = Trabajador::findOrFail($id);
       $trabajador->update($validacion);


        return redirect()->route('trabajadores.index');
    }


    public function destroy($id)
    {

        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        return redirect()->route('trabajadores.index');
    }

    public function filtrar(Request $request){


            $consulta = Trabajador::query();

            if ($request->apellidos != null) {
                $consulta->where('apellidos', 'like', '%' . $request->apellidos . '%');
            }

            if ($request->sustituto != null) {
                $consulta->where('sustituto', $request->sustituto);
            }

            if ($request->mayor_55 != null) {
                $consulta->where('mayor55', $request->mayor_55);
            }

            if ($request->departamento != null) {
                $consulta->where('departamento', $request->departamento);
            }

            $trabajadores = $consulta->get();

            return view('trabajadores.index', compact('trabajadores'));
        }



}
