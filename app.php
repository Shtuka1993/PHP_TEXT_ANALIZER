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