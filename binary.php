<?php
$search = 17;
$arr = range(1, 20);
shuffle($arr);

$result = binarySearch($arr, $search);
echo $result;

function binarySearch($arr, $search) {

    if (!is_array($arr)) {
        return new Exception('Argument 1 must be of the type array, ' . gettype($arr) . ' given');
    }

    $arr = array_chunk($arr, ceil(count($arr)/2));

    foreach ($arr as $part) {

        if (count($part) == 1) {
            $isset = current($part) == $search;
        } else {
            $isset = binarySearch($part, $search);
        }

        if ($isset) {
            return true;
        }
    }

    return false;
}