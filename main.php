<?php


session_start();


if(empty($_SESSION["zalogowany"]))$_SESSION["zalogowany"]=0;

mysql_connect("localhost", "root", "")or die("Nie można nawiązać połączenia z bazą");
mysql_select_db("USRW")or die("Wystąpił błąd podczas wybierania bazy danych");

function ShowLogin($komunikat=""){
	echo "$komunikat<br>";
	echo "<form action='main.php' method=post>";
    echo "<div class='jumbotron' >";
		echo "<p class='text-center'>USRW - Ujednolicony System Rezerwacji Wizyt</p></hr>";
	echo "<label class='badge badge-primary' for='login'>Login </label>
  <input type='text' class='form-control'  placeholder='Login' required name='login'><br>";
	echo "<label for='password' class='badge badge-primary'>Hasło:</label>
   <input type=password class='form-control' placeholder='Hasło...' required name='password'><br>";
	echo "<button type='submit'  id='submitLogin' class='btn btn-block btn-sm btn-outline-success'>Zaloguj!</button>";
  echo "</div>";
	echo "<div> ";


  echo "</form></br>";
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<style>
	div.card-body {
		margin : 5px;
	}

div.card-body:hover{
transition-duration: 1s;
	background-color : lightgreen;

	cursor : pointer;
}

	</style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>USRW - Ujednolicony System Rezerwacji Wizyt</title>
  <meta charset="utf-8"/>
  <script src="scripts/js/main.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?
	include('scripts/db/connect.php');

	?>
<?php
if($_GET["wyloguj"]=="tak"){$_SESSION["zalogowany"]=0;echo "Zostałeś wylogowany z serwisu";}
if($_SESSION["zalogowany"]!=1){
	if(!empty($_POST["login"]) && !empty($_POST["password"])){
		if(mysql_num_rows(mysql_query("SELECT * FROM users where login = '".htmlspecialchars($_POST["login"])."' AND password = '".htmlspecialchars($_POST["password"])."'"))){
			echo "Zalogowano poprawnie. <a href='main.php'>Przejdź na stronę główną</a>";
			$_SESSION["zalogowany"]=1;
			}
		else echo ShowLogin("Podano złe dane!!!");
		}
	else ShowLogin();
}
else{
?>
<a href='main.php?wyloguj=tak' class="btn btn-outline-danger" role="alert">Wyloguj się</a>

<hr>

<div class="jumbotron">

	<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">

        <p class="card-text" onclick="openOM()">OPIEKA MEDYCZNA</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <p class="card-text" onclick="openMP()">MEDYCYNA PRACY</p>
      </div>
    </div>
  </div>
</div>
</div>
<?php
}
?>
<footer>
<?php echo date('Y')." &copy; by Jan Zalesiński";?>
</footer>
</body>
</html>
