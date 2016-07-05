<?php include "includes/header.php";?>
<script>
	function loadcountries()
	{
		$.get('../load_countries.php?country=&state=', function(data) {
			$('#countries').append(data);
		});
	}
	function loadstates()
	{
		var country=$('#countries').val();
		$.get('../load_countries.php?state=&country='+country , function(data1){
			$('#states').html(data1);
		});
	} 
	function loadcities()
	{
		var state=$('#states').val();
		$.get('../load_countries.php?country=&state='+state, function(data2)
		{
			$('#cities').html(data2);
		});
	} 
	$(function()
	{
		$( "#dob" ).datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2016"
		});
	});
</script>
			<h1  align="center">REGISTRATION</h1>
		</div>
	</div>
<div id="divcontent">	
	<div id="sidemenu">
		<ul class="list-group">
			<li class="list-group-item"><a href="manageusers.php">Back</a></li>
		</ul>
	</div>
	<div style="top:50px; left:100px; width:100%; height:600px;  position:relative;">
		<FORM method="POST" action="operator.php" enctype="multipart/form-data" onsubmit="return validation()" >
			<table  align="center"   cellspacing="10">
				<input type="hidden" name="action" value="adduser">
				<tr><td>Username</td><td colspan=3><INPUT TYPE="TEXT" NAME="data[uname]" size=45 id="user" ></td><td><?php  if(isset($_SESSION['user_error'])) { echo $_SESSION['user_error'];  } ?></td><td><?php  if(isset($_SESSION['check_user_error'])) { echo $_SESSION['check_user_error'];  } ?></td></tr>
				<tr><td>Password</td><td colspan=3><INPUT TYPE="password"  NAME="data[password]" id="password" size=45  onblur="return password_strength()"></td><td><?php  if(isset($_SESSION['password_error'])) { echo $_SESSION['password_error'];  } ?></td></tr>
				<tr><td>Re Type Password</td><td colspan=3><INPUT TYPE="password" NAME="rpassword" id="rpassword" size=45  ></td><td><?php  if(isset($_SESSION['rpassword_error'])) { echo $_SESSION['rpassword_error'];  } ?></td></tr>
				<tr><td>First Name</td><td colspan=3><INPUT TYPE="TEXT" NAME="data[fname]" id="fname" size=45  ></td><td><?php  if(isset($_SESSION['fname_error'])) { echo $_SESSION['fname_error'];  } ?></td></tr>
				<tr><td>Last Name</td><td colspan=3><INPUT TYPE="TEXT" NAME="data[lname]" id="lname" size=45></td><td><?php  if(isset($_SESSION['lname_error'])) { echo $_SESSION['lname_error'];  } ?></td></tr>
				<tr><td>Email</td><td colspan=3><INPUT TYPE="TEXT" NAME="data[email]" id="email" size=45></td><td><?php  if(isset($_SESSION['email_error'])) { echo $_SESSION['email_error'];  } ?></td></tr>
				<tr><td>Mobile no.</td><td colspan=3><INPUT TYPE="TEXT" maxlength=10 onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' NAME="data[mobile]" id="mobile" size=45 onblur="return mobile_validation()"></td><td><?php  if(isset($_SESSION['mobile_error'])) { echo $_SESSION['mobile_error'];  } ?></td></tr>
				<tr><td>Date of Birth</td><td colspan=3><INPUT TYPE="text" readonly NAME="data[dob]"  id="dob" size=45 ></td></tr>
				<tr><td></td><td>dd/mm/yyyy</td></tr>
				<tr><td>GENDER</td><td ><INPUT TYPE="RADIO" NAME="data[gender]" id="male" VALUE="male"> <label for="male">MALE</label></td><td><INPUT TYPE="RADIO" NAME="data[gender]" id="female" VALUE="female"> <label for="female">FEMALE</lable></td><td><INPUT TYPE="RADIO" NAME="data[gender]" id="transgender" VALUE="others"> <label for="transgender">TRANSGENDER</label></td></tr>
				<tr><td>ADDRESS</td><td colspan=3><Textarea COLS=34 name="data[address]"></Textarea></td></tr>
				<tr>
					<td >Countries</td>
					<td colspan=2>
						<select id="countries" name="data[countries]" onchange="loadstates()" >
							<option value="select">select</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>States</td>
					<td colspan=2>
						<select id="states" name="data[states]" onchange="loadcities()">
							<option value="select" >Select</option>
						</select>
					</td>
				</tr>
				<tr>
					<td >City</td>
					<td colspan=3>
						<select id="cities" name="data[cities]">
							<option value="select" >Select</option>
						</select>
					</td>
				</tr>
				<tr><td>Upload Image</td><td colspan=3><input type="file" name="profile" accept="image/*" id="image"></td></tr>
				<tr><td><br></td></tr>
				<tr><td  colspan=5 align="center"><INPUT  TYPE="submit" NAME="submit" VALUE="Add User"></td></tr>
			</table>
		</form>
	</div>
</div>
	<div id="footer">
		<br>
		<h4 align="center">Widget News &copy; 2011. All rights reserved.</h4>
		<h5 align="center"><a href="index.php">Site Admin</a></h5>
	</div>
</body>
</HTML>