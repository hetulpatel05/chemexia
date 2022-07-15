<div class="col-md-12">
  <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="card-title"> Subcategory</h3>            
            </div>
            <div class="col-md-2">
                <!-- <a href="#" class="btn btn-block btn-outline-primary">Add User</a>             -->
            </div>    
        </div>        
    </div>
    <!-- /.card-header -->
    <!-- form start -->    
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
               <div class="form-group">                             
                  <label>Category</label>
                  <select class="form-control select2 @error('txtcategoryid') is-invalid @enderror" name="txtcategoryid" style="width: 100%;">
                    <option value="">--Select Category--</option>                
                    @foreach($category as $key =>$cat)                   
                    <option value="{{ $cat['id'] }}" {{ ($cat['id']==isset($subcategory->category_id)) ? 'selected' : '' }} >{{ $cat['name'] }}</option>
                    @endforeach
                </select>
                @error('txtcategoryid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror               
            </div>
        </div>  

        <div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Name</label>
           <input type="text" class="form-control @error('txtsubcategoryname') is-invalid @enderror" name="txtsubcategoryname" value="@if(isset($subcategory->name)){{ $subcategory->name }}@endif" placeholder="Enter SubCategoryName">               
           @error('txtsubcategoryname')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Inquiry Details</label>
           <input type="text" class="form-control @error('txtinqdetails') is-invalid @enderror" name="txtinqdetails" value="@if(isset($subcategory->inqury_details)){{ $subcategory->inqury_details }}@endif" placeholder="Enter Inquiry Details">               
           @error('txtorderno')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-4">
         <div class="form-group">                
           <label for="exampleInputEmail1">Quantity</label>
           <input type="number" min="0" class="form-control @error('txtquantity') is-invalid @enderror" name="txtquantity" value="@if(isset($subcategory->quantity)){{ $subcategory->quantity }}@endif" placeholder="Enter Quantity">               
           @error('txtquantity')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-2">

               <div class="form-group">                
                  <label>Type</label>
                  <select class="form-control select2 @error('qty_type') is-invalid @enderror" name="qty_type" style="width: 100%;">                    
                    <option value="">--Select Type--</option>                
                    @foreach($qtytype as $key =>$val)                     
                    <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                    @endforeach
                </select>
                @error('qty_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror               
            </div>
        </div>

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Purpose</label>
           <input type="text" class="form-control @error('txtpurpose') is-invalid @enderror" name="txtpurpose" value="@if(isset($subcategory->purpose)){{ $subcategory->purpose }}@endif" placeholder="What's your Purpose">               
           @error('txtpurpose')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Delivery Place</label>
           <input type="text" class="form-control @error('txtdeliveryplace') is-invalid @enderror" name="txtdeliveryplace" value="@if(isset($subcategory->delivery_place)){{ $subcategory->delivery_place }}@endif" placeholder="Enter Delivery Place">               
           @error('txtdeliveryplace')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>
  

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Supplier Location</label>
           <input type="text" class="form-control @error('txtsupplierlocation') is-invalid @enderror" name="txtsupplierlocation" value="@if(isset($subcategory->supplier_location)){{ $subcategory->supplier_location }}@endif" placeholder="Supplier Location">               
           @error('txtsupplierlocation')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Buy Type</label>
           <input type="text" class="form-control @error('txtbuytype') is-invalid @enderror" name="txtbuytype" value="@if(isset($subcategory->need_of_buy)){{ $subcategory->need_of_buy }}@endif" placeholder="Urgent Delivery or Normal">               
           <small>Urgent or Normal Delivery</small>
           @error('txtbuytype')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Requirement Type</label>
           <input type="text" class="form-control @error('txtreqtype') is-invalid @enderror" name="txtreqtype" value="@if(isset($subcategory->requirement_type)){{ $subcategory->requirement_type }}@endif" placeholder="What's your requirement type">
           <small>Ex: Monthly or yearly</small>
           @error('txtreqtype')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>

<div class="col-md-6">
         <div class="form-group">                
           <label for="exampleInputEmail1">Requirement Frequency</label>
           <input type="text" class="form-control @error('txtreqfrequency') is-invalid @enderror" name="txtreqfrequency" value="@if(isset($subcategory->requirement_frequency)){{ $subcategory->requirement_frequency }}@endif" placeholder="What's your requirements frequency">
           <small>Ex: Monthly or bymonthly</small>
           @error('txtreqfrequency')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>


<div class="col-md-12">
 <div class="form-group">
    <label for="">Image</label>&nbsp;&nbsp;
    <input type="file" name="subcategoryimage">
    @error('subcategoryimage')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>

</div>
<div class="col-md-6">
    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">{{ isset($user)?'Update':'Save' }}</button>            
    </div>    
</div>

    <!-- @if ($errors->any())
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
