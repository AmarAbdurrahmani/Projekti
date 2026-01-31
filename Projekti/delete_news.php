<?php
include "db.php";
require_once "News1.php";

$newsObj = new News($conn);

// Merr ID nga URL
$id = $_GET['id'] ?? 0;

// Kontroll i thjeshtë
if ($id > 0) {
    $newsObj->delete($id);
}

// Redirect pas fshirjes
header("Location: read_news.php");
exit;
