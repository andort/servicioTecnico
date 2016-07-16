
<?php 

//esta es la clase conexion que me permite conectarme a la base de datos y ejecutar las funciones

class DataBase {
	private static $_drive = DRIVER;
	private static $_port = PORT;
	private static $_server = SERVER;
	private static $_user = USER;
	private static $_passwd = PASSWD;
	private static $_host = SERVER;
	private static $_dbName = DBNAME;
	private static $_connect;
	
	
	private function DataBase(){}
		
		
	//aca miramos si la coneccion no existe entonces agala
	public static function getInstance(){
		$dns = self::$_drive.":host=".self::$_host.":3306;"."dbname=".self::$_dbName;
		
		if(!isset(self::$_connect)){
			self::$_connect = new PDO ($dns, self::$_user, self::$_passwd,array(PDO::ATTR_PERSISTENT=>TRUE));
			self::$_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$_connect;
		
		}
		
		
	// devuelve el numero de filas modificadas por la sentencia SQL
	public function Exec($sql){
		return self::$_connect->exec($sql);
		}
		
	// retorna un objeto PDOStatement, o false en caso de error
	public function Query($sql){
		return self::$_connect->query($sql);
		}	
	
	
	public function __clone(){
		trigger_error('Este objeto no se puede clonar', E_USER_ERROR);
		}
	
	
	}




?>