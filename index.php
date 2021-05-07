<?php
    require("app.php");
?>

<html>
    <head>
        <title>Text Analizer</title>
    </head>
    <body>
        <form method="post" action="" enctype="multipart/form-data">
            <textarea name="text"></textarea><br>
            <input type="file" name="file" id="file"><br>
            <input type="submit" value="SEND"><br>
        </form>
    </body>
</html>