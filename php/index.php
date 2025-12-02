<?php


require_once 'functions.php';
require 'Database.php';
/* require'router.php'; */

// Connect to the database and  execute a query



$db = new Database();
$statement = $db->query("SELECT * FROM posts");
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
