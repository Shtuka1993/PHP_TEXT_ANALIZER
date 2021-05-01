<?php
    require("TextAnalizer.php");
?>

<html>
    <head>
        <title>Text Analizer</title>
    </head>
    <body>
        <form method="post" action="app.php">
            <textarea name="text"></textarea><br>
            <input type="submit" value="SEND"><br>
            <input type="file" name="file" id="file">
        </form>
    </body>
</html>