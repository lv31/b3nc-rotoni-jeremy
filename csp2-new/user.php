<?php

session_start();

if (isset($_SESSION['current_user'])) {
	if ($_SESSION['role'] != 'admin') {
		header('location: home.php');
	}
}

function getTitle() {
	echo 'User';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>User Page</h1>

		<?php

		$id = $_GET['id'];
		$file = file_get_contents('assets/users.json');
		$users = json_decode($file, true);

		/*foreach ($users as $key => $user) {
			if ($key==$id) {
				break;
			}
		} <?php 
		echo $user['username']; ?>*/

		?>

		<table>
			<tr>
				<td>Username</td>
				<td><?php echo $users[$id]['username']; ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $users[$id]['password']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $users[$id]['email']; ?></td>
			</tr>
			<tr>
				<td>Role</td>
				<td><?php echo $users[$id]['role']; ?></td>
			</tr>
		</table>

		<button class="btn btn-primary">Edit</button>
		<button class="btn btn-danger">Delete</button>
	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';
?>

</body>
</html>