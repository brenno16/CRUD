<?php

namespace App\Db;

use PDOException;
use \PDO;


class Database{

    const HOST = 'localhost';
    const NAME = 'cad_funcionarios';
    const USER = 'root';
    const PASS = '';

    /**TABELA A SER MANIPULADA */
    private $table;

    /**
     *INSTACIA DE CONEXÃO COM O BANCO DE DADOS 
      * @var PDO
      */
    private $connection;



    /**
     * DEFINE A TABELA PARA A CONEXÃO
     */
    public function __construct($table = null){

        $this -> table = $table;
        $this -> setConnection();

    }


    /**
     * METODO PARA CRIAR UMA CONEXÃO COM O BANCO DE DADOS
     */
    private function setConnection(){
        try{

            $this -> connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){

            die('ERROR: '.$e -> getMessage());

        }
    }

    //MÉTODO RESPONSAVEL POR EXECUTAR QUERYS DETRO DO BANCO DE DADOS
    public function execute($query,$params = []){

        try{
            $statement = $this -> connection -> prepare($query);
            $statement -> execute($params);
            return $statement;

        }catch(PDOException $e){

            die('ERROR: '.$e -> getMessage());

        }
    }

    

    public function insert($values){
        //DADOS DA QUERY

        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');
        
        

        //MONTA A QUERY
        $query = 'INSERT INTO ' .$this -> table. '('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';


        //EXECUTA O INSERT
        $this-> execute($query,array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    //MÉTODO REDPOSAVEL POR EXECUTAR UMA CONSULTA NO BAMCO
    public function select($where = null, $order = null , $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //MONTA QUERY
        $query = 'SELECT '.$fields.' FROM  '.$this->table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
        return $this -> execute($query);
    }

    //MÉTODO RESPONSAL POR RELIZAR AS ATUALIZAÇÕES NO BANCO DE DADOS
    public function update($where,$values){

        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        
        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

        return true;

    }

    //MÉTODO RESPOSAVEL POR EXCLUIR DADOS DO BANCO
    public function delete($where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        return true;    


    }

}