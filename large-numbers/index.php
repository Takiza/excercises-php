<?php

if (!empty($_POST)){
	$a = "".$_POST['first'];
	$b = "".$_POST['second'];
	$add = 0;
}

$c = add($a, $b);
var_dump($c);

function add($a, $b){
	if ($a >= $b) return addition($a, $b);
	else return addition($b, $a);
}

function addition($a, $b){
	$a = strrev($a);
	$b = strrev($b);
	$c = "";
	for ($i = 0; $i < strlen($a) || $add == 1; $i++){
		$n = $a[$i] + $b[$i] + $add;

		if ($n < 10){
			$add = 0;
		}

		else{
			$n -= 10;
			$add = 1;
		}
		$c = $n.$c;
	}
	return $c;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<title>Large Numbers</title>
</head>
<body>
	<div class="container my-2">
		<h4>Введите два числа для сложения (не более 308 символов)</h4>
		<form class="card-body" method="POST">
			<div class="row">
		        <div class="col-4 my-2">
		            <input type="number" name="first" id="task-name" class="form-control" placeholder="First Number" value="123456789012345678901234567890">
		        </div>
		        <div class="col-4 my-2">
		            <input type="number" name="second" id="task-text" class="form-control" placeholder="Second Number" value="123456789012345678901234567890">
		       	</div>
		       	<div class="col-4 my-2">
		            <input type="text" name="result" id="task-text" class="form-control" placeholder="Result" readonly value="<?php echo "".$c ?>">
		       	</div>
		    </div>
		    <div class="col-2 my-2">
		        <button type="submit" class="btn btn-success">Add</button>
		    </div>
		</form>
	</div>
</body>
</html>