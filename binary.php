<?php

$search = rand(1, 30);
$arr = range(1, 25);
$result = binarySearch($arr, $search);

echo "Search value: $search. ";
echo (is_int($result)) ? "Key of the value: $result." : "Value not found.";

function binarySearch($arr, $search_value) {

    if (!is_array($arr)) {
        return new Exception('Argument 1 must be of the type array, ' . gettype($arr) . ' given');
    }

    if ($search_value > end($arr)) {
        return false;
    }

    if (count($arr) == 1) {
        return (current($arr) == $search_value) ? key($arr) : false;
    }

    $medium = array_slice($arr, floor(count($arr)/2), 1, true);
    $medium_value = current($medium);

    if ($search_value == $medium_value) {
        return key($medium);
    }

    list($left, $right) = array_chunk($arr, ceil(count($arr)/2), true);
    $search_array = ($search_value < $medium_value) ? $left : $right;

    return binarySearch($search_array, $search_value);
}