<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include __DIR__ . '/vendor/autoload.php';


$house = [
    0 => [1, 3, 4],
    1 => [0, 2, 3, 4],
    2 => [1, 3],
    3 => [0, 1, 2, 4],
    4 => [0, 1, 3]
];

dump(process($house, 0, -1, 0, []));

function process($n, $k, $p, $level, $result)
{
    $l = 0;
    if ($p != -1) {
        $result[] = $p;
        unset($n[$p][$k]);
    }

    if ($level == 9) {
        dump($result);
        return 1;
    }

    foreach ($n[$k] as $i => $v) {

        if ($v != $p && isset($v)) {
            $x = $v;
            unset($n[$k][$i]);
            $l +=  process($n, $x, $k, $level + 1, $result);
        }
    }

    return $l;
}
