<?php
/**
 * Check if current string is palindrome
 * @param string text
 * @return bool
 */
function isPalindrome(string $text):bool {
    $i=0;
    $length = mb_strlen($text);
    $iterations = (int)($length/2);
    $length--;
    while($iterations>$i) {
        if($text[$i] !== $text[$length-$i]) {
            return false;
        }
        $i++;
    }
    return true;
}
function mb_strrev($str){
    $r = '';
    for ($i = mb_strlen($str); $i >= 0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }

    return $r;
}
?>