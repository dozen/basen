<?php
require 'basen.php';

$bn = new Basen();

$decimal = 974288381969986;

echo '元の数字: ' . $decimal . PHP_EOL;

$kana = $bn->encode($decimal, 77);

echo 'エンコード後: ' . $kana . PHP_EOL;

echo 'デコード後: ' . $bn->decode($kana, 77) . PHP_EOL;

//第二引数が指定されてない場合、基数は読み込んだファイルの中身に依存

echo 'エンコード後: ' . $bn->encode($decimal) . PHP_EOL;

echo 'デコード後: ' . $bn->decode($kana) . PHP_EOL;

//他のファイルを使いたい場合
$cc = new Basen('chinese');

$chineseCharacter = $cc->encode($decimal);

echo 'エンコード後: ' . $chineseCharacter . PHP_EOL;

echo 'デコード後: ' .  $cc->decode($chineseCharacter) . PHP_EOL;
