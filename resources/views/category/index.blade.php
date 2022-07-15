@extends('layout.master')

@section('breadcrumb')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0">Manage Category</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">


      </div> <!-- /.col -->

    </div><!-- /.row -->

  </div><!-- /.container-fluid -->

</div>

@endsection



@section('content')

<div class="col-md-12">

  <div class="card">

   <div class="card-header">

    <div class="row">
      <div class="col-md-10">
        <!-- <h3 class="card-title">Manage Category</h3> -->
      </div>
      <div class="col-md-2">
        <a href="{{url('newcategory')}}" class="btn btn-block btn-outline-primary">Add Category</a>
      </div>
    </div>



  </div>

  <!-- /.card-header -->

  <!-- form start -->

  <div class="card-body">   

   <table id="tblcategory" class="table table-bordered table-striped">

    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($category as $cat)
      <tr>
        <td>
          @if($cat->name==''||$cat->name==null)
           ---
           @else
           {{$cat->name}}
           @endif
        </td>

        <td>
          @if($cat->image==''||$cat->image==null)
          ---
          @else
          <img src="{{$cat->image_category}}" alt="Category Image" style="max-height: 50%; max-width: 30%;">
          @endif          
        </td>
        <td>
          <a href="{{ route('edit-category',['id'=>$cat['id']]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <a href="{{ url('delete-category/'.$cat['id']) }}" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>

      </tr>

      @endforeach   
    </tbody>

  </table>

</div>



</div>

</div>



@endsection

@section('script')

<script type="text/javascript">

  $(document).ready(function(){
    $("#tblcategory").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pagination":true,
      "destroy":true,
      "aoColumns": [
      { sWidth: '20%' },
      { sWidth: '40%' },
      { sWidth: '40%' }
      ]
    });
  })

</script>
@endsection