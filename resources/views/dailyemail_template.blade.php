<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 

		$status = array(
							'0'=>'Check In',
							'1'=>'Check Out'
						);
	?>

	<h3>This email is from ICS Attendance System</h3>
	
	<p>Hello Parent's of {{$fullname}}</p>

	@if($punchstate == 0)
		<p>This email is to inform you that {{$fullname}} has {{$status[$punchstate]}} into ICS School on {{date("d/m/Y", strtotime($punchtime))}} at {{date("H:i", strtotime($punchtime))}}</p>
	@else
			<p>This email is to inform you that {{$fullname}} has {{$status[$punchstate]}} from ICS school on {{date("d/m/Y", strtotime($punchtime))}} at {{date("H:i", strtotime($punchtime))}}</p>

	@endif
	

	<br><hr>
	<p>This is an automated email. Do not reply.</p>


</body>
</html>