<?php
function isPalindrome($text)
{
    $i=0;
    $length = strlen($text);
    $iterations = (int)($length/2);
    $length--;
    while ($iterations>=$i) {
        if (!($text[$i] === $text[$length-$i])) {
            return false;
        }
    }
    return true;
}
