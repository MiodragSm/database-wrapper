<!DOCUTYPE html>
<html xmlns="www.w3.org/1999/xhtml lang="en" xml:lang="en">
<head>
<title>Pretraga baze</title>

<!-- This meta viewport tag is required for our page to scale properly inside any screen size, particularly in the mobile viewport. -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	
	<!-- Eksterni CSS fajl koji definise vizuelni izgled sajta -->
		<link href="css/login-style.css" rel='stylesheet' type='text/css' />
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" /> <!--  favicon-16x16.png - The classic favicon, displayed in the tabs. -->
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />	
	<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<!-- Ubacujem JQuery biblioteku zbog moguceg buduceg koristenja -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- Moja JavaScript biblioteka -->
	<script src="./my_javascript.js"></script>
</head>


<body onLoad="document.title ='Pretraga baze - Ucitano v0.5';" >
				 <!-----start-main---->
	<div class="login-form">
					<div class="head">
						<img src="images/logo115x2.PNG" alt=""/>
					</div>
				<form action="pretraga.php" method="post">
					<label> Unesite detalje za pristup bazi.</label>
					<br></br>
					<li>
						<input name="dbName" type="dbName" class="dbName" value="NAZIV BAZE" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NAZIV BAZE';}" ><a href="#" class=" icon user"></a>
					</li>					<li>
						<input name="korisnik" type="text" class="text" value="KORISNIK" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'KORISNIK';}" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input name="sifra" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
					<div class="p-container">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Zapamti me</label>
								<input type="submit" onclick="myFunction()" value="Konektuj se!" >
							<div class="clear"> </div>
					</div>
				</form>
			</div>
			<!--//End-login-form-->
		  <!-----start-copyright---->
   					<div class="copy-right">
						<p>(c) 2015 <a href="http://www.korrvin.iz.rs">Miodrag Smolović</a></a></p> 
	</div>	<!-----//end-copyright---->
</body>
</html>
</!DOCUTYPE>
 