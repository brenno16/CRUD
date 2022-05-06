<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Vaga{

    /**
     * chave primaria
     * @var integer
     */
    public $id;

     /**
     * nome do funcionario
     * @var string
     */
    public $nome;

     /**
     * email
     * @var string
     */
    public $email;

     /**
     * funçao do funcionario
     * @var string
     */
    public $funcao;

     /**
     * telefone do candidato
     * @var string
     */
    public $telefone;

     /**
     * endereço do funcionario
     * @var integer
     */
    public $endereco;

    /**
     * Metodo para cadastrar a nova vaga
     * @return boolean
     */
    public function cadastrar(){

        //INSERIR O NOVO FUNCIONARIO NO BANCO DE DADOS
        $obDatabase = new Database('funcionario');
        $this -> id = $obDatabase -> insert([
                'nome' => $this -> nome,
                'email' => $this -> email,
                'funcao' => $this -> funcao,
                'telefone' => $this -> telefone,
                'endereco' => $this -> endereco
            ]);
        

        
        //ATRIBUIR O ID



        //RETORNA SUCESSO
        return true;
    }

    //MÉTODO RESPONSAVEL POR ATUALIZAR OS DADOS NO BANCO
    public function atualizar(){
        return (new Database('funcionario')) -> update('id = '.$this->id,[
            'nome' => $this -> nome,
                'email' => $this -> email,
                'funcao' => $this -> funcao,
                'telefone' => $this -> telefone,
                'endereco' => $this -> endereco]);
                
    }

    //MÉTODO RESPONSAVEL POR EXCLUIR OS DADOS 
    public function excluir(){

        return (new Database('funcionario')) ->delete('id = '.$this->id);
    }


 
    //MÉTODO RESPONSAVEL POR OBTER AS INFORMAÇOES DO BANCO DE DADOS
    public static function getVagas($where = null, $order = null, $limit = null){

        return (new Database('funcionario')) -> select($where,$order,$limit) -> fetchAll(PDO::FETCH_CLASS, self::class);

    }

    
    public static function getVaga($id){
        return (new Database('funcionario')) -> select('id = '.$id) -> fetchObject(self::class);

    }



}

?>