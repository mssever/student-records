<?php
function gcd($a, $b) {
  while ($b != 0) {
    $m = $a % $b;
    $a = $b;
    $b = $m;
  }
  return $a;
}

function lcm($a, $b) {
  if ($a > $b) {
    $num1 = $a;
    $num2 = $b;
  }
  else {
    $num1 = $b;
    $num2 = $a;
  }
  for ($i = 1; $i <= $num2; $i++) {
    if (($num1 * $i) % $num2 == 0) {
      return $i * $num1;
    }
  }
  return $num2;
}
