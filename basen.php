<?php

class Basen {

  function __construct($file = 'char') {
    $this->char = rtrim(file_get_contents($file));
    $charset = mb_detect_encoding($this->char);
    $this->base = mb_strlen($this->char, $charset);
    mb_internal_encoding($charset);
  }

  function encode($value, $base = 0) {
    if ($base == 0) {
      $base = $this->base;
    }
    $result = null;
    $place = floor(log($value, $base)); //桁数を求める(実際の桁数-1)
    while ($place >= 0) {
      $pow = pow($base, $place);
      $currentplace = floor($value / $pow); //現在の桁の数
      $result .= mb_substr($this->char, $currentplace, 1); //文字に変換
      $value -= $currentplace * $pow; //現在の桁の分だけ引き算
      $place--;
    }
    return $result;
  }

  function decode($value, $base = 0) {
    if ($base == 0) {
      $base = $this->base;
    }
    $result = 0;
    $currentplace = 0;
    $place = mb_strlen($value) - 1; //桁数を求める
    while ($place >= $currentplace) {
      $pow = pow($base, $place - $currentplace);
      $currentplacechar = mb_substr($value, $currentplace, 1); //現在の桁の文字を抽出
      $result += mb_strpos($this->char, $currentplacechar) * $pow;
      $currentplace++;
    }
    return $result;
  }

}
