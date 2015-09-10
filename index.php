<?php 
require_once 'model/autoload.php';

// $len = new Master();
// $len->show();
/*********************/

//$br = $con->getDataBase();
// foreach ($br as $bra) {
    // //var_dump($bra);
    // echo $bra['id'].'<br />';
// }

if (isset($_GET['action'])) {
    if ($_GET['action']=='install'){
        include_once('controller/install.php');
        //echo $return;
    }
    if ($_GET['action']=='delete'){
        include_once('controller/delete.php');
        //var_dump($return);

    }
    if ($_GET['action']=='register'){
        include_once('controller/register.php');
        //echo $return;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title></title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/master.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <!--<form action="" method="POST">
        <input type="submit" name="install" value="install" />
    </form>-->
    <a href="?action=install">install</a><br />
    <a href="?action=delete">delete</a><br />
</body>
</html>