<?php 
$con = new Install();
$return = $con->deleteDataBase();
unset($con);
header("Location: index.php?feedback=delete");