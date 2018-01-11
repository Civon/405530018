<!-- form start -->
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" id="idForm">
<!-- beware XSS的漏洞攻擊 -->	<!-- chrome: blocked => ERR_BLOCKED_BY_XSS_AUDITOR -->
	Height:
	<input type="text" name="height" > m
	<br> 
	Weight:
	<input type="text" name="weight" > kg
	<br> 
	Select a file:
	<input type="file" name="pic" id="pic">
	<br>
	<input type="submit" name="submit" value="upload">
<!-- <button id="submitButtonId" >ajax</button> -->
</form>
<!-- form end -->

<?php
if(isset($_POST['height'])||isset($_POST['weight']))
	if(empty($_POST['height'])||empty($_POST['weight'])){
		echo '<script language="javascript">';
		echo 'alert("please fill in")';
		echo '</script>';
	}else{
		echo "height = ". $_POST['height']. "<br>";
		echo "weight = ". $_POST['weight']. "<br>";
		echo "BMI    = ". $_POST['weight'] / $_POST['height'] / $_POST['height']. "<br>";
	}

if(isset($_FILES['pic']))
	if($_FILES['pic']['error'])
		echo "error: ".$_FILES['pic']['error'];
	else{
		$filename = $_FILES['pic']['name'];
		move_uploaded_file($_FILES['pic']['tmp_name'], "upload/$filename");
		echo '<img src="upload/'.$filename.'" alt="picture">';
	}

?>