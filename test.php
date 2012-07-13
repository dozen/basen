<?php
require 'basen.php';

$bn = new Basen();

$decimal = 609447096902166;

echo $decimal . PHP_EOL;

$kana = $bn->encode($decimal, 72);

echo $kana . PHP_EOL;

echo $bn->decode($kana, 72) . PHP_EOL;
