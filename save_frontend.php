<!DOCTYPE html>
<html>
<head>
<title>Convert Div to image</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
</head>
<body>


<?php function save($name, $class, $dob, $phone, $father, $x){ ?>
<!-- Here add image url after ajax response -->
<div id="<?php echo $x?>" style="background: #EFFF96">
	<h6>Name:<?php echo $name ?> </h6>
	<h6>Class:<?php echo $class ?> </h6>
	<h6>DoB:<?php echo $dob ?> </h6>
	<h6>Phone:<?php echo $phone ?> </h6>
	<h6>Father:<?php echo $father ?> </h6>
</div>

<script>
	html2canvas([document.getElementById('<?php echo $x?>')], {
	onrendered: function (canvas) {
			var imagedata = canvas.toDataURL("image/png");
			var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
			//ajax call to save image inside folder
			$.ajax({
				url: 'save_image.php',
				data: {
					imgdata:imgdata,
					save_image: "save_image",
					},
				type: 'post',
				success: function (response) {
					console.log(response);
					$('mainDiv').remove()
				$('#image_id img').attr('src', response);
				}
			});
	}})
</script>

<?php 
}
?>
</body>
</html>