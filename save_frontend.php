<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>

    <title>Document</title>

</head>
<body>


<?php function save($name, $class, $dob, $phone, $father, $x){ ?>
    <div class="container" style="background-color:#F6F8ED;height:58vh;width:40vh" id="<?php echo $x?>">
        <div class="jumbotron jumbotron-fluid  text-white text-center"
            style="background-color:white;width:300px;margin:-10px auto;height:30px;">

            <div class="container">
                <h1 class="display-1" style="font-size:18px;color:black;margin-top:-18px"><strong>ADHYAYAN NSS IIT PATNA <br>अध्ययन</strong>
                </h1>
                <hr style="width:210px;" />
            </div>
        </div>
        <div class="row justify-content-sm-center justify-center">
                <div class="photo"
                    style="width:200px;height:250px;background-color:white;box-shadow: 10px 10px 20px;border:1px solid blue;margin-top:-10px">
                </div>
        </div>
        <br>

        <div class="row justify-content-sm ">

                <div style="margin-left: 30px">
                    <form>
                        <label style="font-size:12px;"><strong>Name: <?php echo $name ?></strong></label><br>
                        <label style="font-size:12px;"><strong>Class: <?php echo $class ?></strong></label><br>
                        <label style="font-size:12px;"><strong>DoB: <?php echo $dob ?></strong></label><br>
                        <label style="font-size:12px;"><strong>Parent: <?php echo $father ?></strong></label><br>
                        <label style="font-size:12px;"><strong>Phone: <?php echo $phone ?> </strong></label>
                    </form>
                </div>
        </div>
    </div>
    <br><br>

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
    <!-- Optional JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>