@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ url('admin/add-category') }}"  method="POST" enctype="multipart/form-data">
                     @csrf

                   

                  
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">name</label>
                            <input type="text" name="name" id="name" class="form-control">
                         </div>
                      
                         <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">slug</label>
                          <input type="text" name="slug" id="slug" class="form-control">
                       </div>
                      
                       <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Des</label>
                      
                          <textarea class="form-control" name="description" rows="4" placeholder="Your Description"></textarea>
                      
                       </div>
                       <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Image</label>
                          <input type="file" name="image" class="form-control">
                       </div>

                       <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Meta Tile</label>
                    
                        <input type="text" name="meta_title" class="form-control">
                     </div>

                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Des</label>
                    
                        <textarea class="form-control" name="meta_description" rows="4" placeholder="Your Description"></textarea>
                    
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Keyword</label>
                    
                        <textarea class="form-control" name="meta_keyword" rows="4" placeholder="Your Description"></textarea>
                    
                     </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
