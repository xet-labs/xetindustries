<?php $XIpass="1019@xI.db#1o1"?>

<?php
	$DBconf = [
		"XI" => [
			'servername' => "localhost",
			'username' => "XIu",
			'pass' => "$XIpass",
			'db' => "XI"
		],
		"XI_t" =>[
			'servername' => "localhost",
			'username' => "XIu_t",
			'pass' => "uTestDbPass",
			'db' => "XI_t"
		]
	];

	$DBquery = [
		"XI" => [
			'Users' => "SELECT * FROM Users ORDER BY created_at DESC ",
			'Blogs' => "SELECT * FROM Blogs WHERE status = 'published' ORDER BY created_at DESC ",
			'Blogs_raw' => "SELECT * FROM Blogs WHERE "
		]
	];

	
	// -init var
	$conn = null;
	$result = null;

	function __dbConn($db_conf, $mode = 0) {
		global $conn;
	
		// Create a connection if it doesn't exist
		if ($conn === null) {
			if ($mode == 0) {
				$conn = new mysqli($db_conf['servername'], $db_conf['username'], $db_conf['pass'], $db_conf['db']);
		
				// Check the connection
				if ($conn->connect_error) {
					throw new Exception("DB connection failed: " . $conn->connect_error);
				}
			} elseif ($mode == 1) {
				$conn = mysqli_connect($db_conf['servername'], $db_conf['username'], $db_conf['pass'], $db_conf['db']);
				if (!$conn) {
					throw new Exception("Connection failed: " . mysqli_connect_error());
				}
			}
		}
	
		return $conn;
	}
	// example
	// try {
	// 	$conn = __dbConn($db_conf, 0);
	// 	// Do something with the connection
	// } catch (Exception $e) {
	// 	echo "Error: " . $e->getMessage();
	// }
	

	function __dbDconn($conn) {
		global $conn;
		// Close the connection if it exists
		if ($conn !== null) {
			$conn->close();
			$conn = null;
		}

		// Free the result set to release memory, if applicable
		// if ($result) {$result->free();}
	}

	function __dbQuery($conn,$db_query) {

		// exec the SQL query
		$result = $conn->query($db_query);

		// Check for errors in the query
		if (!$result) {die("Query failed: " . $conn->error);}
		
		return $result;
	}



	function DB_DATA($db_conf, $db_query, $id = ['id',1]) {
		global $conn;

		$conn=__dbConn($db_conf);
		
		$result=__dbQuery($conn,$db_query);

		// -Fetch resulting rows as an array
		// $db_data = $result->fetch_all(MYSQLI_ASSOC);
		// -Fetch resulting rows as an associative array indexed by id
		$db_data = [];
		$multi="";
		while ($row = $result->fetch_assoc()) {
			if ($multi){
				$db_data[$row["$id[0]"]] = $row; //-multidimensional array
			}else{
				$db_data[] = $row; //-associative array
			}
		}

		$result->free();

		return $db_data;
	}

	function userctl() {
		// working on this function
	}

	__dbDconn($conn);

?>

<?php 
	// -managing users


?> 