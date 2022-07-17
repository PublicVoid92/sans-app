@include('header')
@include('sidebar')
@include('topnav')




 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Student Detail</h3>
		</div>
	</div>

	<div class="clearfix"></div>
	<input type="hidden" id="studentid" name="studentid" value="{{$data->id}}">

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
							<td rowspan="4" width="20%"><img src="{{url('/')}}/gentelella-master/gentelella-master/production/images/user.png"></td>
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
									<h6><b>{{$value->attr_name}}</b> : {{$extra_info[$value->id]}}</h6>

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
				<div class="x_content2">
						<?php 
							$number = cal_days_in_month(CAL_GREGORIAN, (int)date('m'), (int)date('Y'));


						?>
							<div style="overflow-x:auto;">
						<table  class="table table-striped table-bordered" style="width:100%" >
									<thead>
										<tr>
											<td width="1%">Date</td>
											
											@for($i=1;$i<=$number;$i++)

											 @if((int)date('d') == $i)
											 	<td>{{$i}}*</td>
											 @else
											 	<td>{{$i}}</td>
											 @endif
											
											@endfor
										</tr>
									</thead>
									<tbody>
										<?php $no = 1 ?>
									
										<tr>
											<td>Status</td>
											
											@for($i=1;$i<=$number;$i++)
											@if(isset($getattendance_array[$data->id][$i]))

												@if(date_format(date_create($getattendance_array[$data->id][$i]),"H:i") <= '08:10')
												 	<td  class="table-success">P</td>
												@endif


												@if(date_format(date_create($getattendance_array[$data->id][$i]),"H:i") > '08:10')
													
												 	<td  class="table-warning">T</td>
													 
												@endif






											@else
											
												 	<td>A</td>
												
											@endif
											
											@endfor
											<?php $no = $no + 1;?>
											
										</tbody>

									</table>
								</div>
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

<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>
   


