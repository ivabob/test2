<!DOCTYPE html>
<html>
<head>
	<title> Регистрация </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" action="page1.php">
<div class="row">
	<div class="col-xs-2 col-offset-1"> </div>
  	<div class="col-xs-6"> <h1 style="color:blue"> CodeWeek <img src="mouse.jpg" width="180" height="150" alt="picture" class="img-circle"> </h1> </div>
</div>
<div class="row">
	<div class="col-xs-2 col-offset-1"> </div> 
	<div class="col-xs-6"> <h3 style="color:blue; text-align:center;"> Форма за регистрация за участие в безплатен курс в рамките на Code Week 2015 година </h3> </div>
</div>
<div class="row">
    <div class="col-xs-2 col-offset-1"> </div>
    <div class="col-xs-6"><form class="form-horizontal" action="page1.php" method="post">
  		<br/>
  		<b>Име*</b><input type="text" name="first_name" value="Име" style="width: 82%" /><br/>
		<br/>
		<b>Фамилия*</b><input type="text" name="last_name" value="Фамииля" style="width: 76%" /><br/>
		<br/>
		<b>e-mail*</b><input type="email" name="mail" value="e-mail" style="width: 80%" /> <br/>
		<br/>
		<b>Телефон за контакт*</b><input type="text" name="phone" value="телефон" style="width: 65%" /> <br/>
		<br/>
		<b>Тема на курса*</b><select name="course_name" style="width: 71%">
  			<option value="php">PHP/MYSQL</option>
 			<option value="java">Java</option>
  			<option value="android">Android</option>
  			<option value="wordpress">Wordpress/HTML</option>
		</select> <br/> <br/>
		<h4>Какъв опит имате по темата на курса?  <br/></h4>
		<label class="radio-inline">
  	<input type="radio" name="level" id="level1" value="without experience">нямам опит
	</label>
	<label class="radio-inline">
  	<input type="radio" name="level" id="level2" value="begginer"> начинаещ
	</label>
	<label class="radio-inline">
  	<input type="radio" name="level" id="level3" value="advanced"> напреднал
	</label>
	<br/> <br/>
		<h4> С какво се занимавате в момента? <br/><h4>
	<label class="radio-inline">
	<input type="radio" name="occupation" id="occupation1" value="schoolboy"> ученик
	</label>
	<label class="radio-inline">
  	<input type="radio" name="occupation" id="occupation2" value="student"> студент
	</label>
	<label class="radio-inline">
  	<input type="radio" name="occupation" id="occupation3" value="unempoyed"> безработен
	</label>
	<label class="radio-inline">
	<input type="radio" name="occupation" id="occupation4" value="employed"> зает
	</label>
	<label class="radio-inline">
  	<input type="radio" name="occupation" id="occupation5" value="other"> друго
	</label>
	<br/> <br/>
	<h4>Възраст: <br/></h4>
		<label class="radio-inline">
		<input type="radio" name="age" id="age1" value="13"> под 13 години
		</label>
		<label class="radio-inline">
  		<input type="radio" name="age" id="age2" value="13-19"> 13 - 19 години
		</label>
		<label class="radio-inline">
  		<input type="radio" name="age" id="age3" value="20-29"> 20 - 29 години
		</label>
		<label class="radio-inline">
		<input type="radio" name="age" id="age4" value="30-40"> 30 - 40 години
		</label>
		<label class="radio-inline">
  		<input type="radio" name="age" id="age5" value="up 40"> над 40 години
		</label>
		<br/> <br/>
	<h4>Ще използвате ли наученото на събитието в последствие и как? <br/></h4>
	<input type="text" name="implementation" class="form-control" placeholder="Text input">  <br/>
	<h4>Как то би допринесло за бъдещото ви развитие?</h4>
	<input type="text" name="contribution" class="form-control" placeholder="Text input"> <br/>
	<input type="submit" name="submit" value="Регистрация">
	</div>
</div>
</form>
<?php
	//session_start();
	//create connection
	$conn = mysqli_connect('localhost', 'root', '', 'vratsad_code-week1');
	if (!$conn) {
	die ("Connection failed: mysqli_connect_error()");
} else {
	//echo "Connected succsessfuly";
}
	if (isset($_POST['submit'])) {
	$a = trim($_POST['first_name']);
	$b = trim($_POST['last_name']);
	$x = $_POST['age'];
	$y = $_POST['occupation'];
	$e = $_POST["level"];
	//$c = $_POST["mail"];
	$d = $_POST["course_name"];
	$phone = $_POST['phone'];
	$impl = $_POST["implementation"];
	$contribut = $_POST["contribution"];
	//validation e-mail
	if (empty($_POST["mail"])) {
    $emailErr = "Моля въведете валиден e-mail!";
  } else {
    $c = $_POST["mail"];
    // check if e-mail address is well-formed
    if (!filter_var($c, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Невалиден формат на e-mail!"; 
    }
  }
    
	$newstudent="INSERT INTO `vratsad_code-week1`.`students` (`first_name`, `last_name`, `age`, `occupation`, `previous_experience`, `mail`, `course`, `phone`, `implementation`, `contribution`) 
	VALUES ('$a', '$b', '$x', '$y', '$e', '$c', '$d', 'phone', '$impl', '$contribut')";
	$res = mysqli_query($conn, $newstudent);
	if ($res > 0) {
		 	echo "<p>Благодарим, че се регистрирахте за CodeWeek-Враца 2015г. Ще получите email за потвърждение сега и седмица преди събитието email с подробности за вашия модул - $d </p>";
	}
}
?>
</body>
</html>