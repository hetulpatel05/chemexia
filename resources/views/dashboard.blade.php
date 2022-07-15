@extends('layout.master')



@section('breadcrumb')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <!-- <h1 class="m-0">Manage User</h1> -->

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



<div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box shadow-none">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{$totaluser}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box shadow-sm">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Quatations</span>
                <span class="info-box-number">{{$totalquote}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
        <form action="{{url('upload_data')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="file" name="myfile">
          <input type="submit" name="btn_submit">
        </form>
          <!-- /.col -->
        </div>
@endsection
