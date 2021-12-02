<?php 
    require '../instances-of-objects.php';

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $text = $_POST['text'];
        $countryId = $_POST['countryId'];
        $city = $_POST['city'];
        $categoryId = $_POST['categoryId'];
        //$superCategoryId = $_POST['superCategoryId'];
        $superCategoryId = 1;
        $price = $_POST['price'];
        $currencyId = $_POST['currencyId'];
        $userId = $_SESSION['user']->user_id;
        $contact = $_POST['contact'];

        $currencyId = $_POST['currencyId'];

        $popId = $_POST['Pop'];
        $rockId = $_POST['Rock'];
        $folkId = $_POST['Folk'];
        $jazzId = $_POST['Jazz'];
        $metalId = $_POST['Metal'];
        $rhythmBluesId = $_POST['Rhythm & blues (R&B)'];
        $rapHipHopId = $_POST['Rap/Hip-hop'];
        $funkSoulId = $_POST['Funk/Soul'];
        $electronicId = $_POST['Electronic'];

        $image1 = $_FILES['file1'];
        $image2 = $_FILES['file2'];
        $image3 = $_FILES['file3'];
        $image4 = $_FILES['file4'];
        $image5 = $_FILES['file5'];
            
        //Ako korisnik nije ulogovan salje ga na log im stranicu
        if(!isset($_SESSION['user'])){
            header('Location: view-log-in.php#logInForm');
        }else{

            $last_id = $ad->insertAd($title,$text,$countryId,$city,$categoryId,$price,$currencyId,$userId,$contact,$superCategoryId);

            //Upload i insert slika oglasa
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

            //Insert tagova/atributa oglasa
            if(isset($popId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$popId]);
            }

            if(isset($rockId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$rockId]);
            }

            if(isset($folkId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$folkId]);
            }
            
            if(isset($jazzId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$jazzId]);
            }

            if(isset($metalId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$metalId]);
            }

            if(isset($rhythmBluesId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$rhythmBluesId]);
            }

            if(isset($rapHipHopId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$rapHipHopId]);
            }

            if(isset($funkSoulId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$funkSoulId]);
            }

            if(isset($electronicId)){
                $sql = "insert into ad_tag values (null,?,?);";
                $query = $upload->conn->prepare($sql);
                $check = $query->execute([$last_id,$electronicId]);
            }

            header("Location: ../view-insert-ad.php?adInserted={$ad->adInserted}");
        }
    }
?>