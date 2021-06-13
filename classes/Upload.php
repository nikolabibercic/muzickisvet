<?php
    class Upload extends ConnectionBuilder {

        public function uploadImage($file,$location){
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];
    
            $fileExt = explode('.',$fileName); //razdvajam string tamo gde je tacka i pravim niz
            $fileActualExt = strtolower(end($fileExt)); //izvlacim ekstenziju iz imena fajla
            $fileActualName = strtolower($fileExt[0]); //izvlacim naziv bez eksetenzije iz imena fajla
            
            $allawed = array('jpg','jpeg','png');

            if(in_array($fileActualExt,$allawed)){
                if($fileError===0){
                    if($fileSize < 30000000){
                        $fileNameNew = $fileActualName.'_'.uniqid('',true).".".$fileActualExt;
                        $fileDestination = $location.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);

                        return $fileNameNew;
                    }else{
                        echo 'Your file is too big';
                    }
                }else{
                    echo 'There was an error uploading your file!';
                }
            }else{
                echo 'You can not upload files of this type!';
            }
        }
    }
?>