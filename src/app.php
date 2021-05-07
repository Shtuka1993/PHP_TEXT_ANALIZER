<?php
namespace app;

$templateStart = <<<TEMPLATE_START
<html>
    <head>
        <title>Text Analizer</title>
    </head>
    <body>
        <form method="post" action="">
            <textarea required name="text"></textarea><br>
            <input type="submit" value="SEND"><br>
        </form>
TEMPLATE_START;
echo $templateStart;
if (isset($_POST['text'])) {
    echo('<p><pre>');
    $text = trim($_POST['text']);
    $text = stripcslashes($text);
    $text = htmlspecialchars($text);
    echo new TextAnalizer($text);
    echo('</pre><p>');
}
$templateEnd = <<<TEMPLATE_END
    </body>
</html>
TEMPLATE_END;
echo $templateEnd;
