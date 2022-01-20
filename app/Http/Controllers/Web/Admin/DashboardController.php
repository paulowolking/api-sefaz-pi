<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

define("BASE_URL", "https://webas.sefaz.pi.gov.br/dimp-ws/");

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('admin.dashboard')
            ->with('request', $request);
    }

    public function userSefaz(Request $request)
    {
        $user = $request->user();
        $user->user_sefaz = $request->get('user');
        $user->password_sefaz = $request->get('password');
        $user->save();

        return Redirect::back()
            ->with('message',
                [
                    "tipo" => "success",
                    "mensagem" => "Login Sefaz salvo com sucesso, você já pode tentar realizar consultas."
                ]);
    }

    public function cliente(Request $request)
    {
        $token = $this->getToken($request->user());
        $get_data = $this->callAPI('GET', BASE_URL . 'clientes/recuperar/'
            . $this->clean($request->get('cnpj')), false,
            $token);
        $response = json_decode($get_data, true);

        if ($response['status'] == 'SUCESSO') {
            return view('admin.dashboard')
                ->with('request', $request)
                ->with('data', $response['data']);
        } else {
            return view('admin.dashboard')
                ->with('message',
                    [
                        "tipo" => "danger",
                        "mensagem" => $get_data
                    ]);
        }
    }

    public function pagamento(Request $request)
    {
        $token = $this->getToken($request->user());
        $url = BASE_URL . 'meios-pagamentos/recuperar/' . $this->clean($request->get('cpf_cnpj'));

        if ($startDate = $request->get('start-date') and $endDate = $request->get('end-date')) {
            $url = "$url/" . $this->clean($startDate) . "/" . $this->clean($endDate);
        }

        $get_data = $this->callAPI('GET', $url
            , false,
            $token);
        $response = json_decode($get_data, true);

        if ($response['status'] == 'SUCESSO') {
            return view('admin.dashboard')
                ->with('request', $request)
                ->with('list', $response['list'])
                ->with('totalElements', $response['totalElements'])
                ->with('totalPages', $response['totalPages']);
        } else {
            return view('admin.dashboard')
                ->with('message',
                    [
                        "tipo" => "danger",
                        "mensagem" => $get_data
                    ]);
        }
    }

    function callAPI($method, $url, $data, $token = null)
    {
        $curl = curl_init();

        if ($token) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ));
        } else {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            ));
        }

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

    private function getToken(User $user)
    {
        $data_array = array(
            "usuario" => $user->user_sefaz,
            "senha" => $user->password_sefaz,
        );
        $make_call = $this->callAPI('POST', BASE_URL . 'auth', json_encode($data_array));
        $response = json_decode($make_call, true);
        return $response["token"];
    }

    function clean($string)
    {
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[\W]/', '', $string);
    }
}
