<?php

require "connection.php";

$id = $_GET["id"];

Database::iud("DELETE FROM `notification` WHERE `id` = '".$id."' ");

echo("done");
?>