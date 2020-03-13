<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\PasswordUpdateSuccess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] message
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'Não encontramos um usuário com este endereço de email'
            ], 404);
        $passwordReset = PasswordReset::whereEmail($user->email)->first();
        if (!$passwordReset) {
            $passwordReset = new PasswordReset;
            $passwordReset->email = $user->email;
            $passwordReset->token = Str::random(6);
            $passwordReset->created_at = Carbon::now();
            $passwordReset->save();
        }
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        return response()->json([
            'message' => 'Enviamos um email com o código para recuperação de senha'
        ]);
    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return \Illuminate\Http\JsonResponse [string] message
     * @throws \Exception
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'O código de recuperação de senha é inválido'
            ], 404);
        if ($passwordReset->created_at->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'O código de recuperação de senha é inválido'
            ], 404);
        }
        return response()->json($passwordReset);
    }

    /**
     * Reset password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] message
     * @throws \Exception
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'O código de recuperação de senha é inválido'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'Não encontramos um usuário com este endereço de email'
            ], 404);
        $user->password = bcrypt($request->password);
        $user->save();
        PasswordReset::where('email', $request->email)->delete();
        $user->notify(new PasswordResetSuccess());
        return response()->json($user);
    }

    /**
     * Update password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [json] user object
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password_old' => 'required|string',
            'password_new' => 'required|string|confirmed'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'Não encontramos um usuário com este endereço de email'
            ], 404);
        if (!Hash::check($request->password_old, $user->password)) {
            return response()->json([
                'message' => 'Usuário ou senha inválidos'
            ], 403);
        }
        if ($request->password_old == $request->password_new) {
            return response()->json([
                'message' => 'A nova senha precisa ser diferente de outras utilizadas anteriormente'
            ], 400);
        }
        $user->password = bcrypt($request->password_new);
        $user->save();

        $user->notify(new PasswordUpdateSuccess());
        return response()->json($user);
    }
}
