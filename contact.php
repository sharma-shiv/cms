<!DOCTYPE>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="formwizard.css" />

<script src="formwizard.js" type="text/javascript">

/***********************************************
* jQuery Form to Form Wizard- (c) Dynamic Drive (www.dynamicdrive.com)
* Please keep this notice intact
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>

<script type="text/javascript">

var myform=new formtowizard({
	formid: 'feedbackform',
	persistsection: true,
	revealfx: ['slide', 500]
})

</script>

</head>
<body>
<form id="feedbackform">

<fieldset class="sectionwrap">
<legend>Basic Information</legend>
Name:<br /> <input id="username" type="text" size="35" /><br />
Age:<br /> <input id="age" type="text" size="6" /><br />
Sex: <input type="radio" name="sex" value="male" /> Male <input type="radio" name="sex" value="female" /> Female 
</fieldset>

<fieldset class="sectionwrap">
<legend>Shipping Address</legend>
Country:<br /> <input id="country" type="text" size="35" /><br />
State/Province:<br /> <input id="state" type="text" size="35" /><br />
Address #1:<br /> <input id="addr1" type="text" size="35" /><br />
Address #2:<br /> <input id="addr2" type="text" size="35" /><br />
</fieldset>

<fieldset class="sectionwrap">
<legend>Comments</legend>
Any additional instructions:<br /> <textarea id="feedback" style="width:350px;height:150px"></textarea><br />
<input type="submit" />
</fieldset>

</form>
</body>
</html>