<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include __DIR__ . '/vendor/autoload.php';

$l = [1, 4, 5, 0, 10, 8, 3, 25, 2];
$counter = 0;
countNumber_of_inversion($l, $counter);
dump($counter);

/**
 * 
 */
function count_inversemid($a, $b, &$count)
{
    $i = $j = 0;
    $result = [];

    while (true) {
        while (true) {
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
                $count += count($a) - $i;
            }
        }

        return $result;
    }
}

/**
 * 
 */
function countNumber_of_inversion($n, &$counter)
{
    if (count($n) <= 1) {
        return $n;
    }

    for ($i = 0; $i < count($n); $i++) {
        if ($i < count($n) / 2) {
            $left[] = $n[$i];
        } else {
            $right[] = $n[$i];
        }
    }

    $left = countNumber_of_inversion($left, $counter);

    $right = countNumber_of_inversion($right, $counter);

    $merg =  count_inversemid($left, $right, $counter);

    return $merg;
}
