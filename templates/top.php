<?php
require 'vendor/autoload.php';

use classes\Database as Connection;

try {
Connection::get()->connect();
echo 'Connected to the database successfully';
} catch (\PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
?>
<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css"/>
