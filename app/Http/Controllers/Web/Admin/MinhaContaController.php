<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MinhaContaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class MinhaContaController extends Controller
{
    public function editar(Request $request)
    {
        $usuario = $request->user();
        return view('admin.minha-conta.form')
            ->with('usuario', $usuario);
    }

    public function atualizar(MinhaContaRequest $request)
    {
        $usuario = $request->user();
        $usuario->name = $request->get('nome');
        $usuario->email = $request->get('email');

        if ($request->get('password')) {
            $usuario->password = Hash::make($request->get('password'));
        }

        $usuario->save();

        return Redirect::back()
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Atualizado com sucesso"
                ]);
    }
}
