<?php
    class auditoria{
		private $conn;
		private $table_name = "auditoria";
        
        public $id;
		public $username;
		public $fecha_acceso;
		public $response_time;
		public $endpoint;
		public $created;
        
        public function __construct($conn){
				$this->conn = $conn;
		}


		function create(){
				$query="INSERT INTO " . $this->table_name . " SET username=:username, response_time=:response_time, endpoint=:endpoint";
				$stmt=$this->conn->prepare($query);
				$stmt->bindParam(":username",$this->username);
				$stmt->bindParam(":response_time",$this->response_time);
				$stmt->bindParam(":endpoint",$this->endpoint);
				if($stmt->execute()){
						return true;
				}
				return false;
		}
}
?>