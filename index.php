<?php
	$connection = mysqli_connect("localhost", "root", "", "dtnamic_dropdown");

	$query 		= "SELECT * FROM province";
	$result_set = mysqli_query($connection, $query);

	$province_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$province_list .= "<option value=\"{$result['province_id']}\">{$result['province_name']}</option>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dynamic Drop Down List</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&family=Raleway:wght@500&display=swap" rel="stylesheet">

	<style>
      body {
		font-family: 'Raleway', sans-serif;
		font-size: 28px;
	  }
	  
	  h1 {
		 font-family: 'El Messiri', sans-serif;
		 font-size: 48px;
	  }
    </style>

</head>
<body>
	<h1>Dynamic Drop Down List</h1>

	<form action="">
		
		<div class="form">
			<label for="province">Select Province:</label>
			<select name="province" id="province">
				<?php echo $province_list; ?>
			</select>
		</div>

	</form>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#province").on("change", function(){
				var provinceId = $("#province").val();
				var getURL     = "get-districts.php?province_id=" + provinceId;
				$.get(getURL, function(data, status){
					$("#district").html(data);
				});
			});
		});		
	</script>
</body>
</html>