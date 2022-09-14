@extends('admin.adminTheme')
@section('content')     
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Form Elements</h3>
        </div>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Design <small>different form elements</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form method="post" action="{{route('product.add')}}" id="" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                @csrf
        
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="category_id" required>
                        <option value="" style="text-align: center;">  ------- Select Category ------</option>
                        @if(!empty($categories))
                        @foreach($categories as $category)
                          <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach  
                        @endif
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Product Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="product-name" name="product_name" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>                  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-price">Product Price <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="product-price" name="product_price" class="form-control col-md-7 col-xs-12" required> 
                  </div>
                </div> 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-image">Image<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="product-image" name="product_image" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div> 
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="submit" class="btn btn-success" value="Submit">
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection        
