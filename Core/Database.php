<?php
namespace Core;
use PDO;
    class Database {
       public $connection;
       public $statement;
        public function __construct($config,$username='root', $password='')
        {

            $dns= "mysql:". http_build_query($config,'',';');
            $this->connection = new PDO($dns,$username,$password,[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        public function query($query , $parms=[] ){
            $this->statement=$this->connection->prepare($query);
            $this->statement->execute($parms);
            return $this;
        }
        public function get(){
            return $this->statement->fetchAll();
        }
        public function find(){
            return $this->statement->fetch();
        }
        public function findOrFail(){
            $result = $this->statement->fetch();
            if(!$result){
                abort(Response::NOT_FOUND);
            }else{
                return $result;
            }
        }
    }