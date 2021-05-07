<?php
function sortByLength($array)
{
    $result = [];
    foreach ($array as $item) {
        if (!key_exists($item, $result)) {
            $result[$item] = strlen($item);
        }
    }
       asort($result);
       return $result;
}
