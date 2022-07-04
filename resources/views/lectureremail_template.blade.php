<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style type="text/css">
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}

	</style>
</head>
<body>

<h3>This email is from ICS Attendance System</h3>

<p>Hello {{$firstname}},</p>

<p>Here is the attendance for grade {{$classname}} class on {{date('d/m/Y')}}</p>

<table width="60%">
	<thead>
		<td width="5%"><b>No</b></td>
		<td width="80%"><b>Student Name</b></td>
		<td width="5%"><b>Attendance Status</b></td>
	</thead>
	<?php $no = 1;?>
	@if(isset($student_list[$classid]))
		@foreach($student_list[$classid] as $key => $value)
			<tr>
				<td><center>{{$no}}</center></td>
				<td>{{$value['firstname'].' '.$value['lastname']}}</td>
				<td style="text-align: center">{{$value['attendance_status']}}</td>


				
				
						
			</tr>
			<?php $no = $no +1;?>
		@endforeach
	@endif
	


</table>
</body>
</html>