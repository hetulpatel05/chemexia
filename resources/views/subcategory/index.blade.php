@extends('layout.master')

@section('breadcrumb')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0">Manage SubCategory</h1>

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
        <a href="{{url('newsubcategory')}}" class="btn btn-block btn-outline-primary">Add SubCategory</a>
      </div>
    </div>



  </div>

  <!-- /.card-header -->

  <!-- form start -->

  <div class="card-body">   

   <table id="tblsubcategory" class="table table-bordered table-striped">

    <thead>
      <tr>
        <th>Category</th>
        <th>Name</th>
        <th>Image</th>
        <th>Inquiry</th>
        <th>quantity</th>
        <th>Frequency</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($subcategory as $subcat)
      <tr>
        <td>
          @if($subcat->categoryname==''||$subcat->categoryname==null)
           ---
           @else
           {{$subcat->categoryname}}
           @endif
        </td>
        <td>
          @if($subcat->name==''||$subcat->name==null)
           ---
           @else
           {{$subcat->name}}
           @endif
        </td>

        <td>
          @if($subcat->image==''||$subcat->image==null)
          ---
          @else
          <img src="{{$subcat->image_subcategory}}" alt="Category Image" style="max-height: 50%; max-width: 30%;">
          @endif          
        </td>
        <td>
          @if($subcat->inqury_details==''||$subcat->inqury_details==null)
           ---
           @else
           {{$subcat->inqury_details}}
           @endif
        </td>
         <td>
          @if($subcat->quantity==''||$subcat->quantity==null)
           ---
           @else
           {{$subcat->quantity}} {{$subcat->qty_type_name}}
           @endif
        </td>
        <td>
          @if($subcat->requirement_frequency==''||$subcat->requirement_frequency==null)
           ---
           @else
           {{$subcat->requirement_frequency}}
           @endif
        </td>
        <td>
          <a href="{{ route('edit-subcategory',['id'=>$subcat['id']]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <a href="{{ url('delete-subcategory/'.$subcat['id']) }}" class="btn btn-sm btn-outline-danger">Delete</a>
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
    $("#tblsubcategory").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pagination":true,
      "destroy":true,
      "aoColumns": [
      { sWidth: '15%' },
      { sWidth: '10%' },
      { sWidth: '20%' },
      { sWidth: '15%' },
      { sWidth: '10%' },
      { sWidth: '15%' },
      { sWidth: '30%' }
      ]
    });
  })

</script>
@endsection