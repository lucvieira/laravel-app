<?php
namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

/**
 * UserController
 *
 * @author Lucas Vieira <lucasvieiraa@hotmail.com.br>
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

     /**
     * Consulta dados de um cliente.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getUserById(Request $request)
    {
        $user = $this->userService->getUserById( $request->id );

        return response()->json($user);
    }

    /**
     * Consulta todos os clientes cadastrados na base
     * onde o último número da placa do carro é igual ao número informado.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getFinalPlacaByNumero(Request $request)
    {

        $users = $this->userService->getFinalPlacaByNumero( $request->numero );

        $response = array("message"=>$users['message']);

        return response()->json($response, $users['code']);
    }


    /**
     * Cadastra um novo cliente.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNewUser(UserRequest $request)
    {

        $dataUser = array(
            'nome'=> $request->nome,
            'cpf'=> $request->cpf,
            'placa_carro'=> $request->placa_carro,
            'telefone'=> $request->telefone
        );

        $user = $this->userService->createNewUser($dataUser);

        $dataUser['id'] = isset($user['id']) ? $user['id'] : null;

        $response = array("user"=>$dataUser, "message"=>$user['message']);

        return response()->json($response, $user['code']);
    }

    /**
     * Edita um cliente.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(UserRequest $request)
    {

        $dataUser = array(
            'nome'=> $request->nome,
            'cpf'=> $request->cpf,
            'placa_carro'=> $request->placa_carro,
            'telefone'=> $request->telefone
        );

        $user = $this->userService->updateUser($dataUser, $request->id);

        $response = array("user"=>$dataUser, "message"=>$user['message']);

        return response()->json($response, $user['code']);
    }

    /**
     * Remoção de um cliente existente.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(Request $request)
    {
        $user = $this->userService->deleteUser( $request->id );

        $response = array("message"=>$user['message']);
        return response()->json($response, $user['code']);
    }
}
?>
