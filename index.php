<?php
    require("TextAnalizer.php");
?>

<html>
    <head>
        <title>Text Analizer</title>
    </head>
    <body>
        <form method="post" action="">
            <textarea name="text"></textarea><br>
            <input type="submit" value="SEND"><br>
            <input type="file" name="file" id="file">
        </form>
            <?php
                if(isset($_POST['text'])) {
                	echo('<p><pre>');
                	$text = trim($_POST['text']);
                	$text = stripcslashes($text);
                	$text = htmlspecialchars($text);
                    echo new TextAnalizer($text);
                    echo('</pre><p>');
                }
            ?>
    </body>
</html>