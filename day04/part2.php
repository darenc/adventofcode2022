<?php
$pairs = file('input.txt');

$overlappingPairs = 0;

function rangeToArray($shorthandRange) {
    $rangeKeys = [];

    $range = array_map(
        function($value) {
            return (int)$value;
        },
        explode('-', $shorthandRange)
    );

    for ($i = $range[0]; $i <= $range[1]; $i++) {
        $rangeKeys["section{$i}"] = true;
    }

    return $rangeKeys;
}

foreach ($pairs as $pair) {
    list($elf1, $elf2) = explode(',', trim($pair));

    $elf1Range = rangeToArray($elf1);
    $elf2Range = rangeToArray($elf2);

    $itemsCovered = count(array_merge($elf1Range, $elf2Range));

    if ($itemsCovered < (count($elf1Range) + count($elf2Range))) {
        $overlappingPairs++;
    }
}

echo $overlappingPairs;