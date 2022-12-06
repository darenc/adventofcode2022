<?php
$input = file_get_contents('input.txt');

$input = str_split(trim($input));

for ($i = 0; $i < count($input); $i++) {
    $chunk = array_slice($input, $i, 4);
    if (4 === count(array_unique($chunk))) {
        break;
    }

}
echo $i+4;
