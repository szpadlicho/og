<?php
class Connect
{   
    /**
     * object of the class PDO
     *
     * @var object
     */
    protected $pdo;
    private $host;
    private $user;
    private $pass;
    private $charset;
    private $dbase;
    private $pref;
    /**
     * It sets connect with the database.
     *
     * @return void
     */
    function __construct()
    {
        try {
            require './config/config.php';
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->charset = $charset;
            $this->dbase = $dbase;
            $this->pref = $pref;           
            /**/
            $check = new PDO('mysql:host='.$this->host.';dbname=INFORMATION_SCHEMA; charset='.$this->charset, $this->user, $this->pass);
            $check->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $check->query(
                        "SELECT `SCHEMA_NAME` 
                        FROM `SCHEMATA` 
                        WHERE `SCHEMA_NAME` = '".$this->dbase."'"
                        );

            $res = $res->fetch(PDO::FETCH_ASSOC);
            //echo $res ? 'exist' : 'not exist';
            if ($res) {
                $this->connectDataBase();
            } else {
                $this->createDataBase();
                $this->connectDataBase();
            }
        }
        catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }
    public function  createDataBase()
    {  
        $this->pdo->exec("CREATE DATABASE IF NOT EXISTS ".$this->dbase." charset=".$this->charset);
    }
    public function  connectDataBase()
    {
        $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbase."; charset=".$this->charset, $this->user, $this->pass);
    }
    public function  getDataBase()
    {
        $res = $this->pdo->query(
            "SELECT * 
            FROM `articles`"
            );
        //$wyn = $res->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}