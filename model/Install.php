<?php
class Install
{
    protected $pdo;
    private $host;
    private $user;
    private $pass;
    private $charset;
    private $dbase;
    private $pref;
    
    private $table;
    
    function __construct()
    {
        require './config/config.php';
        
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
        $this->dbase = $dbase;
        $this->pref = $pref;           

        $check = new PDO(
            'mysql:host='.$this->host.';
            dbname=INFORMATION_SCHEMA; 
            charset='.$this->charset, 
            $this->user, 
            $this->pass
            );
        $check->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $res = $check->query(
            "SELECT `SCHEMA_NAME` 
            FROM `SCHEMATA` 
            WHERE `SCHEMA_NAME` = '".$this->dbase."'"
            );
        $this->pdo = new PDO(
            'mysql:host='.$this->host.';
            charset='.$this->charset, 
            $this->user, 
            $this->pass
            );
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if ($res) {
            $this->connectDataBase();
        } else {
            $this->createDataBase();
            $this->connectDataBase();
        }
    }
    public function __setTable($table)
    {
		$this->table = $this->pref.$table;
		//echo $this->table."<br />";
	}
    public function checkAction($result)
    {
        return $result ? true : false;
    }
    private function createDataBase()
    {  
        $result = $this->pdo->exec(
            "CREATE DATABASE IF NOT EXISTS ".$this->dbase." 
            charset=".$this->charset
            ); // create Data Base if not exist yet
        $this->checkAction($result);
    }
    public function deleteDataBase()
    {
		$result = $this->pdo->exec(
            "DROP DATABASE `".$this->dbname."`"
            ); //usowanie
		$this->checkAction($result);
	}
    public function connectDataBase()
    {
        $this->pdo = new PDO(
            'mysql:host='.$this->host.';
            dbname='.$this->dbase."; 
            charset=".$this->charset, 
            $this->user, 
            $this->pass
            );
    }
    public function createTableAndRows($arr_row, $arr_val)
    {
        // Tworze tabele tylko raz co pozwala klikać install bez konsekwencji
        
        $columns='';
        foreach ($arr_row as $name => $type) {
            $columns .= '`'.$name.'` '.$type.',';
        }
        //$sec = $this->pdo;
        $this->pdo->query(
            'CREATE TABLE IF NOT EXISTS `'.$this->table.'` (
            '.$columns.'
            primary key(id)
            )ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1'
            );
        if ($arr_val != null) {
            
            $field='';
            $value='';
            foreach ($arr_val as $name => $val) {
                $field .= '`'.$name.'`,';
                $value .= "'".$val."',";
            }
            // Remove last coma from string
            $field = rtrim($field, ",");
            $value = rtrim($value, ",");
            // echo $field;
            // echo '<br />';
            // echo $value;
            // echo $wyn;
            $this->pdo->query(
                "INSERT INTO `".$this->table."`(
                ".$field."
                ) VALUES (
                ".$value."
                )"
                );
        }
    }
    public function deleteTable()
    {
        $result = $this->pdo->query(
            'DROP TABLE `'.$this->table.'`'
            );
        $this->checkAction($result);
    }
}