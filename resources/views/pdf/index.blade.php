@extends('layout.master')

@section('breadcrumb')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0">Manage Pdf's</h1>

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
        <a href="{{url('newpdf')}}" class="btn btn-block btn-outline-primary">Add Pdf</a>
      </div>
    </div>
  </div>

  <!-- /.card-header -->

  <!-- form start -->

  <div class="card-body">   

   <table id="tblpdf" class="table table-bordered table-striped">

    <thead>
      <tr>
        <th>Pdf File</th>        
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($allpdf as $value)
      <tr>
        <td>
          @if($value->pdf_file==''||$value->pdf_file==null)
           ---
           @else
           <!-- {{$value->pdf_path}} -->
           <img src="{{asset('upload/pdf/default.png')}}" style="width: 10%; height: 5%;">
           @endif
        </td>
        <td>          
          <a href="{{ url('delete-pdf/'.$value['id']) }}" class="btn btn-sm btn-outline-danger">Delete</a>
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
    $("#tblpdf").DataTable({
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