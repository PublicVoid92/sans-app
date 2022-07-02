@include('header')
@include('sidebar')
@include('topnav')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



<div class="">
	<div class="page-title">
		<div class="title_left">
			<h2>Lecturer List</h2>
		</div>
	</div>
	<div class="clearfix"></div>
	

	<div class="row">
		<div class="col-md-10">

			<div class="x_panel">
				<div class="x_title">
					<h2>ICS ABUJA Lecturer List</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<center>
						<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  >Add Lecturer</button>
					</center>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add Lecturer</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<label>Title</label>
									<select class="form-control" id="title" name="title">
										<option>Mr.</option>
										<option>Mrs.</option>
									</select>
									<label>First name</label>
									<input type="text" name="firstname" id="firstname" class="form-control">
									<label>Last name</label>
									<input type="text" name="lastname" id="lastname" class="form-control">
									<label>Full Name</label>
									<input type="text" name="fullname" id="fullname" class="form-control">
									<label>Email</label>
									<input type="email" name="email" id="email" class="form-control">
									<label>Class</label>
									<select class="form-control" id="classname" name="classname">

										<option value="0">-</option>
										@if(!empty($classData))
										@foreach($classData as $key => $value)

										<option value="{{$value->id}}">{{$value->position_name}}</option>
										@endforeach




										@endif
									</select>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" onclick="add_lecturer()">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!-- close modal -->
					<table id="datatable" class="table table-striped table-bordered" style="width:100%" >
						<thead>
							<tr>
								<td>No.</td>
								<td>Title</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td>Full Name </td>
								<td>Email</td>
								<td>Class</td>
								<td></td>

							</tr>
						</thead>
						<tbody>
							<?php $no = 1 ?>
							@foreach($lecturer_data as $key => $value)
							<tr>
								<td>{{$no}}</td>
								<td>{{$value->title}}</td>
								<td>{{$value->firstname}}</td>
								<td>{{$value->lastname}}</td>
								<td>{{$value->fullname}}</td>
								<td>{{$value->email}}</td>
								<td>{{$value->position_name}}</td>
								<td><button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal-<?php echo $value->id?>">Edit</button><button class="btn btn-danger btn-sm" onclick="delete_lecturer({{$value->id}})">Delete</button></td>
							</tr>



							<!-- Modal -->
					<div class="modal fade" id="exampleModal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add Lecturer</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<label>Title</label>
									<select class="form-control" id="title-{{$value->id}}" name="title-{{$value->id}}">
										<option>Mr.</option>
										<option>Mrs.</option>
									</select>
									<label>First name</label>
									<input type="text" name="firstname-{{$value->id}}" id="firstname-{{$value->id}}" class="form-control" value="{{$value->firstname}}">
									<label>Last name</label>
									<input type="text" name="lastname-{{$value->id}}" id="lastname-{{$value->id}}" class="form-control" value="{{$value->lastname}}">
									<label>Full Name</label>
									<input type="text" name="fullname-{{$value->id}}" id="fullname-{{$value->id}}" class="form-control" value="{{$value->fullname}}">
									<label>Email</label>
									<input type="email" name="email-{{$value->id}}" id="email-{{$value->id}}" class="form-control" value="{{$value->email}}">
									<label>Class</label>
									<select class="form-control" id="classname-{{$value->id}}" name="classname-{{$value->id}}">
										
										<option value="0">-</option>
										@if(!empty($classData))
										@foreach($classData as $k => $v)
											@if($v->id == $value->position_id )
													<option value="{{$v->id}}" selected>{{$v->position_name}}</option>

											@else
												<option value="{{$v->id}}">{{$v->position_name}}</option>
											@endif

										
										@endforeach




										@endif
									</select>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" onclick="edit_lecturer({{$value->id}})">Save changes</button>
								</div>
							</div>
						</div>
					</div>



							<?php $no = $no+1?>
							@endforeach
						</tbody>


					</table>
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
	
	function add_lecturer() {
		var title = document.getElementById('title').value;
		var firstname = document.getElementById('firstname').value;
		var lastname = document.getElementById('lastname').value;
		var fullname = document.getElementById('fullname').value;
		var email = document.getElementById('email').value;
		var classname = document.getElementById('classname').value;



		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({

			type:"POST",
			url:'../lecturer/lectureradd',
			dataType:'html',
			data:{
				title:title,
				firstname:firstname,
				lastname:lastname,
				fullname:fullname,
				email:email,
				classname:classname,

			},
			success:function($data){
				alert('Success');
				location.reload();
				
			}

		});


	}


	function edit_lecturer(id){

		var title = document.getElementById('title-'+id).value;
		var firstname = document.getElementById('firstname-'+id).value;
		var lastname = document.getElementById('lastname-'+id).value;
		var fullname = document.getElementById('fullname-'+id).value;
		var email = document.getElementById('email-'+id).value;
		var classname = document.getElementById('classname-'+id).value;





		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({

			type:"POST",
			url:'../lecturer/lectureredit',
			dataType:'html',
			data:{
				id:id,
				title:title,
				firstname:firstname,
				lastname:lastname,
				fullname:fullname,
				email:email,
				classname:classname,

			},
			success:function($data){
				alert('Success');
				location.reload();
				
			}

		});
	}



	function delete_lecturer(id){
		var answer = confirm('Do you confirm you want to delete this lecturer ?');

		if (answer) {
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({

				type:"POST",
				url:'../lecturer/lecturerdelete',
				dataType:'html',
				data:{
					id:id,

				},
				success:function($data){
					alert('Success');
					location.reload();
					
				}

			});
		}else{

			return false;
		}
	}


</script>