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
        $users = User::query();
        $users->where('id', '!=', $request->user()->id);

        if ($nome = $request->get('nome')) {
            $users->where('name', 'LIKE', '%' . $nome . '%')
                ->orWhere('email', 'LIKE', '%' . $nome . '%');
        }

        $users = $users->orderBy('created_at', 'desc')
            ->paginate(10);

        $roles = Role::all();

        return view('admin.usuario.index')
            ->with('usuarios', $users)
            ->with('roles', $roles)
            ->with('request', $request);
    }

    public function show($id)
    {

    }

    public function store(UsuarioRequest $request)
    {
        $this->save($request->all());

        return Redirect::back()
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Usuário criado com sucesso"
                ]);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $user = User::find($id);

        $this->save($request->all(), $user);

        return Redirect::back()
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Usuário #" . $user->id . " foi atualizado com sucesso"
                ]);
    }

    public function create(Request $request)
    {

    }

    private function save($data, User $user = null)
    {
        if ($user == null)
            $user = new User();

        $user->name = $data['nome'];
        $user->email = $data['email'];

        if (isset($data['senha'])) {
            $user->password = Hash::make($data['senha']);
        }

        $user->roles()->sync($data['funcao']);

        $user->save();

        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->email = Carbon::now();
        $user->save();
        $user->delete();

        return redirect(route('usuarios.index'))
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Usuário deletado com sucesso"
                ]);
    }
}
