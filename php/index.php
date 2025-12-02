<?php


require_once 'functions.php';
require 'Database.php';

/* require'router.php'; */

// Connect to the database and  execute a query

$config = require 'config.php';

$db = new Database($config['databse']);
$statement = $db->query("SELECT * FROM posts");
$posts = $statement->fetchAll();


dd($posts);
