<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index() {
        $listaPersona = DB::table('table_persona')->get();
        return view('index')->with('listaPersona', $listaPersona);
    }

    public function name(Request $request) {
        $name = $request->get('filter');
        $listaPersona = DB::select('select * from table_persona where nombre like "%'.$name.'%"');
        return view('index')->with('listaPersona', $listaPersona);
    }

    public function gender(Request $request) {
        $gender = $request->get('filter');
        $listaPersona = DB::select('select * from table_persona where sexo = "'.$gender.'"');
        return view('index')->with('listaPersona', $listaPersona);
    }

    public function age(Request $request) {
        $age = $request->get('filter');
        $listaPersona = DB::select('select * from table_persona where edad > 25 and edad < 55');
        return view('index')->with('listaPersona', $listaPersona);
    }

    public function view(Request $request) {
        $id = $request->get('id');
        $persona = DB::select('select * from table_persona where id = "'.$id.'"');
        return view('view')->with('persona', $persona);
    }

    public function del(Request $request) {
        $id = $request->get('id');
        DB::delete('delete from table_persona where id = "'.$id.'"');
        return $this->index();
    }

    public function add(Request $request) {
        $name = $request->get('name');
        $gender = $request->get('gender');
        $age = $request->get('age');
        $phone = $request->get('phone');
        $mail = $request->get('mail');

        DB::insert('insert into table_persona values(default,"'.$name.'","'.$gender.'","'.$age.'","'.$phone.'","'.$mail.'")');
        return $this->index();
    }

    public function mod(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $gender = $request->get('gender');
        $age = $request->get('age');
        $phone = $request->get('phone');
        $mail = $request->get('mail');

        DB::insert('update table_persona set nombre="'.$name.'", sexo="'.$gender.'", edad="'.$age.'", movil="'.$phone.'", correo="'.$mail.'" where id="'.$id.'"');
        return $this->index();
    }
}
