<?php
/**
 * Check if current string is palindrome
 * @param string $text
 * @return bool
 */
function isPalindrome(string $text):bool
{
    $iterator=0;
    $length = mb_strlen($text);
    $iterations = (int)($length/2);
    $length--;
    while ($iterations>$iterator) {
        if ($text[$iterator] !== $text[$length-$iterator]) {
            return false;
        }
        $iterator++;
    }
    return true;
}
