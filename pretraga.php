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
$korisnik = "root";
$sifra = "";
$imeBaze = "sakila";
?>

<div id="container">
	<div id="sideBar">
		<span class="wsite-logo">
			<a href="/">
				<span id="wsite-title">Pretraga Baze Podataka</span>
			</a>
		</span>
			<div id="avMeni">
				<ul class="meniDefault">
					<li id="active" class="meni-nav-1">
						<a href="#"> Meni 1</a>
					</li>
					<li id="meni201">
						<a href="#"> Meni 2</a>
							<ul class="drugiNivo">
								<li><a href="#"> Meni 2.1</a></li>
								<li><a href="#"> Meni 2.2</a></li>
								<li><a href="#"> Meni 2.3</a></li>
								<li><a href="#"> Meni 2.4</a></li>
							</ul>
					</li>				
					<li id="meni202">
						<a href="#"> Meni 3</a>
					</li>				
					<li id="meni203">
						<a href="#"> Meni 4</a>
							<ul class="drugiNivo">
								<li><a href="#"> Meni 4.1</a></li>
								<li><a href="#"> Meni 4.2</a></li>
								<li><a href="#"> Meni 4.3</a></li>
								<li><a href="#"> Meni 4.4</a></li>
							</ul>					
					</li>
					<li id="meni204">
						<a href="#"> Meni 5</a>
					</li>
					<li id="meni205">
						<a href="#"> Meni 6</a>
					</li>
					<li id="meni206">
						<a href="#"> Meni 7</a>
					</li>


				</ul>
			
			</div> <!-- avMeni -->
	</div> <!-- sideBar -->
	
	<div id="mainWrap">
		<div id="header">
		<h3>Header</h3>
			<div style="clear:both"></div>
		</div><!-- header -->
		<div id="banner">

		</div><!-- banner -->
		<div id="main">
		<div id="content">
			
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" "name="forma1" id="forma1">
	<br/>
		<label>Unesi komandu:</label>
		<input type="text" name="unos1" id="unos1"></input>
		<br/><br/>
		<input type="submit" name="izvsi" id="izvrsi" value="Izvrsi komandu"/>
	</form>
	<br/>
	Unesena komada je: 
	<?php 
	if (!empty($_POST["unos1"]))
	{
		$prom=proveri($_POST["unos1"]);
		
		echo $prom;


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
			
			
		</div> <!-- content -->
		<div id="footer">
		<div class="siteFooter"></div>
				<script type="text/javascript">
					//&lt;!--

				if (document.cookie.match(/(^|;)\s*is_mobile=1/)) {
					var windowHref = window.location.href || '';
					if (windowHref.indexOf('?') &gt; -1) {
						windowHref += '&amp;';
					} else {
						windowHref += '?';
					}
					document.write(
						"&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;" +
						"&lt;a class='wsite-view-link-mobile' href='" + windowHref + "view=mobile'&gt;Mobile Site&lt;/a&gt;"
					);
				}

					//--&gt;
				</script>
		</div> <!-- footer -->
		</div><!-- main -->
	
	
	</div> <!-- mainWrap -->
</div> <!-- container -->
</body>
</html>
</!DOCUTYPE>
 