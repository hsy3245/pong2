<?php
	$conn = mysqli_connect('localhost','root','qwe123!!##','pongDB');
	$name = mysqli_real_escape_string($conn,$_POST["name"]);
	$sub = mysqli_real_escape_string($conn,$_POST["sub"]);
	$content = mysqli_real_escape_string($conn,$_POST["content"]);
	$passwd = mysqli_real_escape_string($conn,$_POST["passwd"]);
/*	
	if(empty($sub)){
		echo ("<script>
				window.alert('no title');
				history.go(-1);
			</script>");
		exit;
	}
	if(empty($conntent)){
		echo ("<script>
				window.alert('no contents');
				history.go(-1);
			</script>");
		exit;
	}
	if(empty($name)){
		echo ("<script>
				window.alert('no name');
				history.go(-1);
			</script>");
		exit;
	}
	if(empty($passwd)){
		echo ("<script>
				window.alert('no password');
				history.go(-1);
			</script>");
		exit;
	}
*/
	$passwd = md5($passwd);
	$sql = "insert into diary(title, name, date) values('$sub', '$name', now())";
	if(!mysqli_query($conn,$sql)){
		die('Error1 '.mysqli_error($conn));
	}
	$number = mysqli_insert_id($conn);
	$sql = "insert into value values('$number', '$passwd', '$content')";
	if(!mysqli_query($conn,$sql)){
		die('Error2 '.mysqli_error($conn));
	}
	echo("
		<meta http-equiv='refresh' content = '0; url=../index.php'/>
	");
?>
