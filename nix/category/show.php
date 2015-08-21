<?php
require_once '../config.php';
require_once 'domain.php';

try {
	$conn = new PDO("mysql:host=$db_host;dbname=$db_schema", $db_user, $db_pass);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare("SELECT * FROM sakila.category WHERE category_id = :id");
$stmt->execute(array('id' => $_GET['id']));
$stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
$category = $stmt->fetch();
print '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Category <?php print $category->name; ?></title>
</head>
<body>
	<h1>Category <?php print $category->name; ?></h1>
	<table>
		<tbody>
			<tr>
				<th>ID: </th>
				<td><?php print $category->category_id; ?></td>
			</tr>
			<tr>
				<th>Name: </th>
				<td><?php print $category->name; ?></td>
			</tr>
			<tr>
				<th>Last updated:</th>
				<td><?php print $category->last_update; ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>