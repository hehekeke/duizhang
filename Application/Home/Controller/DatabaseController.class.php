<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-13
 * Time: 下午2:46
 */
namespace Home\Controller;
use Think\Controller;
class DatabaseController extends Controller {

    public function backup(){

        echo $this->dataBak('user_db');
        $this->display('backup');

    }
        function dataBak($table){
        $DB = MySql::getInstance();
        $sql = "DROP TABLE IF EXISTS $table;\n";
        $createtable = $DB->query("SHOW CREATE TABLE $table");
        $create = $DB->fetch_row($createtable);
        $sql .= $create[1].";\n\n";

        $rows = $DB->query("SELECT * FROM $table");
        $numfields = $DB->num_fields($rows);
        $numrows = $DB->num_rows($rows);
        while ($row = $DB->fetch_row($rows)){
            $comma = "";
            $sql .= "INSERT INTO $table VALUES(";
            for ($i = 0; $i < $numfields; $i++){
                $sql .= $comma."'".mysql_escape_string($row[$i])."'";
                $comma = ",";
            }
            $sql .= ");\n";
        }
        $sql .= "\n";
        return $sql;
    }
}