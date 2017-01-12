	<?php
	class db_pdoextend extends PDO{
	    private $_dsn = 'mysql:host=localhost;dbname=coffee';
	    private $_username = 'root';
	    private $_passwd='test';
	    private $_encode = 'utf8';
	    private $_stmt;

	    function __construct(){
            try{
                parent::__construct($this->_dsn, $this->_username, $this->_passwd);
                $this->_setEncode();
            }catch(Exception $ex){
                print_r($ex);
            }
        }

        private function _setEncode(){
	        $this->query("SET NAMES '$this->_encode'");
        }

        function binQuery($sql,array $bind = []){
            $this->_stmt = $this->prepare($sql);
            $this->_bind($bind);
            $this->_stmt-execute();
            return $this->_stmt-fetchAll();
        }
        private function _bind($bind){
            foreach($bind as $key => $value){
                $this->_stmt-bindValue($key,$value,is_numeric($value)?PDO::PARAM_INT:PDO::PARAM_STR);
            }
        }
    }
	?>