<?php
include "../boot.php";

// when a post request is sent the code below sends the data to database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../app/api/fetch.php';
    header('Location: '.asset('index.php')); 
}

// get hotels from API
$hotels = Api::fetchHotels();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Idot - fetch hotels</title>
</head>
<body>
 
<form method="POST" action="" name="fetch">
<?php foreach ($hotels as $hotelKey => $hotel) { ?>

	<!-- setting hotel link array -->
	<?php foreach ($hotel['_links'] as $key => $link) { ?>
		<input name="hotel[<?php print_r($hotelKey) ?>][_links][<?php print_r($key) ?>]" value="<?php print_r($link) ?>" type="hidden">
	<?php } ?>

	<!-- setting hotel id -->
	<input name="hotel[<?php print_r($hotelKey) ?>][id]" value="<?php print_r($hotel['id']) ?>" type="hidden">

	<!-- setting hotel name -->
	<input name="hotel[<?php print_r($hotelKey) ?>][name]" value="<?php print_r($hotel['name']) ?>" type="hidden">

	<!-- setting hotel address -->
	<input name="hotel[<?php print_r($hotelKey) ?>][address]" value="<?php print_r($hotel['address']) ?>" type="hidden">

	<!-- setting hotel zipcode -->
	<input name="hotel[<?php print_r($hotelKey) ?>][zipcode]" value="<?php print_r($hotel['zipcode']) ?>" type="hidden">

	<!-- setting hotel city -->
	<input name="hotel[<?php print_r($hotelKey) ?>][city]" value="<?php print_r($hotel['city']) ?>" type="hidden">

	<!-- setting hotel images -->
	<?php foreach ($hotel['images'] as $imagekey => $images) { ?>
		<?php if ($images['_links']) { ?>
			<?php foreach ($images['_links'] as $linkKey => $imageLink) { ?>
				<input name="hotel[<?php print_r($hotelKey) ?>][images][_links][<?php print_r($linkKey) ?>]" value="<?php print_r($imageLink) ?>" type="hidden">
			<?php } ?>
		<?php } else { ?>
				<input name="hotel[<?php print_r($hotelKey) ?>][images][<?php print_r($imagekey) ?>][_links]" value="" type="hidden">
		<?php } ?>
		<input name="hotel[<?php print_r($hotelKey) ?>][images][<?php print_r($imagekey) ?>][id]" value="<?php print_r($images['id']) ?>" type="hidden">
		<?php foreach ($images['image'] as $image) { ?>
			<input name="hotel[<?php print_r($hotelKey) ?>][images][<?php print_r($imagekey) ?>][image][value]" value="<?php print_r($image) ?>" type="hidden">
			<input name="hotel[<?php print_r($hotelKey) ?>][images][<?php print_r($imagekey) ?>][image][filename]" value="<?php print_r($image) ?>" type="hidden">
			<input name="hotel[<?php print_r($hotelKey) ?>][images][<?php print_r($imagekey) ?>][image][filetype]" value="<?php print_r($image) ?>" type="hidden">
		<?php } ?>

	<?php } ?>

	<!-- setting hotel roomtypes -->
	<?php foreach ($hotel['roomtypes'] as $roomKey => $roomTypes) { ?>
		<?php foreach ($roomTypes['_links'] as $linkKey => $roomLink) { ?>
			<input name="hotel[<?php print_r($hotelKey) ?>][roomtypes][<?php print_r($roomKey) ?>][_links][<?php print_r($linkKey) ?>]" value="<?php print_r($roomLink) ?>" type="hidden">
		<?php } ?>
		<input name="hotel[<?php print_r($hotelKey) ?>][roomtypes][<?php print_r($roomKey) ?>][id]" value="<?php print_r($roomTypes['id']) ?>" type="hidden">
		<input name="hotel[<?php print_r($hotelKey) ?>][roomtypes][<?php print_r($roomKey) ?>][name]" value="<?php print_r($roomTypes['name']) ?>" type="hidden">
	<?php } ?>

<?php } ?>
</form>
<script type="text/javascript">
	// send form when page is loaded
	window.onload = function(){
		document.forms['fetch'].submit();
	}
</script>
</body>
</html>
