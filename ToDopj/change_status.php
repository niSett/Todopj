<?php 

//take a elements in json file
$json = file_get_contents('todo.json')
$jsonArray = json_decode($json, true);


//validate exists
if(file_exists('todo.json')) {
	//change the element
	$todoName = $_POST['todo_name'];
	$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed']; 
} else {
	$jsonArray = [];
}


//put updated list of elements in json file
file_put_contents('todo.json', json_encode($jsonArray, JSON_RPETTY_PRINT));

//enter the user on index page
header('Location: index.php');
?>