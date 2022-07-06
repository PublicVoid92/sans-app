@include('header')
@include('sidebar')
@include('topnav')


<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Class Details</h3>
		</div>

	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-10">
			<div class="x_panel">
				<div class="x_title">
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">


					<div class="row">
						<div class="col-md-12">
							<h2><b>LECTURER NAME:</b> {{strtoupper($class_data[0]->fullname)}}</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h2>
								<b>GRADE LEVEL:</b> {{$class_data[0]->position_name}}
							</h2>
						</div>
						<div class="col-md-6">
							<h2>
								<b>HOME ROOM:</b> {{$class_data[0]->position_name}}
							</h2>
						</div>

					</div>
					<div class="row">

						<div class="col-md-12">
						<h5><br><u>Attendance Month:{{date('M')}}</u><br></h5>	
						</div>
						

					</div>
					<div class="row">
						<div class="col-md-12">
							<?php 
							$number = cal_days_in_month(CAL_GREGORIAN, (int)date('m'), (int)date('Y'));


							?>


							<div style="overflow-x:auto;">
								<table id="datatable" class="table table-striped table-bordered" style="width:100%" >
									<thead>
										<tr>
											<td width="1%">No.</td>
											<td width="3%">Student No</td>
											<td width="3%">First Name</td>
											<td width="3%">Last Name </td>
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
										@foreach($student_data as $key => $value)
										<tr>
											<td>{{$value->id}}</td>
											<td>{{$value->emp_code}}</td>
											<td>{{$value->first_name}}</td>
											<td>{{$value->last_name}}</td>
											@for($i=1;$i<=$number;$i++)
											@if(isset($getattendance_array[$value->id][$i]))

												@if(date_format(date_create($getattendance_array[$value->id][$i]),"H:i") <= '08:10')
												 	<td  class="table-success">P</td>
												@endif


												@if(date_format(date_create($getattendance_array[$value->id][$i]),"H:i") > '08:10')
													
												 	<td  class="table-warning">T</td>
													 
												@endif






											@else
											
												 	<td>A</td>
												
											@endif
											
											@endfor
											<?php $no = $no + 1;?>
											@endforeach
										</tbody>

									</table>
								</div>
							</div>

						</div>
					</div>
				</div>




			</div>
		</div>
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

<script type="text/javascript">