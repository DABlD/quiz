<?php
	include('error_reporting.php');
	include('conn.php');

	function insertTo($table, $data, $fields = "(", $values = "(")
	{
		global $conn;

		$query = "INSERT INTO " . $table;

		echo '<pre>';
		foreach($data as $row => $value)
		{
			$value = is_array($value) ? json_encode($value) : $value;
			$fields = $fields . $row . ",";
			$values = $values . "'" . $value . "',";
		}

		$query = $query . " " . substr($fields, 0, -1) . ") VALUES" . substr($values, 0, -1) . ")";

		return $conn->query($query);
	}

	function getData($table, $data)
	{
		global $conn;

		$query = "SELECT * FROM " . $table;

		$conditions = "";

		foreach($data as $row => $value)
		{
			$conditions = $conditions . $row . "='" . $value . "' AND ";
		}

		$query = $query . ' WHERE ' . $conditions . ' 1';

		return $conn->query($query);
	}

	function deleteFrom($table, $id)
	{
		global $conn;

		return $conn->query('DELETE FROM ' . $table . ' WHERE id=' . $id);
	}

	function updateThis($table, $data, $id)
	{
		global $conn;

		$query = "UPDATE " . $table . " SET";

		foreach($data as $row => $value)
		{
			$query = $query . " " . $row . "='" . $value . "',";
		}

		return $conn->query(substr($query, 0, -1) . ' WHERE id=' . $id);
	}

	function searchFrom($table, $keyword)
	{
		global $conn;

		$columns = $conn->query('SHOW COLUMNS FROM ' . $table);
		$query = 'SELECT * FROM ' . $table . ' WHERE ';

		while($field = $columns->fetch_assoc())
		{
			$query = $query . $field['Field'] . ' LIKE "%' . $keyword . '%" OR ';
		}

		return $conn->query(substr($query, 0, -4));
	}
?>