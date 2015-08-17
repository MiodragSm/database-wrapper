<!DOCUTYPE html>
<html xmlns="www.w3.org/1999/xhtml lang="en" xml:lang="en">
<head>
<title>Pretraga baze</title>

<!-- This meta viewport tag is required for our page to scale properly inside any screen size, particularly in the mobile viewport. -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	
	<!-- Eksterni CSS fajl koji definise vizuelni izgled sajta -->
	<link href="./css/stilovi.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" /> <!--  favicon-16x16.png - The classic favicon, displayed in the tabs. -->
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />	
	<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
	
	<!-- Ubacujem JQuery biblioteku zbog moguceg buduceg koristenja -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- Moja JavaScript biblioteka -->
	<script src="./my_javascript.js"></script>
</head>


<body onLoad="document.title ='Pretraga baze - Ucitano';" >

<?php 
$server = "localhost";

	if (!empty($_POST["dbName"]) && ($_POST["dbName"] != "NAZIV BAZE")) 
	{
		$imeBaze=proveri($_POST["dbName"]);
		} else {$imeBaze = "sakila";}
	
	if (!empty($_POST["korisnik"]) && ($_POST["korisnik"] != "KORISNIK")) 
	{
		$korisnik=proveri($_POST["korisnik"]);
		} else {$korisnik = "root";}

if (!empty($_POST["sifra"]) && ($_POST["sifra"] != "Password")) 
	{
		$sifra=proveri($_POST["sifra"]);
		} else {$sifra = "";}



?>

<div id="container">
	<div id="sideBar">
		<span class="wsite-logo">
			<a href="index.php">
				<span id="wsite-title">Pretraga Baze Podataka</span>
			</a>
		</span>
<?php
	include("meni.html");
?>
	</div> <!-- sideBar -->
	
	<div id="mainWrap">
		<div id="header">
		<h3 class="centriraj"><?php echo "Server: " . $server . "&nbsp;&nbsp;&nbsp&nbsp;&nbsp;  Ime Baze: " . $imeBaze . "&nbsp;&nbsp;&nbsp; &nbsp;&nbsp Korisnik: " . $korisnik?></h3>
			<div style="clear:both"></div>
		</div><!-- header -->
		<div id="banner">

		</div><!-- banner -->
		
		
		<div id="content">
		<br/>
		<article class="pomoc">
		<a href="http://www.techonthenet.com/mysql/delete.php">Pomoć u vezi sintakse SQL "DELETE" komande.</a> <br><br>
		</article>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="forma1" id="forma1">
			
			DELETE &nbsp;
			<select name="optional" class="opIzbor">
				<option value="" selected></option>
				<option value="LOW_PRIORITY">LOW_PRIORITY</option>
				<option value="QUICK">QUICK</option>
				<option value="IGNORE">IGNORE</option>
			</select> &nbsp;
			FROM &nbsp;
			<input list="tabele" name="unos1" class="unos" placeholder="Ime tabele" required /> 
				<datalist id="tabele">
					<option value="actor">
					<option value="address">
					<option value="category">
					<option value="city">
					<option value="country">
					<option value="customer">
					<option value="film">
					<option value="film_actor">
					<option value="film_category">
					<option value="film_text">
					<option value="inventory">
					<option value="language">
					<option value="payment">
					<option value="rental">
					<option value="staff">
					<option value="store">
				</datalist><br><br>
			WHERE &nbsp;
			<input type="text" name="unos2" class="unos" placeholder="Uslov" required></input>
			<br>
			<br>

			<input type="submit" name="izvrsi" id="izvrsi" value="Izvrši komandu"/>
			</form>
		<br/>

		<?php 
				if (!empty($_POST["unos1"]))
				{
	$prom="UPDATE ". $_POST["optional"] . " INTO ". proveri($_POST["unos1"]) . " SET " . proveri($_POST["unos2"]);
	?>				
	Unesena komada je: &nbsp; 
	<?php
					echo $prom;
		?>
				<br/><br/>
				Rezultat upita:
				<br/><br/>
				<div id="divQuery">
		<?php


			// Kreiranje konekcije
			$konekcija = new mysqli($server, $korisnik, $sifra, $imeBaze);

			// Proveri povezivanje
			if ($konekcija->connect_error) {
				die("Connection failed: " . $konekcija->connect_error);
			}

			//$sql = "SELECT actor_id, first_name, last_name FROM actor";

			$sql = $prom;

			$result = $konekcija->query($sql);

			if ($result->num_rows > 0) 
				{
					// output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "actor_id: " . $row["actor_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
						}
				} 
				else 
					{
						echo "0 results";
					}
			$konekcija->close();		
					
				}
				else
					echo " ";
				
				//Funkcija koja proverava da li je unos regularan
				function proveri($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
				return $data;
			}
		?>
	</div> <!-- divQuery -->
			
			
		</div> <!-- content -->
		
		
		<div id="footer">
		<div class="siteFooter"></div>

		</div> <!-- footer -->
	
	
	</div> <!-- mainWrap -->
</div> <!-- container -->
</body>
</html>
 