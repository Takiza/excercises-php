<?php

$a = 'b';
$b = 'zzz';

echo $c = add($a, $b);

function transformFromChar($n) {

	$n = ord($n);

	if ($n >= 48 && $n < 58) {
		$n -= 48;
		return $n;
	}

	elseif ($n >= 97 && $n < 123) {
		$n -= 87;
		return $n;
	}

	else return 0;
}

function transformToChar($n) {

	if ($n >=0 && $n < 10) {
		$n += 48;
		return chr($n);
	}

	elseif ($n >= 10 && $n <= 36) {
		$n += 87;
		return chr($n);
	}

	else return 0;
}

function add($a, $b) {

	if (iconv_strlen($a,'UTF-8') >= iconv_strlen($b,'UTF-8')) return addition($a, $b);
	else return addition($b, $a);
}

function addition($a, $b) {

	$c = "";
	$add = 0;
	for ($i = 0; $i < iconv_strlen($a, 'UTF-8') || $add == 1; $i++){

		$n = transformFromChar($a[$i]) + transformFromChar($b[$i]) + $add;

		if ($n < 36){
			$add = 0;
		}

		else{
			$n -= 36;
			$add = 1;
		}
		$c = transformToChar($n).$c;
	}
	return $c;
}