<?php
	require "../boot.php";

	$database = db();
	// get all hotels from database
	$hotels = $database->prepare('SELECT * FROM hotels');
	try {
		$hotels->execute([]);
		$hotels->setFetchMode(PDO::FETCH_ASSOC);
		$hotels = $hotels->fetchALL();
	}
	catch(Exeption $e) {
		http_response_code(500);
		dd($e->getMessage());
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Idot</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-header">
			<b><h4>Idotwebengineers</h4></b>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col">
								Hotels
							</div>
							<div class="col">
								<a href="<?php echo asset('getHotels.php'); ?>" class="btn btn-primary float-right">Get hotels</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php foreach ($hotels as $hotel) { ?>
								<div class="card">
									<div class="card-header">
										<div class="col">
											<?php print_r($hotel['name']) ?>
										</div>
										<div class="col">
											<a class="btn btn-primary float-right" href="<?php echo asset('book.php'); ?>?hotel=<?php print_r($hotel['id']) ?>">Book</a>
										</div>
									</div>
									<div class="card-body">
										<?php print_r($hotel['address'] . '<br>' . $hotel['zipcode'] . '<br>' . $hotel['city']) ?>
									</div>
								</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>