<?php
class DB
{
    //資料庫連線設定
    public $dbserver = DB_SERVER;
    public $dbdatabase = DB_DATABASE;
    public $dbusername = DB_ACCOUNT;
    public $dbpassword = DB_PASSWORD;

    protected  $connect;
    protected  $table_name;
    protected  $sql;

    //預先載入連線
    function __construct(){
        $this->db_connection();
    }
    
    //連線資料庫
    function db_connection()
    {
        //新建物件
        $conn = new mysqli();
        //新建連線
        $conn->connect($this->dbserver,$this->dbusername,$this->dbpassword,$this->dbdatabase);
        if($conn == false)
        {
          echo 'database error '.$conn->connect_error;
          exit();
        }
        //設定編碼
        $conn->set_charset("utf8");
        $this->connect = $conn;
    }

    //Table
    public function table($name) 
    {
        $this->table_name = $name; 
        return $this;
    }

    public function select($search_str = false)
    {
        if($search_str == false)
        {
            echo 'no select anything';
            exit();
        }
        $this->sql = ' SELECT '.$search_str.' FROM '.$this->table_name;
        return $this;
    }

    /**
     * type:array
     * **/
    function where($str,$arr = false)
    {
        $where_sql = ' WHERE ';
        $sql_str = explode("?", $str);
        for($i = 0;$i < count($sql_str);$i++)
        {
            if($sql_str[$i] != '')
            {
               $where_sql .= $sql_str[$i].$arr[$i];
            }
        }
        $this->sql .= $where_sql;
        return $this;
    }

    //取得
    public function get()
    {
        $result = $this->connect->query($this->sql);
        //內容轉陣列
        while($row = mysqli_fetch_assoc($result)) 
        {
            //欄位名稱
            $TableName = array_keys($row);
            for($i = 0;$i < count($row);$i++)
            {
              $NowValue[$TableName[$i]] = stripslashes($row[$TableName[$i]]);
            }
            $response[] = $NowValue;
        }
        return $response;
    }

    //新增
    public function insert($arr_input)
    {   
        $column = [];
        $value = [];
        foreach($arr_input as $key => $sql_input)
        {
           $column[] = $key;
           $value[] = "'".$sql_input."'";
        }
        $insert_sql = sprintf(" INSERT INTO %s ",$this->table_name);
        $insert_sql .=  sprintf("( %s ) VALUES ( %s )",implode(",",$column),implode(",",$value));
        
        $result = $this->connect->query($insert_sql);
    }
}
/*
$db = new DB;
*/
?>