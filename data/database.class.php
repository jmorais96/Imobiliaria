<?php

  abstract class Database extends PDO {

	#atributos de configuração
	private $driver;
	private $host;
	private $dbname;
	private $port;
	private $user;
	private $password;

	#atributos da bd
	private $conn;
	private $queries;
	private $error;

	#construtor
	public function __construct($configFile){
		#obter dados do ficheiro de configuração
		$config = parse_ini_file($configFile);


		$this->driver = $config['driver'];
		$this->host = $config['host'];
		$this->port = $config['port'];
		$this->dbname = $config['dbname'];
		$this->user = $config['user'];
		$this->password = $config['pass'];

		#criar o dsn
		$dsn = $this->driver.': host='.$this->host.'; port='.$this->port.'; dbname='.$this->dbname;

		# criar a ligacao a BD
		try{
			$this->conn = new PDO($dsn, $this->user, $this->password);
		}
		catch (PDOException $e){

			//echo '<script>alert("'.$e->getMessage().'")</script>';
			$this->conn = null;
		}
	}


	public function query($query, $parameters = [], $singleResult = false) {


        if (is_string($query) && $query !== "" && is_array($parameters) && is_bool($singleResult)) {

            try {

                $this->queries = $this->conn->prepare($query);

                foreach ($parameters as $placeholder => $value) {
					if (is_string($value))
						$type = PDO::PARAM_STR;
					elseif (is_int($value))
						$type = PDO::PARAM_INT;
					elseif (is_bool($value))
						$type = PDO::PARAM_BOOL;
					else
						$type = PDO::PARAM_NULL;

					$this->queries->bindValue($placeholder, $value, $type);
                }

                $this->queries->execute();


                if ($singleResult === true)
					$results = $this->queries->fetch(PDO::FETCH_ASSOC);
                else
                    $results = $this->queries->fetchAll(PDO::FETCH_ASSOC);

                return $results;

            }
            catch (PDOException $e) {
                $this->error = $e->getMessage();
			}

        }
        else {
			$this->error = "Query ou parâmetros inválidos";
			return null;
		}
    }


  //   public function existsEmail($email){
	//
	// 	$sql = "SELECT COUNT(*) FROM utilizador WHERE email = ?";
	//
	// 	$stmt = $this->conn->prepare($sql);
	// 	$stmt->bindValue(1, $email);
	// 	$stmt->execute();
	//
	// 	$result = $stmt->fetch();
	// 	if ($result[0] == 0)
	// 		return 'false';
	// 	else
	// 		return 'true';
	// }


}


?>
