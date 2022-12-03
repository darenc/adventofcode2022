<?php

$backpacks = file('input.txt');

$sumPriorities = 0;

foreach ($backpacks as $backpack) {

    $compartments = str_split($backpack, strlen($backpack)/2);

    $compartments[0] = str_split($compartments[0]);
    $compartments[1] = str_split($compartments[1]);

    foreach ($compartments[0] as $item) {
        if (in_array($item, $compartments[1])) {
            $duplicateItem = $item;
            break;
        }
    }

    $charValue = ord($duplicateItem);
    $priority = $charValue <= 90 ? $charValue - 38 : $charValue - 96;

    $sumPriorities += $priority;
}

echo $sumPriorities;
