<?php
$input = file('input.txt');
$stacks = [];

foreach ($input as $line) {

    $line = rtrim($line);

    if (false !== strpos($line, '[')) {

        $line = str_replace('    ', '[-] ', $line);
        $line = str_replace([' ', '[', ']'], '', $line);

        $crates = str_split($line);

        foreach ($crates as $index => $crate) {
            $index++;
            if ($crate != '-') {
                if (isset($stacks[$index])) {
                    array_unshift($stacks[$index], $crate);
                } else {
                    $stacks[$index] = [$crate];
                }
            }
        }

    } else if (preg_match('/move (\d*) from (\d*) to (\d*)/', $line, $matches)) {

        list($_, $howMany, $from, $to) = $matches;

        for ($i = 0; $i < $howMany; $i++) {
            $stacks[$to][] = array_pop($stacks[$from]);
        }

    }
}

ksort($stacks);

foreach ($stacks as $stack) {
    echo array_pop($stack);
}
