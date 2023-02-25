<!DOCTYPE html>
<html>
<head>
	<title>Car Financing Calculator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		.car-image {
			position: absolute;
			top: 50%;
			left: 10%;
			transform: translate(-50%, -50%);
			max-width: 40%;
		}
		.custom-file-label {
			overflow: hidden;
		}
	</style>
</head>
<body>

<div class="container">
	<h2>Car Financing Calculator</h2>
	<img src="<?php echo $carImage; ?>" alt="Car Image" class="img-fluid car-image">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
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
		<div class="form-group">
			<label for="car_image">Car Image:</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="car_image" name="car_image" accept="image/*">
				<label class="custom-file-label" for="car_image">Choose file</label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Calculate</button>
	</form>
    <?php
$carPrice = 0;
$downPayment = 0;
$loanTerm = 0;
$interestRate = 0;
$loanAmount = 0;
$carImage = "https://via.placeholder.com/500x300.png?text=No+Image";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$carPrice = test_input($_POST["car_price"]);
	$downPayment = test_input($_POST["down_payment"]);
	$loanTerm = test_input($_POST["loan_term"]);
	$interestRate = test_input($_POST["interest_rate"]);

	$loanAmount = $carPrice - $downPayment;

	if ($loanAmount <= 0) {
		echo "<p>Error: Invalid loan amount.</p>";
	} else {
		$monthlyPayment = calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm);
		echo "<p>Monthly Payment: $" . $monthlyPayment . "</p>";
	}

	$carImage = uploadCarImage();
}

function calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm) {
	// Convert annual interest rate to monthly interest rate
	$monthlyInterestRate = $interestRate / 1200;

	// Calculate the number of monthly payments
	$numPayments = $loanTerm * 12;

	// Calculate the monthly payment using the formula for an amortized loan
	$monthlyPayment = $loanAmount * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$numPayments));

	// Round the monthly payment to two decimal places
	$monthlyPayment = round($monthlyPayment, 2);

	return $monthlyPayment;
}

function uploadCarImage() {
	if (isset($_FILES["car_image"]) && $_FILES["car_image"]["error"] == UPLOAD_ERR_OK) {
		$targetDir = "uploads/";
		$targetFile = $targetDir . basename($_FILES["car_image"]["name"]);
		$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
		$extensions = array("jpg", "jpeg", "png", "gif");

		if (in_array($imageFileType, $extensions)) {
			move_uploaded_file($_FILES["car_image"]["tmp_name"], $targetFile);
			return $targetFile;
		}
	}

	// If no image was uploaded or an invalid file type was used, use a default image.
	return "https://via.placeholder.com/500x300.png?text=No+Image";
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>