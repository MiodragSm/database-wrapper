<?php
require_once '../config.php'; // Database configuration details
require_once 'domain.php'; // Definition of domain classes

// Using PDO (PHP Data Objects) connect style.
try {
	$conn = new PDO("mysql:host=$db_host; dbname=$db_schema", $db_user, $db_pass);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn-> prepare("SELECT * FROM sakila.category");
$result = $conn->query("SELECT * FROM sakila.category"); // $stmt->query();

//PDO::FETCH_CLASS: returns a new instance of the requested class, mapping the columns of the result set to named properties in the class. If fetch_style includes PDO::FETCH_CLASSTYPE (e.g. PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE) then the name of the class is determined from a value of the first column. 

$result->setFetchMode(PDO::FETCH_CLASS, 'Category');

while ($category = $result->fetch()) {
?>
<tr>
	<td><?php print $category->category_id; ?></td>
	<td><a href="show.php?id=<? $category->category_id ?>"><?php print $category->name; ?></a></td>
	<td><?php print $category->last_update; ?></td>
		<td>		
			<form action="categoryEdit.php" method="GET" name="editForma">
				<input type="text" value=<?php echo $category->category_id; ?> name="category_id" hidden></input>
				<input type="submit" value="Edit">
			</form>
		</td>
		
</tr>
<?php
}
?>