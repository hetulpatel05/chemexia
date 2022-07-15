<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> {{ isset($user)?'Edit User':'Add User' }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->    
    <div class="card-body">
        <div class="row">            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Gstno</label>
                    <input type="text" min="0" @if(isset($user->gstno)) readonly @endif value="@if(isset($user->gstno)){{ $user->gstno }}@endif" class="form-control @error('txtgstno') is-invalid @enderror" name="txtgstno" placeholder="GstNo">                    
                    @error('txtgstno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>    
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">FullName</label>
                    <input type="text" value="@if(isset($user->name)){{ $user->name }}@endif" class="form-control  @error('txtname') is-invalid @enderror" name="txtname" placeholder="Enter FullName">
                    @error('txtname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">CompanyName</label>
                    <input type="text" value="@if(isset($user->company_name)){{ $user->company_name }}@endif" class="form-control @error('txtcmpname') is-invalid @enderror" name="txtcmpname" placeholder="Enter CompanyName">
                    @error('txtcmpname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" value="@if(isset($user->email)){{ $user->email }}@endif" class="form-control @error('txtemail') is-invalid @enderror" name="txtemail" placeholder="Enter email" @if(isset($user->email)) readonly @endif>
                    @error('txtemail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" value="@if(isset($user->phone)){{ $user->phone }}@endif" class="form-control @error('txtphone') is-invalid @enderror" name="txtphone" placeholder="Enter Contact Number">
                    @error('txtphone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" value="@if(isset($user->address)){{ $user->address }}@endif" min="0" class="form-control" name="txtaddress" placeholder="Enter the Address.">
            </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text" min="0" value="@if(isset($user->city)){{ $user->city }}@endif" class="form-control" name="txtcity" placeholder="Enter Ciy">
        </div>
    </div>
    <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">State</label>
            <input type="text" min="0" value="@if(isset($user->state)){{ $user->state }}@endif" class="form-control" name="txtstate" placeholder="Enter State">
        </div>
    </div>
    <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">ZipCode</label>
            <input type="number" min="0" value="@if(isset($user->zipcode)){{ $user->zipcode }}@endif" class="form-control" name="txtzipcode" placeholder="Enter Zipcode">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ isset($user)?'Update':'Save' }}</button>            
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

   <!--  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif -->


</div>

</div>
<!-- /.card-body -->
</div>
</div>
