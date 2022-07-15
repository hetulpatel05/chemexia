@extends('layout.master')

@section('breadcrumb')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<!-- <h1 class="m-0">Add User</h1> -->
			</div><!-- /.col -->
			<div class="col-sm-6">
        <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
      </ol> -->
  </div> <!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="col-md-12">
	
		
		
		<form action="{{ route('subcategory-save')}}" enctype="multipart/form-data" method="POST">
			@csrf
			@include('subcategory.form')
		</form>





	
</div>
</div>

@endsection
@include('layout.script')
<script type="text/javascript">

</script>