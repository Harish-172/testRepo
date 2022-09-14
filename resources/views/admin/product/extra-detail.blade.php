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
              <form method="post" action="{{route('extra.detail.store', $id)}}" id="" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title" class="form-control col-md-7 col-xs-12" value="{{@$product['product_detail']['title']}}">
                  </div>
                </div>                  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total-items">Total Items <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="total-items" name="total_item" class="form-control col-md-7 col-xs-12" value="{{@$product['product_detail']['total_items']}}">
                  </div>
                </div> 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" id="description" name="description" class="form-control col-md-7 col-xs-12" rows="3" >{{@$product['product_detail']['description']}}</textarea>
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
