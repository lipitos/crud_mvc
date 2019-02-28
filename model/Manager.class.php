<?php

class Manager extends Conexao {

	public function insertClient($table, $data){
		$pdo = parent::get_instance();
		$fields = implode(", ", array_keys($data));
		$values = ":" .implode(", :", array_keys($data));
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		$stmt = $pdo->prepare($sql);
		foreach($data as $key => $value){
			$stmt->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$stmt->execute();
	}

	public function listClient($table){
		$pdo = parent::get_instance();
		$sql = "SELECT * FROM $table ORDER BY name ASC";
		$stmt = $pdo->query($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function deleteClient($table, $id){
		$pdo = parent::get_instance();
		$sql = "DELETE FROM $table where id = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
	}

	public function getInfo($table, $id){
		$pdo = parent::get_instance();
		$sql = "SELECT * from $table where id = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function updateClient($table, $data, $id){
		$pdo = parent::get_instance();
		$new_values = "";
		foreach($data as $key => $value){
			$new_values .= "$key=:$key, ";
		}
		$new_values = substr($new_values, 0, -2);
		$sql = "UPDATE $table SET $new_values where id = :id";
		$stmt = $pdo->prepare($sql);
		foreach($data as $key => $value){
			$stmt->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$stmt->execute();
	}
}