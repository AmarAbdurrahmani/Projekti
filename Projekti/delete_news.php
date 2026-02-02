<?php
include "db.php";
require_once "News1.php";

$newsObj = new News($conn);

$id = $_GET['id'] ?? 0;

if ($id > 0) {
    $newsObj->delete($id);
}

header("Location: read_news.php");
exit;
