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

              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr class="headings">
        
                      <th class="column-title">Sr.No </th>
                      <th class="column-title">Product Name</th>
                      <th class="column-title">Category Name</th>
                      <th class="column-title">Product Price</th>
                      <th class="column-title">Product Image</th>
                      <th class="column-title">Extra Detail</th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </th>
                     
                    </tr>
                  </thead>
                  <tbody>           
                        @forelse($products as $product)
                            <tr class="even pointer">    
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$product['name']}}</td>
                                <td>
                                    @if($product['category_id'])
                                        {{$products[$loop->index]->category->name}}
                                    @else
                                        No Parent product
                                    @endif
                                </td>
                                <td>{{$product['price']}}</td>    
                                <td><img src='{{asset("uploads/images/" .$product['image'])}}' width="80px" height="80px"/></td>    
                                <td>
                                  <a href="{{route('extra.detail', $product['id'])}}"><button>Add</button></a>
                                </td>  
                                <td>
                                    <a href="{{route('product.edit', $product['id'])}}"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;  
                                    <a href="javascript:void(0)" class="delete-product" data-id="{{$product['id']}}"><i class="fa fa-trash"></i></a>    
                                </td>    
                            </tr>   
                        @empty
                            Please Add product
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
@endsection        
