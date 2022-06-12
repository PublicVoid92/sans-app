@include('header')
@include('sidebar')
@include('topnav')





<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Student Detail</h3>
		</div>
	</div>

	<div class="clearfix"></div>


	<div class="row">
		<div class="col-md-10">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{'Student Name'.' : '.$data->first_name.' '.$data->last_name}}</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-bordered">
						<tr>
							<td rowspan="4" width="30%"></td>
						</tr>
						<tr>
							<td style="font-weight: bold;">StudentID</td>
							<td>{{$data->emp_code}}</td>
							<td style="font-weight: bold;">Gender</td>
							<td>{{$data->gender == 'M' ? 'Male' : 'Female'}}</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">First name</td>
							<td>{{$data->first_name}}</td>
							<td style="font-weight: bold;">Date of Birth</td>
							<td>{{$data->birthday}}</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Last name</td>
							<td>{{$data->last_name}}</td>
							<td style="font-weight: bold;">Email</td>
							<td>{{$data->email}}</td>
						</tr>


					</table>
				</div>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<div class="x_panel">
				<div class="x_title">
					<h2>Extra Information</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					@if(!empty($cf))
						@foreach($cf as $key=>$value)
							<div class="col-md-5">

								@if(isset($extra_info[$value->id]))
									<h6>{{$value->attr_name.' : '.$extra_info[$value->id]}}</h6>

								@else
									<h6>{{$value->attr_name.' : '}}</h6>
								@endif
								
							</div>
						@endforeach
					@endif
					
				</div>
				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<div class="x_panel">
				<div class="x_title">
					<h2>Attendance Summary</h2>
					<div class="clearfix"></div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9"></div>
		<div class="col-md-1">
			<button onclick="history.back()" class="btn btn-secondary">Back</button>
		</div>
	</div>
</div>

@include('footer')