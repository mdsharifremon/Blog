<?php

/** 
* @param Database_Class
* 
*/
class Database{
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'cms_blog';

    public $conn = null;


    /**
    * @param Create_Database_Connection
    * @param Check_Database_Is_Set_Or_Null
    * @return this->Conn
    **************************************/
        public function __construct()
        {
            if ($this->conn == null) {
                $this->conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
            }
            if ($this->conn->connect_error) {
                echo "Error : " . $this->conn->connect_error;
            }
        }


    /**  
     * @param Fetch_All_Data_Based_On_Condition
     * @param fetch_All($table = null, $order = null, $sort = null, $condition = null)
     * Return fetch_all(MYSQLI_ASSOC)
     * *****************************************/
        public function fetch_All($table = null, $order = null, $sort = null, $condition = null)
        {
            if ($table != null) {
                $sql = "SELECT * FROM {$table} ";

                if ($condition != null) {
                    $sql .= "WHERE {$condition} ";
                }
                if (null !== $order && null !== $sort) {
                    $sql .= "ORDER BY {$order} {$sort} ";
                }
                $result = $this->conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return false;
                }
                return $row;
            }
        }

    /** 
     * @param Row_count 
     * @param row_count($table = null, $condition = null)
     * Return mysqli_num_rows(result);
     * ****************/  
        public function row_count($table = null, $condition = null)
        {
            if ($condition != null) {
                $result = $this->conn->query("SELECT * FROM {$table} WHERE {$condition}");
            } else {
                $result = $this->conn->query("SELECT * FROM {$table}");
            }
            return mysqli_num_rows($result);
        }

    /** 
     * @param Fetch_By_Sql
     * @param fetch_by_sql($sql = null)
     * Return fetch_all(MYSQLI_ASSOC) 
     * ********************/
        public function fetch_by_sql($sql = null){
            if(null != $sql){
                $result = $this->conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_all(MYSQLI_ASSOC);
                        return $row;
                    } else {
                        return false;
                    }
            }    
        }



    /** 
     * @param Delete_Data_By_Id 
     * @param delete($table = null, $condition = null)
     * Return true;
     * **************************/ 
        public function delete($table = null, $condition = null)
        {
            if ($table != null && $condition != null) {
                $sql = "DELETE FROM {$table} WHERE $condition";
                if ($this->conn->query($sql)) {
                    return true;
                }else{
                    echo mysqli_error($this->conn);
                    return false;
                }
            }
        }



    /** 
     *  @param Insert_Data_Into_Database  
     *  @param insert($table, $param = [])
     *  Return true || mysqli_error();
     * **********************************/

        public function insert($table, $param = [])
        {
            if ($this->table_exist($table)) {
                $string = "INSERT INTO " . $table . " (";
                $string .= implode(",", array_keys($param)) . ') VALUES ("';
                $string .= "" . implode('","', array_values($param)) . '")';
                if (mysqli_query($this->conn, $string)) {
                    return true;
                } else {
                echo mysqli_error($this->conn); 
                }  
            }
        }
    /** 
     *  @param Insert_Data_Into_Database_And_Echo_Inserted 
     *  @param insert_echo($table, $param = []) 
     *  Return Inserted || mysqli_error()
     * ***************************************************/

        public function insert_echo($table, $param = [])
        {
            if ($this->table_exist($table)) {
                $string = "INSERT INTO " . $table . " (";
                $string .= implode(",", array_keys($param)) . ') VALUES ("';
                $string .= "" . implode('","', array_values($param)) . '")';
                if (mysqli_query($this->conn, $string)) {
                    echo "inserted";
                    return true;
                } else {
                    echo mysqli_error($this->conn);
                }
            }
        }


    /** 
     * @param Update_Data_From_Database  
     * @param update($table, $param = array(), $where = null)
     * Return True or mysqli_error();
     ************************************/
        function update($table, $param = array(), $where = null)
        {
            if ($this->table_exist($table)) {

                $arg = array();
                foreach ($param as $key => $val) {
                    $arg[] = "{$key} = '{$val}'";
                }

                $sql = "UPDATE {$table} SET " . implode(", ", $arg);
                if ($where != null) {
                    $sql .= "WHERE {$where}";
                }
                if ($this->mysqli->query($sql)) {
                    return true;
                } else {
                    echo mysqli_error($this->conn);
                    return false;
                }
            }
        }



    /**  
     * @param Check_Table_Exists_In_Database_Or_Not.
     * @param table_exist($table)
     * Return True
     * *********************************************/

        private function table_exist($table)
        {
            $sql = "SHOW TABLES FROM {$this->DB_NAME} LIKE '{$table}'";
            $db_table_name =  $this->conn->query($sql);
            if ($db_table_name) {
                if ($db_table_name->num_rows == 1) {
                    return true;
                }
            }
        }


    
    /** 
     * @param Pagination  
     * *****************/
        function pagination($url, $table, $where = null, $limit = null, $join1 = null, $join2 = null, $join3 = null)
        {
            if ($this->table_exist($table)) {
                if ($limit != null) {
                    $sql = "SELECT COUNT(*) FROM {$table} ";
                    if ($where != null) {
                        $sql .= "WHERE {$where} ";
                    }
                    if ($join1 != null) {
                        $sql .= "JOIN {$join1} ";
                    }

                    if ($join2 != null) {
                        $sql .= "JOIN {$join2} ";
                    }

                    if ($join3 != null) {
                        $sql .= "JOIN {$join3} ";
                    }
                    $query = $this->mysqli->query($sql);
                    $total_records = $query->fetch_array();
                    $total_records = $total_records[0];
                    $total_pages = ceil($total_records / $limit);

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    if ($total_records > $limit) {
                        $output = "<ul class='pagination'>";
                        // Previous Page
                        if ($page > 1) {
                            $output .= "<li><a href='$url?page=" . ($page - 1) . "'>Prev</a></li>";
                        }

                        for ($i = 1; $i < $total_pages; $i++) {
                            $active = ($i == $page) ? "class='active'" : '';
                            $output .= "<li><a {$active} href='{$url}?page={$i}'>{$i}</a></li>";
                        }
                        // Next Page
                        if ($total_pages > $page) {
                            $output .= "<li><a href='$url?page=" . ($page + 1) . "'>Next</a></li>";
                        }
                        $output .= "</ul>";
                        echo $output;
                    }
                } else {
                    return false;
                }
            }
        }



    /** 
    * @param Database_Close 
    * @param Check_Database_Connection_Is_Set_Or_Not
    ************************************************/
        public function __destruct()
        {
            if ($this->conn != null) {
                $this->conn->close();
                $this->conn = null;
            }
        }
        
}



?>