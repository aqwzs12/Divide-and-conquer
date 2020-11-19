<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include __DIR__ . '/vendor/autoload.php';

$array_to_sort = explode(',', $argv[1]);;
$result = merge_sort($array_to_sort, 0);


function merge($a, $b)
{
    if (count($a) == 0) {
        return $b;
    }

    if (count($b) == 0) {
        return $a;
    }

    $result = [];
    $i = 0;
    $j = 0;
    while (TRUE) {
        if (!isset($b[$j]) &&  !isset($a[$i])) {
            return $result;
        }

        if (isset($a[$i]) && ($a[$i] < $b[$j] || !isset($b[$j]))) {
            $result[] = $a[$i];
            $i++;
        }

        if (isset($b[$j]) && ($a[$i] > $b[$j] || !isset($a[$i]))) {
            $result[] = $b[$j];
            $j++;
        }
    }

    return $result;
}


/**
 * 
 */
function merge_sort($n, $i)
{

    if (count($n) <= 1) {
        return $n;
    }


    for ($j = 0; $j < count($n); $j++) {
        if ($j < count($n) / 2) {
            $left[] = $n[$j];
        } else {
            $right[] = $n[$j];
        }
    }
    dump("left side level $i");
    dump($left);
    dump("right side level $i");
    dump($right);

    $left = merge_sort($left, $i + 1);
    $right = merge_sort($right, $i + 1);

    dump("left side after merge level $i ");
    dump($left);
    dump("right side after merge level $i ");
    dump($right);

    $merge = merge($left, $right);

    
    dump("merge level $i");
    dump($merge);

    return $merge;
}
