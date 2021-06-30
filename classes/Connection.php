<?php
    class Connection {
        //Parametri za konekciju na localhost
        public $host = 'localhost';
        public $dbname = 'muzicki_svet';
        public $username = 'root';
        public $password = '';

        //Parametri za konekciju na Unlimited hosting
        //public $host = 'localhost';
        //public $dbname = 'eshopc_svetmuzicara';
        //public $username = 'eshopc_svetmuzicara';
        //public $password = 'svetmuzicara#21';

        public function connect(){
            try{
                return new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",$this->username,$this->password);
            }
            catch(PDOException $e){
                echo 'Error'.$e->getMessage();
            }
        }
    }
?>