<?php
$pairs = file('input.txt');

$overlappingPairs = 0;

function rangeToArray($shorthandRange) {
    $intRange = [];

    $range = array_map(
        function($value) {
            return (int)$value;
        },
        explode('-', $shorthandRange)
    );

    for ($i = $range[0]; $i <= $range[1]; $i++) {
        $intRange[] = $i;
    }

    return $intRange;
}

foreach ($pairs as $pair) {
    list($elf1, $elf2) = explode(',', trim($pair));

    $elf1Range = rangeToArray($elf1);
    $elf2Range = rangeToArray($elf2);

    $rangeIntersection = array_intersect($elf1Range, $elf2Range);

    if (count($rangeIntersection) === count($elf1Range)
     || count($rangeIntersection) === count($elf2Range)) {
        $overlappingPairs++;
    }
}

echo $overlappingPairs;