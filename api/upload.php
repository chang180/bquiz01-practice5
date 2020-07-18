<?php include_once "../base.php";

$table = $_POST['table']??$_GET['table'];
$db = new DB($table);

$data = $db->find($_POST['id']);

if (!empty($_FILES['name']['tmp_name'])) {
    $filename = $_FILES['name']['name'];
    move_uploaded_file($_FILES['name']['tmp_name'], '../img/' . $filename);
    $data['name'] = $filename;
}

$db->save($data);
to("../admin.php?do=$table");