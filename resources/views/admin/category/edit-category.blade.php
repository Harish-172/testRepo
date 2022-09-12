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
              <form method="post" action="{{route('category.update')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Category Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="category-name" required="required" name="category_name" value="{{$category->name}}" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Subcategory Of</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="category_id">
                        <option value="" @if($category->category_id) selected @endif>No Subcategory</option>
                        @if(!empty($categories))
                        @foreach($categories as $category)
                          <option value="{{$category['id']}}" @if($category->category_id) selected @endif>
                            {{$category['name']}}
                          </option>
                        @endforeach  
                        @endif
                      </select>
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
