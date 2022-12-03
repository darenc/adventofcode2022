<?php

$backpacks = file('input.txt');

$sumPriorities = 0;

foreach ($backpacks as $k => $backpack) {
    $backpacks[$k] = str_split(trim($backpack));
}

for ($elf = 0; $elf < count($backpacks); $elf += 3) {

    $elfCommonItems = array_intersect(
        $backpacks[$elf],
        $backpacks[$elf+1],
        $backpacks[$elf+2]
    );

    $commonItem = array_shift($elfCommonItems);

    $charValue = ord($commonItem);
    $priority = $charValue <= 90 ? $charValue - 38 : $charValue - 96;

    $sumPriorities += $priority;
}

echo $sumPriorities;
