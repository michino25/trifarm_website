<?php
require_once "config.php";

// True to print query for test API
$testQuery = false;

function connect(&$connection)
{

	$connection = mysqli_connect(HOST, USER, PASSWORD, DB);
	mysqli_set_charset($connection, 'UTF8');
	if (mysqli_connect_errno()) {
		echo "Lỗi kết nối đến máy chủ: " . mysqli_connect_error();
		exit();
	}
}

function dispose($connection)
{
	try {
		mysqli_close($connection);
	} catch (TypeError $e) {
	}
}

function executeQuery($query)
{
	$connection = NULL;
	connect($connection);
	$result = mysqli_query($connection, $query);
	dispose($connection);
	return $result;
}

function genAndExecQuery($tableName, $params, $limit = null, $type = null, $select = '*')
{
	$connection = NULL;
	connect($connection);

	switch ($type) {
		case 'search':
			$query = generateSelectQueryAdvance($connection, $tableName, $params);
			break;
		case 'update':
			$query = generateUpdateQuery($connection, $tableName, $params['updates'], $params['where']);
			break;
		case 'insert':
			$query = generateInsertQuery($connection, $tableName, $params);
			break;
		case 'delete':
			$query = generateDeleteQuery($connection, $tableName, $params);
			break;
		default:
			$query = generateSelectQuery($connection, $tableName, $params, $limit, $select);
			break;
	}

	$result = mysqli_query($connection, $query);
	dispose($connection);

	$testQuery = false;
	if ($testQuery) {
		return $query;
	} else
		return $result;
}

// Convert Result of Query to ToArray
function convertResultToArray($result)
{
	$data = array();

	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
	}

	$testQuery = false;
	if ($testQuery) {
		return $result;
	} else
		return $data;
}

// Generate Select Query
function generateSelectQuery($connection, $tableName, $params, $limit = null, $select = '*')
{
	$query = "SELECT " . $select . " FROM " . $tableName;

	// Check if there are any parameters
	if (!empty($params)) {
		$query .= " WHERE ";

		$conditions = array();
		foreach ($params as $key => $value) {
			// Sanitize the parameter values to prevent SQL injection
			$value = mysqli_real_escape_string($connection, $value);

			// Build the condition for each parameter
			$conditions[] = $key . " = '" . $value . "'";
		}

		// Join the conditions with "AND" operator
		$query .= implode(" AND ", $conditions);
	}

	// Add the limit clause if provided
	if ($limit !== null) {
		$query .= " LIMIT " . $limit;
	}

	return $query;
}

// Generate Select Query Advance for search
function generateSelectQueryAdvance($connection, $tableName, $params)
{
	$query = "SELECT * FROM " . $tableName;

	// Check if there are any parameters
	if (!empty($params)) {
		$conditions = array();
		foreach ($params as $key => $value) {
			// Handle specific conditions based on parameter key
			switch ($key) {
				case 'name':
					if ($value != '') {
						$conditions[] = "`name` LIKE '%" . mysqli_real_escape_string($connection, $value) . "%'";
					}
					break;
				case 'category':
					if ($value != '') {
						$conditions[] = "`id_category` = " . intval($value);
					}
					break;
				case 'location':
					if (!empty($value)) {
						$locationConditions = array();
						foreach ($value as $location) {
							$locationConditions[] = "location = '" . mysqli_real_escape_string($connection, $location) . "'";
						}
						$conditions[] = "(" . implode(" OR ", $locationConditions) . ")";
					}
					break;
				case 'price':
					if (!empty($value)) {
						$priceConditions = array();
						if (!empty($value[0])) {
							$priceConditions[] = "price >= " . intval($value[0]);
						}
						if (!empty($value[1])) {
							$priceConditions[] = "price <= " . intval($value[1]);
						}
						$conditions[] = implode(" AND ", $priceConditions);
					}
					break;
				case 'star':
					if ($value != '') {
						$conditions[] = "star >= " . intval($value) * 10;
					}
					break;
			}
		}

		if (!empty($conditions)) {
			$query .= " WHERE " . implode(" AND ", $conditions);
		}

		if (isset($params['sort'])) {
			$order = [
				'default' => 'star*sold*review DESC',
				'newest' => 'id DESC',
				'top_seller' => 'sold DESC',
				'price_desc' => 'price DESC',
				'price_asc' => 'price ASC',
				'biggest_discount' => 'old_price/price DESC'
			];
			if (isset($order[$params['sort']])) {
				$query .= " ORDER BY " . $order[$params['sort']];
			}
		}

		if (
			isset($params['page'])
			&& is_array($params['page'])
			&& isset($params['page'][0])
			&& isset($params['page'][1])
		) {
			$productPerPage = intval($params['page'][1]);
			$from = (intval($params['page'][0]) - 1) * $productPerPage;
			$query .= " LIMIT " . $productPerPage . " OFFSET " . $from;
		}
	}

	return $query;
}

// Generate UPDATE query
function generateUpdateQuery($connection, $tableName, $params, $where)
{
	$query = "UPDATE `" . $tableName . "` SET ";

	$updates = array();
	foreach ($params as $key => $value) {
		// Sanitize the parameter values to prevent SQL injection
		$value = mysqli_real_escape_string($connection, $value);

		// Build the update statement for each parameter
		$updates[] = "`" . $key . "` = '" . $value . "'";
	}

	// Join the update statements with commas
	$query .= implode(", ", $updates);

	$conditions = [];
	foreach ($where as $column => $value) {
		// Sanitize the column and value to prevent SQL injection
		$column = mysqli_real_escape_string($connection, $column);
		$value = mysqli_real_escape_string($connection, $value);

		// Build the condition statement for each column-value pair
		$conditions[] = $column . " = '" . $value . "'";
	}

	$where = implode(" AND ", $conditions);

	// Add the WHERE clause
	$query .= " WHERE " . $where;

	return $query;
}

// Generate INSERT query
function generateInsertQuery($connection, $tableName, $params)
{
	$query = "INSERT INTO `" . $tableName . "` (";

	$columns = array();
	$values = array();
	foreach ($params as $key => $value) {
		// Sanitize the parameter values to prevent SQL injection
		$value = mysqli_real_escape_string($connection, $value);

		// Build the column and value statements for each parameter
		$columns[] = "`" . $key . "`";
		$values[] = "'" . $value . "'";
	}

	// Join the columns and values with commas
	$query .= implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ")";

	return $query;
}

// Generate DELETE query
function generateDeleteQuery($connection, $tableName, $where)
{
	$query = "DELETE FROM " . $tableName;

	$conditions = [];
	foreach ($where as $column => $value) {
		// Sanitize the column and value to prevent SQL injection
		$column = mysqli_real_escape_string($connection, $column);
		$value = mysqli_real_escape_string($connection, $value);

		// Build the condition statement for each column-value pair
		$conditions[] = $column . " = '" . $value . "'";
	}

	$where = implode(" AND ", $conditions);

	// Add the WHERE clause
	$query .= " WHERE " . $where;

	return $query;
}
