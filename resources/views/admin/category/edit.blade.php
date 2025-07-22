@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('admin/update-category/'.$category->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
     
                      @method('PUT');
     
                             {{-- <select name="category_id"><option>--select your category--</option>
                                   @foreach ($category as  $cate)
                                 
                                   <option value="{{$cate->id}}" {{$category->category_id == $cate->id ? 'selected':''}}>
                                    {{$cate->name}}
                                    </option>

                                   @endforeach
                               </select> --}}
                            
                           
                               @csrf
                               <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">name</label>
                                 <input type="text" name="name" class="form-control" value="{{$category->name}}">
                              </div>
                           
                              <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">slug</label>
                               <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                            </div>
                           
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Des</label>
                           
                               <textarea class="form-control" name="description" rows="4" placeholder="Your Description">{{$category->description}}</textarea>
                           
                            </div>
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Image</label>
                               <input type="file" name="image" class="form-control">
                            </div>
     
                            <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Des</label>
                         
                             <input type="text" name="meta_title" class="form-control"  value="{{$category->meta_title}}">
                          </div>
     
                          <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Des</label>
                         
                             <textarea class="form-control" name="meta_description" rows="4" placeholder="Your Description">{{$category->meta_description}}</textarea>
                         
                          </div>
                          <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Des</label>
                         
                             <textarea class="form-control" name="meta_keywords" rows="4" placeholder="Your Description">{{$category->meta_keywords}}</textarea>
                         
                          </div>
                          <div class="form-group">
                           
                            <label for="exampleInputCity1">Status</label> &nbsp;
                            <input type="checkbox"  name="status" {{$category->status == '1' ?'checked':''}} >
                          </div>
                               <button type="submit" class="btn btn-primary">Submit</button>
                             </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
