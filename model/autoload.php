<?php
function master_autoloader($nazwaKlasy) {
    include $nazwaKlasy . '.php';
}
 
spl_autoload_register('master_autoloader');
 
// tutaj kod programu
 
// i używamy naszej klasy
//$co = new CiezkieOperacje();
//$co->wykonajObliczenia();

// require_once 'model/autoload.php';

// 'model/Master.php';

// class Master
// {
    // public function show()
    // {
        // echo 'jestem na leniwca :)';
    // }
// }

// 'index.php';

// $len = new Master();
// $len->show();