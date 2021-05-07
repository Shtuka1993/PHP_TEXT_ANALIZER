<?php
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
