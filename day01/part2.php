<?php
$elves = [];
$elf = 0;
$input = file('input.txt');

foreach ($input as $calories) {
    $calories = (int)$calories;
    if (0 === $calories) {
        $elf++;
    }
    $elves[$elf] = isset($elves[$elf]) ? $elves[$elf] + $calories : $calories;
}
arsort($elves);
echo array_sum(array_slice($elves, 0, 3));
