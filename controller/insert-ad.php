<?php 
    require '../instances-of-objects.php';

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $text = $_POST['text'];
        $countryId = $_POST['countryId'];
        $city = $_POST['city'];
        $categoryId = $_POST['categoryId'];
        $price = $_POST['price'];
        $currencyId = $_POST['currencyId'];
        $userId = $_SESSION['user']->user_id;

        $image1 = $_FILES['file1'];
        $image2 = $_FILES['file2'];
        $image3 = $_FILES['file3'];
        $image4 = $_FILES['file4'];
        $image5 = $_FILES['file5'];
            
        //Ako korisnik nije ulogovan salje ga na log im stranicu
        if(!isset($_SESSION['user'])){
            header('Location: view-log-in.php#logInForm');
        }else{

            $last_id = $ad->insertAd($title,$text,$countryId,$city,$categoryId,$price,$currencyId,$userId);

            if(isset($image1)){
                $filePath = $upload->uploadImage($image1,'../uploads/');
                $sql = "insert into ad_image values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$filePath]);
            }

            if(isset($image2)){
                $filePath = $upload->uploadImage($image2,'../uploads/');
                $sql = "insert into ad_image values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$filePath]);
            }

            if(isset($image3)){
                $filePath = $upload->uploadImage($image3,'../uploads/');
                $sql = "insert into ad_image values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$filePath]);
            }

            if(isset($image4)){
                $filePath = $upload->uploadImage($image4,'../uploads/');
                $sql = "insert into ad_image values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$filePath]);
            }

            if(isset($image5)){
                $filePath = $upload->uploadImage($image5,'../uploads/');
                $sql = "insert into ad_image values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$filePath]);
            }

            header("Location: ../view-insert-ad.php?adInserted={$user->adInserted}");
        }
    }
?>