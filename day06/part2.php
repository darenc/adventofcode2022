<?php
define('CHUNK_SIZE', 14);

$input = file_get_contents('input.txt');

$input = str_split(trim($input));

for ($i = 0; $i < count($input); $i++) {
    $chunk = array_slice($input, $i, CHUNK_SIZE);
    if (CHUNK_SIZE === count(array_unique($chunk))) {
        break;
    }

}
echo $i+CHUNK_SIZE;
