<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::query();
        $usuarios->where('id', '!=', $request->user()->id);

        if ($nome = $request->get('nome')) {
            $usuarios->where('name', 'LIKE', '%' . $nome . '%')
                ->orWhere('email', 'LIKE', '%' . $nome . '%');
        }

        $usuarios = $usuarios->orderBy('created_at', 'desc')
            ->paginate(10);

        $roles = Role::all();

        return view('admin.usuario.index')
            ->with('usuarios', $usuarios)
            ->with('roles', $roles)
            ->with('request', $request);
    }

    public function show($id)
    {

    }

    public function store(UsuarioRequest $request)
    {
        $this->salvarUsuario($request);
        return Redirect::back()
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Usuário criado com sucesso"
                ]);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario = User::find($id);
        $this->salvarUsuario($request, $usuario);
        return Redirect::back()
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Usuário #" . $usuario->id . " foi atualizado com sucesso"
                ]);
    }

    public function create(Request $request)
    {

    }

    private function salvarUsuario(UsuarioRequest $request, User $usuario = null)
    {
        if ($usuario == null)
            $usuario = new User();

        $usuario->name = $request->get('nome');
        $usuario->email = $request->get('email');

        if ($request->get('password')) {
            $usuario->password = Hash::make($request->get('password'));
        }

        $usuario->save();
        $usuario->roles()->sync($request->get('permissao'));

        return $usuario;
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->email = Carbon::now();
        $usuario->save();
        $usuario->delete();

        return redirect(route('usuarios.index'))
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Usuário deletado com sucesso"
                ]);
    }
}
