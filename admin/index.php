<!Doctype html>
<?php include 'includes/header.php'?>
	<h1>ADMIN LOGIN</h1>
	</div>
	</div>
	<div id="logindiv">
		<form method="POST" action="operator.php">
			<table cellspacing="10">
				<input type="hidden" name="action" value="adminlogin">
				<tr><td>User Name:</td><td><input type="text" name="data[uname]"></td></tr>
				<tr><td><br></td></tr>
				<tr><td>Password :</td><td><input  type="password"  name="data[password]"></td></tr>
				<tr><td><br></td></tr>
				<tr><td colspan=2 align="center"><input type="submit" name="submit" value="Login"></td></tr>
			</table>
		</form>
	</div>
</body>
</html>