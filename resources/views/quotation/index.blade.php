@extends('layout.master')



@section('breadcrumb')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0">Manage Quatation</h1>

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

   <table id="tblquote" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>FullName</th>

        <th>Product</th>

        <th>Description</th>

        <th>Quantity</th>

        <th>Amount</th>

        <th>Action</th>

      </tr>

    </thead>

    <tbody>      

      @foreach($quote as $value)

      <tr>

        <td>
          @if($value->name==''||$value->name==null)
           ---
           @else
           {{$value->name}}
           @endif
        </td>

        <td>{{$value->product_name}}</td>

        <td>{{$value->product_desc}}</td>

        <td>{{$value->quantity}}</td>

        <td>{{ $value->amount }}</td>

        <td>
          <!-- <a href="{{ route('edit-user',['id'=>$value['id']]) }}" class="btn btn-sm btn-outline-primary">Edit</a> -->
          @if($value->status==0)
          <a href="{{ route('approve-quote',['id'=>$value['id']]) }}" class="btn btn-sm btn-outline-success" title="Click to Approve">Approve</a>
          @else
          <a href="{{ route('approve-quote',['id'=>$value['id']]) }}" class="btn btn-sm btn-outline-danger" title="Set as Reject">Reject</a>
          @endif          
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
    $("#tblquote").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pagination":true,
      "destroy":true,
    });
  })

</script>
@endsection