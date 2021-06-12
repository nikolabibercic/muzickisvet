<?php
    class User extends ConnectionBuilder{

        public $userLogged = null;
        
        public $userRegistered = null;
        public $roleAdded = null;
        public $roleDeleted = null;

        public function loginUser($email,$password){
            $sql = "select * from users u where u.email = ? and u.password = ? ";
            $query = $this->conn->prepare($sql);
            $query->execute([$email,$password]);
            
            //Ovde koristim fetch metodu jer vraca samo jedan podatak, ne koristim fetchAll
            $checkUser = $query->fetch(PDO::FETCH_OBJ);

            if($checkUser != null){

                $this->userLogged = true;
                $_SESSION['user'] = $checkUser;

                header("Location: ../index.php?userLogged={$this->userLogged}");
            }else{
                header("Location: ../view-log-in.php?userLogged={$this->userLogged}");
            }       
        }

        public function registerUser($name,$email,$password){
            $sql = "insert into users values(null,?,?,?,'','','')";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute([$name,$email,$password]);

            if($checkInsert){
                $this->userRegistered = true;
            }else{
                $this->userRegistered = false;
            }
        }
    }
?>