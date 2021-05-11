<?php

if (isset($_POST['submit'])){

    $fileTitle = $_POST['filetitle'];
    $fileDate = $_POST['filedate'];
    print_r($fileDate);
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $FileExt = explode('.', $fileName);
    $FileActualExt = strtolower(end($FileExt));

    $allowedExt = array('jpg', 'jpeg', 'png');

    if (in_array($FileActualExt, $allowedExt)){
        if ($fileError === 0){
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$FileActualExt;
                $fileDest = '../uploads/'.$fileNameNew;

                include_once "../dbh.php";

                if (empty($fileTitle) || empty($fileDate)){
                    header("Location: uploads.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM photos;";
                    $stmt = mysqli_stmt_init($conn);
                    }
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL statement failed 1.";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO photos (datePhotos, fileFullNamePhotos, orderPhotos, titlePhotos) VALUES (?,?,?,?);";
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed 2.";
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssss", $fileDate, $fileNameNew, $setImageOrder, $fileTitle);
                        mysqli_stmt_execute($stmt);
                        
                        move_uploaded_file($fileTempName, $fileDest);
                        header("Location: uploads.php?uploadsuccess");

                    }
                }

               
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