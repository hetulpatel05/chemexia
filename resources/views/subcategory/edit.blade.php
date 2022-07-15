@extends('layout.master')

@section('breadcrumb')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<!-- <h1 class="m-0">Add User</h1> -->
			</div><!-- /.col -->
			<div class="col-sm-6">       
      </div> <!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="col-md-12">	
	<form action="{{ route('subcategory-update',['id'=>$subcategory->id])}}" method="POST" enctype="multipart/form-data">
		@csrf
		{{ method_field('PATCH') }}
		@include('subcategory.form')
	</form>
	
</div>
</div>

@endsection
@include('layout.script')
<script type="text/javascript">

</script>