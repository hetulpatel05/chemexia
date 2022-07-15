@extends('layout.master')



@section('breadcrumb')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0">Sales Material</h1>

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

        <!-- <h3 class="card-title">All Users</h3> -->

      </div>



      <div class="col-md-2">
      </div>
    </div>
  </div>

  <!-- /.card-header -->

  <!-- form start -->

  <div class="card-body">  

   <table id="tblsales" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>UserName</th>
        <th>Material</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Brand</th>
        <th>Packing type</th>
      </tr>

    </thead>

    <tbody>      

      @foreach($sellmaterial as $value)

      <tr>

        <td>
          @if($value->name==''||$value->name==null)
           ---
           @else
           {{$value->name}}
           @endif
        </td>
        <td>{{$value->material_name}}</td>
        <td>{{$value->price}}</td>
        <td>{{$value->quantity}}</td>
        <td>{{ $value->description }}</td>
        <td>{{ $value->brand }}</td>
        <td>{{ $value->packing_type }}</td>     

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
    $("#tblsales").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pagination":true,
      "destroy":true,
    });
  })

</script>
@endsection