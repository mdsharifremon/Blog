<?php

/** 
* Database Class
* 
*/
class Database{
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'cms_blog';

    public $conn = null;


    /**
     * Create Database Connection
     * Check database is set or null
     */
    public function __construct()
    {
        if ($this->conn == null) {
            $this->conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
        }
        if ($this->conn->connect_error) {
            echo "Error : " . $this->conn->connect_error;
        }
    }


    /**  Fetch All Data Based On Condition */
    public function fetch_All($table = null, $order = null, $sort = null, $condition = null)
    {
        if ($table != null) {
            $sql = "SELECT * FROM {$table} ";

            if ($condition != null) {
                $sql = "WHERE {$condition} ";
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





    /** Delete Data By Id */ 
    public function delete($table = null, $condition = null)
    {
        if ($table != null && $condition != null) {
            $sql = "DELETE FROM {$table} WHERE $condition";
            if ($this->conn->query($sql)) {
                return true;
            }
        }
    }



    /**  Insert Data Into Database  */
    public function insert($table, $param = [])
    {
        if ($this->table_exist($table)) {
            $table_keys = implode(", ", array_keys($param));
            $table_vals = implode("', '", $param);

            $sql = "INSERT INTO {$table}({$table_keys}) 
                    VALUES('{$table_vals}')";
            if ($this->conn->query($sql)) {
                return true;
            }
        }
    }


    /** Update Data From Database  */
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
                echo 'Updated';
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }



    /**  Check Table Exist In Database Or Not. */
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


    
    /** Pagination a */
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
     * Database Close 
     * Check database connection is set or null
     */
    public function __destruct()
    {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
       
}



?>