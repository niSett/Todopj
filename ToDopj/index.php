<?php 
	
$todos = [];

//validate json file exists
if (file_exists('todo.json')) {
	//get elements in the json file
	$json = file_get_contents('todo.json');
	$todos = json_decode('todo.json', true); 
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>

	<body>

		<form action="newtodo.php" method="post"> 
			<input type="text" name="todo_name" placeholder="Enter your todo">
			<button> New Todo </button>
		</form>
		</br>

		<?php foreach ($todos as $todoName => $todo): ?>
			<div style="margin-bottom: 20px;"> 
				<!-- realize checked status -->
				<form style="display: inline-block" action="change_status.php" method="post">
				<index type="hidden" name="todo_name" value="<?php echp $todoName ?>">
					<input type="checkbox" </php echo $todo['completed'] ? 'checked' : '' ?>>
				</form>
				<?php echo $todoName ?>
				<!-- realize delete button -->
				<form style="display: inline-block" action="delete.php" method="post"> 
					<input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
					<button>Delete</button>
				</form>
			</div>
		<?php endforeach; ?>

		<script>
			//realize function onclick checkbox
			const checkboxes = document.querySelectorAll('input[type="checkbox]');
			checkboxes.forEach(ch => {
				ch.onclick = function() {
					this.parentNode.submit();
				};
			})
		</script>

	</body>
</html>