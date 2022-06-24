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
	
	<p>Hello Parent's of {{$fullname}}</p><br>

	@if($punchstate == 0)
		<p>This email is to inform you that {{$fullname}} has {{$status[$punchstate]}} into ICS School at {{date("d/m/Y", strtotime($punchtime))}} on {{date("H:i", strtotime($punchtime))}}</p>
	@else
			<p>This email is to inform you that {{$fullname}} has {{$status[$punchstate]}} from ICS school at {{date("d/m/Y", strtotime($punchtime))}} on {{date("H:i", strtotime($punchtime))}}</p>

	@endif
	

	<br><hr>
	<p>This is an automated email. Do not reply.</p>


</body>
</html>