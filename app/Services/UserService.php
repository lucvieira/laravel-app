<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use \Exception;
/**
 * UserService
 *
 * @author Lucas Vieira <lucasvieiraa@hotmail.com.br>
 */
class UserService
{
    /**
     * @param $idUser
     */
    public function getUserById($idUser)
    {

        $user = DB::table('users')
                ->where('id', $idUser)
                ->select('id','nome', 'cpf', 'telefone', 'placa_carro')
                ->first();

        if ($user === null) {

            return [
                'message'=>'Usuário não existente.',
                'code'=>404
            ];
        }

        return $user;
    }

    /**
     * @param $numeroPlaca
     */
    public function getFinalPlacaByNumero($numeroPlaca)
    {
        try {

            $users = DB::table('users')
                ->where('placa_carro', 'like', '%%%%%%' . $numeroPlaca )
                ->select('id','nome', 'cpf', 'telefone', 'placa_carro')
                ->get();

            if (count($users) == 0) {

                return [
                    'message'=>'Não foi encontrada nenhuma placa.',
                    'code'=>404
                ];
            }

        } catch (\Exception $e){

            return [
                'message'=>$e->errorInfo[2],
                'code'=>400
            ];
        }
    }

    /**
     * @param $dataUser
     */
    public function createNewUser($dataUser)
    {
        try {

            $user = DB::table('users')->insert($dataUser);

            if ($user === null) {

                return [
                    'message'=>'Não foi possivel cadastrar esse usuário.',
                    'code'=>400
                ];
            }else {

                return [
                    'message'=>'Usuário cadastrado com sucesso.',
                    'code'=>200
                ];
            }

        } catch (\Exception $e){

            if($e->errorInfo[1] == 1062){

                return [
                    'message'=>$e->errorInfo[2],
                    'code'=>400
                ];
            }
        }
    }

    /**
     * @param $dataUser
     * @param $idUser
     */
    public function updateUser($dataUser, $idUser)
    {
        try {

            $user = DB::table('users')
                ->where('id', $idUser)
                ->update($dataUser);

            if ($user === null) {

                return [
                    'message'=>'Não foi possivel atualizar esse usuário.',
                    'code'=>400
                ];
            }else {

                return [
                    'message'=>'Usuário atualizado com sucesso.',
                    'code'=>200
                ];
            }

        } catch (\Exception $e){

            if($e->errorInfo[1] == 1062){

                return [
                    'message'=>$e->errorInfo[2],
                    'code'=>400
                ];
            }
        }
    }

    /**
     * @param $idUser
     */
    public function deleteUser($idUser)
    {
        try {

            $user = DB::table('users')
                    ->where('id', $idUser)
                    ->delete();

            if (!$user) {

                return [
                    'message'=>'Não foi possivel remover esse usuário.',
                    'code'=>400
                ];
            }else {

                return [
                    'message'=>'Usuário removido com sucesso.',
                    'code'=>200
                ];
            }

        } catch (\Exception $e){

            return [
                'message'=>$e->errorInfo[2],
                'code'=>404
            ];
        }
    }
}
?>
