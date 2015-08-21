<?php
require_once '../config.php';
require_once 'domain.php';

try {
	$conn = new PDO("mysql:host=$db_host; dbname=$db_schema", $db_user, $db_pass);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn-> prepare("SELECT * FROM sakila.category");
$result = $conn->query("SELECT * FROM sakila.category"); // $stmt->query();
$result->setFetchMode(PDO::FETCH_CLASS, 'Category');

while ($category = $result->fetch()) {
?>
<tr>
	<td><?php print $category->category_id; ?></td>
	<td><a href="show.php?id=<?= $category->category_id ?>"><?php print $category->name; ?></a></td>
	<td><?php print $category->last_update; ?></td>
</tr>
<?php
}
?>