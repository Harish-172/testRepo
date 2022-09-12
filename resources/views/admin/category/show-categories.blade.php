@extends('admin.adminTheme')
@section('content')  
<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Table design <small>Custom design</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

              <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title">Sr.No </th>
                      <th class="column-title">Category Name</th>
                      <th class="column-title">Parent Category Name</th>
                      <th class="column-title">Create Date</th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>                
                        @forelse($categories as $category)
                            <tr class="even pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$category['name']}}</td>
                                <td>
                                    @if($category['category_id'])
                                        {{$categories[$loop->index]->parent->name}}
                                    @else
                                        No Parent Category
                                    @endif
                                </td>
                                <td>{{$category['created_at']}}</td>    
                                <td>
                                    <a href="{{route('category.edit', $category['id'])}}"><i class="fa fa-edit"></i></a>    
                                    <a href=""><i class="fa fa-trash"></i></a>    
                                </td>    
                            </tr>   
                        @empty
                            Please Add category
                        @endforelse                        
                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- <table class="table">
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Category Name</th>
            <th>Parent Category Name</th>
            <th>Create Date</th>    
        </tr>    
    </thead>   
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$category['name']}}</td>
            <td>{{$category['category_id']}}</td>
            <td>{{$category['created_at']}}</td>    
        </tr>   
        @empty
            Please Add category
        @endforelse
    </tbody> 
</table>  --}}
@endsection        
