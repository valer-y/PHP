<?php

namespace App;

class Test extends Dbh
{
	public function getInfo() {
		$sql = "SELECT * FROM users";
		$stmt = $this->connect()->query($sql);
		while ($row = $stmt->fetch()) {
			echo $row['users_firstname'] . "<br/>";
		}
	}

	public function getUserInfo($firstname = '') {
		$sql = "SELECT * FROM users WHERE users_firstname = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname]);
		$names = $stmt->fetchAll();

		foreach ($names as $name) {
			echo $name['users_firstname'] . $name['users_lastname'] . $names['users_dateofbirth'];
		}
	}
}