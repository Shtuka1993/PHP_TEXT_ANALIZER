<?php
namespace app;

require_once("TextAnalizer.php");

use TextAnalizer;

/**
 * Sort array of strings by length of strings
 * Remove all dublicats
 * Works with UTF-8
 * @param array array
 * @return array
 */
function sortByLength(array $array):array
{
    $result = [];
    foreach ($array as $item) {
        if (!key_exists($item, $result)) {
            $result[$item] = mb_strlen($item);
        }
    }
       asort($result);
       return $result;
}

/**
 * Check if current string is palindrome
 * @param string text
 * @return bool
 */
function isPalindrome(string $text):bool
{
    $i=0;
    $length = mb_strlen($text);
    $iterations = (int)($length/2);
    $length--;
    while ($iterations>$i) {
        if ($text[$i] !== $text[$length-$i]) {
            return false;
        }
        $i++;
    }
    return true;
}

?>

<html>
    <head>
        <title>Text Analizer</title>
    </head>
    <body>
        <form method="post" action="">
            <textarea required name="text"></textarea><br>
            <input type="submit" value="SEND"><br>
        </form>
            <?php
            if (isset($_POST['text'])) {
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
