@extends('layouts.admin')
@section('title','view Users')

@section('content')

<div class="content-page">
  <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class=".card-title">{{__('Settings')}}</h4>
                          @if(session('message'))
            <div class="alert  alert-success">{{session('message')}}
            </div>
            @endif
                      </div>
                      <div class="card-body">
                        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Website name</label>
                       <input type="text" class="form-control" name="website_name"  required  @if($setting) value="{{$setting->website_name}}" @endif placeholder="Website name">
                    
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Website logo</label>
                        <input type="file" class="form-control" name="website_logo" >
                        @if($setting)
                        <img src="{{asset('uploads/settings/'.$setting->logo)}}"  width="50px" height="50px" alt="image">
                        @endif
                      </div>
                    
                      <div class="form-group">
                          <label for="exampleInputEmail3">Website Favicon</label>
                          <input type="file" class="form-control" name="website_favicon" >
                                @if($setting)
                        <img src="{{asset('uploads/settings/'.$setting->favicon)}}" width="50px" height="50px" alt="">
                        @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">description</label>
                          <textarea class="form-control" name="description"  required rows="4">
                          @if($setting){{$setting->description}}@endif </textarea>
                    
                        </div>
                    
                       <h4>SEO Meta Tag</h4>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Meta title</label>
                        <input type="text" class="form-control" name="meta_title"   @if($setting)value="{{$setting->meta_title}}"@endif required placeholder="Meta title">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputEmail3">Meta description</label>
                        <textarea class="form-control" name="meta_description"  rows="4">
                        @if($setting){{$setting->meta_description}}@endif </textarea>
                    
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputEmail3">Meta keyword</label>
                    
                        <textarea class="form-control" name="meta_keyword"  rows="4">
                         @if($setting){{$setting->meta_keyword}}@endif </textarea>
                    
                      </div>
                    
                    
                      <button type="submit"  class="btn btn-primary mr-2">Submit</button>
                    
                    
                        </form>
                    
                    
                                        </div>
                  </div>

              </div> <!-- end col-->
          </div>
          <!-- end row -->

      </div> <!-- container -->

  </div> <!-- content -->



</div>
@endsection
