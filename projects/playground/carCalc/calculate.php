<!DOCTYPE html>
<html>
<head>
	<title>Car Financing Calculator - Results</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Car Financing Calculator - Results</h2>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$car_price = $_POST['car_price'];
		$down_payment = $_POST['down_payment'];
		$loan_term = $_POST['loan_term'];
		$interest_rate = $_POST['interest_rate'];

		$loan_amount = $car_price - $down_payment;
		$monthly_interest_rate = $interest_rate / 1200;
		$monthly_payment = ($loan_amount * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$loan_term));

		echo "<h3>Monthly Payment: $".number_format($monthly_payment, 2)."</h3>";
	}
	?>
</div>

</body>
</html>