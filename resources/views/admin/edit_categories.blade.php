@extends('layouts.adminLayout.admin_design')
@section('content')
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Edit Categories</a> <a href="#" class="current">Edit Category</a> </div>
    <h1>Edit Categories</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/update-category/'.$category_details->id) }}" name="editCategory" id="editCategory" novalidate="novalidate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name" value="{{$category_details->name}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description">{{$category_details->description}}"   </textarea> 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{$category_details->url}}">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
      
    </div>
  </div>
</div>
<!-- <script src="{{ asset ('js/backend_js/jquery.min.js') }}"></script>  
        <script src="{{ asset ('js/backend_js/matrixform_validation.js') }}"></script> 
        <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>  -->
@endsection