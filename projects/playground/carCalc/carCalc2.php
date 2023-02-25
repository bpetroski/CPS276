<!DOCTYPE html>
<html>
<head>
	<title>Car Financing Calculator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.car-image {
			display: inline-block;
			vertical-align: top;
			margin-right: 20px;
		}
		.form-group {
			margin-bottom: 20px;
		}
		.form-group label {
			display: block;
			margin-bottom: 5px;
		}
		.form-control {
			display: block;
			width: 100%;
			padding: 10px;
			font-size: 16px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}
		.form-control:focus {
			border-color: #66afe9;
			outline: 0;
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
		}
	</style>
</head>
<body>

<?php
$carPrice = $downPayment = $loanTerm = $interestRate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $carPrice = test_input($_POST["car_price"]);
  $downPayment = test_input($_POST["down_payment"]);
  $loanTerm = test_input($_POST["loan_term"]);
  $interestRate = test_input($_POST["interest_rate"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="container">
	<h2>Car Financing Calculator</h2>
	<img class="car-image" src="car.png" alt="Car Image">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target="_blank">
		<div class="form-group">
			<label for="car_price">Car Price:</label>
			<input type="number" class="form-control" id="car_price" name="car_price" value="<?php echo $carPrice;?>" required>
		</div>
		<div class="form-group">
			<label for="down_payment">Down Payment:</label>
			<input type="number" class="form-control" id="down_payment" name="down_payment" value="<?php echo $downPayment;?>" required>
		</div>
		<div class="form-group">
			<label for="loan_term">Loan Term (in months):</label>
			<input type="number" class="form-control" id="loan_term" name="loan_term" value="<?php echo $loanTerm;?>" required>
		</div>
        <div class="form-group">
			<label for="interest_rate">Interest Rate:</label>
			<input type="number" class="form-control" id="interest_rate" name="interest_rate" step="0.01" value="<?php echo $interestRate;?>" required>
		</div>
		<button type="submit" class="btn btn-primary">Calculate</button>
	</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$monthlyPayment = calculateMonthlyPayment($carPrice, $downPayment, $loanTerm, $interestRate);
	echo "<h3>Monthly Payment: $". number_format($monthlyPayment, 2) ."</h3>";
}

function calculateMonthlyPayment($carPrice, $downPayment, $loanTerm, $interestRate) {
	$loanAmount = $carPrice - $downPayment;
	$monthlyInterestRate = $interestRate / 1200;
	$monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$loanTerm));
	return $monthlyPayment;
}
?>

</div>

</body>
</html>