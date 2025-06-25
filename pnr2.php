<?php include('server.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Print Ticket</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>

	<!-- Bootstrap & jQuery scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Navbar -->
	<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
			<span class="navbar-toggler-icon"></span>
		</button>

		<?php if (isset($_SESSION['username'])): ?>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Book Tickets<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="train_stas.php">Train Status</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pnr.php">PNR Enquiry</a>
					</li>
				</ul>
				<span class="navbar-text nav-item">
					Welcome <strong>
						<?php echo $_SESSION['username']; ?>
					</strong>
				</span>
				<span class="navbar-text nav-item ml-3">
					<a class="nav-link" href="index.php?logout='1'"
						style="color: white; background: linear-gradient(to right, #007bff, #00a5ff); padding: 10px; border-radius: 10px;">Logout</a>
					</span> </div> </nav> <br> <?php
					$conn = mysqli_connect('localhost', 'root', '', 'registration');

					if (isset($_POST["payment"])) {
						$id = $_GET['id'];

						// Update booking status
						$update = "UPDATE pass_details SET Success='CONFIRMED' WHERE B_id=$id";
						mysqli_query($conn, $update);

						// Fetch journey details
						$query = "SELECT * FROM pass_details WHERE B_id=$id";
						$result = mysqli_query($conn, $query);

						echo '<br><br><h1 style="color:black;"><b>JOURNEY DETAILS</b></h1>';
						echo '<table class="table table-bordered table-striped">';
						echo '<thead class="thead-dark">
			<tr>
				<th>PNR Number</th>
				<th>Train Number</th>
				<th>Amount Paid Per Person</th>
				<th>Date of Journey</th>
			</tr>
		  </thead><tbody>';

						while ($row = mysqli_fetch_assoc($result)) {
							$class = $row['Class'];
							$status = $row['Success'];
							echo "<tr>
			<td>{$row['B_id']}</td>
			<td>{$row['Train_No']}</td>
			<td>{$row['Fare']}</td>
			<td>{$row['Journey_date']}</td>
		</tr>";
						}

						echo '</tbody></table>';

						echo '<h1 style="margin-top: 40px; color:black;"><b>PASSENGER DETAILS</b></h1>';
						echo '<table class="table table-bordered table-striped">';
						echo '<thead class="thead-dark">
			<tr>
				<th>Passenger Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Class</th>
				<th>Status of Booking</th>
			</tr>
		  </thead><tbody>';

						// Static single passenger details
						echo "<tr>
			<td>pass1</td>
			<td>Male</td>
			<td>19</td>
			<td>$class</td>
			<td>$status</td>
		  </tr>";

						echo '</tbody></table>';
					}
					?>

					<?php else: ?>
						<?php header('Location: login.php'); ?>
					<?php endif ?>

					<?php include('footer.php'); ?>
</body>

</html>