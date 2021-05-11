<?php
    if (isset($_POST['submit'])){
        $file = $_FILES['file'];
       
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
    
        $FileExt = explode('.', $fileName);
        $FileActualExt = strtolower(end($FileExt));
    
        $allowedExt = array('jpg', 'jpeg', 'png');
    
        if (in_array($FileActualExt, $allowedExt)){
            if ($fileError === 0){
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$FileActualExt;
                    $fileDest = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header("Location: uploads.php?uploadsuccess");
                } else {
                    echo "your file is too large";
                }
            } else {
                echo "upload error";
            }
        } else {
            echo "File extension not supported";
        }
    
    }

