<?php
    class User extends ConnectionBuilder{

        public $userLogged = null;
        public $chechUserAdmin = null;
        
        public $userRegistered = null;
        public $roleAdded = null;
        public $roleDeleted = null;
        public $userExists = null;
        public $passwordChanged = null;

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

        public function checkEmail($email){
            $sql = "select * from users u where u.email = '{$email}'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function changePassword($email){
            $newPassword = rand(10000,99999);
            $sql = "update users 
            set password = '{$newPassword}'
            where email = '{$email}';";
            $query = $this->conn->prepare($sql);
            $query->execute();

            if($query->rowCount()>0){

                $from = 'svetmuzicara@svetmuzicara.com';
                $to = $email;
                $subject = 'Svet muzicara: Promena lozinke';
                $message = 'Nova lozinka je: '.$newPassword;
                $header = 'FROM: '.$from;
        
                mail($to,$subject,$message,$header);

                $this->passwordChanged = true;
            }else{
                $this->passwordChanged = false;
            }
        }

        public function registerUser($name,$email,$password){
            $sql = "insert into users values(null,?,?,?,1,null,null,CURRENT_TIMESTAMP(),null)";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute([$name,$email,$password]);

            if($checkInsert){
                $this->userRegistered = true;
            }else{
                $this->userRegistered = false;
            }
        }
        public function checkUserAdmin($userId){
            $sql = "select *
                    from users u
                    inner join user_role ur on ur.user_id = u.user_id
                    where u.user_id = {$userId}";

            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectUser($userId){
            $sql = "select u.*, c.name as country_name
                    from users u
                    inner join sf_country c on u.country_id = c.country_id
                    where u.user_id = {$userId}";

            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function updateUserImage($filePath,$userId){
            $sql = "update users 
            set profile_image = '{$filePath}'
            where user_id = {$userId};";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        public function updateUser($name,$countryId,$city,$telephone,$userId){
            $sql = "update users 
            set name = '{$name}', country_id = {$countryId}, city = '{$city}', telephone = '{$telephone}'
            where user_id = {$userId};";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

    }
?>