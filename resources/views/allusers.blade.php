@extends('layout.master')

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Manage User</h1>
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
  <div class="card">
   <div class="card-header">
    <div class="row">                       
      <div class="col-md-10">
        <h3 class="card-title">All Users</h3>
      </div>

      <div class="col-md-2">
        <!-- <a href="{{url('NewRecord')}}" class="btn btn-block btn-outline-primary">Add Record</a> -->
      </div>

    </div>

  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <div class="card-body">
   <table id="tblusers" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>FullName</th>
        <th>GSTNo</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>      
      @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->gstno}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{ date('d-m-Y', strtotime($user->created_at))}}</td>
        <td>#</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</div>
</div>

@endsection
@include('layout.script')
<script type="text/javascript">
  $(document).ready(function(){    

    $("#tblusers").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pagination":true,
      "destroy":true,

    });


  })
</script>