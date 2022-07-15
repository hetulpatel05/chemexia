<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> {{ isset($pdf)?'Edit Pdf':'Add Pdf' }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->    
    <div class="card-body">
        <div class="row">            
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Pdf File</label>&nbsp;&nbsp;
                    <input type="file" name="file_pdf" accept=".pdf">
                    @error('file_pdf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">{{ isset($user)?'Update':'Save' }}</button>            
                </div>    
            </div>
        </div>

        @if(session()->has('status'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> {{ session()->get('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
</div>

</div>
<!-- /.card-body -->
</div>
</div>
