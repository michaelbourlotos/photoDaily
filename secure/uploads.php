<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo!</title>
</head>
<body>
    <form action="gallery-upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="filetitle" placeholder="File Title..">
        <input type="date" name="filedate" placeholder="File Date ...">
        <input type="file" name="file" id="" >
        <button type="submit" name="submit">Upload</button>
    </form>






</body>
</html>