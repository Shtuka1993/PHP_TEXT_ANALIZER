<?php
/**
 * Sort array of strings by length of strings
 * Remove all dublicats
 * Works with UTF-8
 * @param array array 
 * @return array 
 */
function sortByLength(array $array):array {
    $result = [];
        foreach($array as $item) {
            if(!key_exists($item, $result)) {
                $result[$item] = mb_strlen($item);
            }
        }
       asort($result);
       return $result;
}
?>