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
			<h3>All Class</h3>
		</div>

	</div>

	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-10">
			<div class="x_panel">
				<div class="x_title">
					<h2>All Class List in ICS Abuja</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%" >
						<thead>
							<tr>
								<td>No</td>
								<td>Class Name</td>
								<td>Student Count</td>
								<td>Home room teacher</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;?>
							@if(!empty($data))
							@foreach($data as $key => $value)
							<tr>
								<td>{{$no}}</td>
								<td>{{$value->position_name}}</td>
								<td>{{$value->count}}</td>
								<td>
									<!-- teacher name after features complete -->
									{{$value->fullname}}

								</td>
								<td><button class="btn btn-primary" onclick="class_detail({{$value->id}})">Detail</button></td>
							</tr>
							<?php $no = $no +1;?>
							@endforeach
							@endif
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
    	
    		function class_detail(i){
    			console.log();
    			window.location.href = '../classes/classdetails?id='+i;
    		}

    </script>