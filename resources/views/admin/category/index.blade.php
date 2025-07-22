@extends('layouts.admin')
{{-- @section('title','blog dashbord') --}}
            
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a href="{{url('admin/add-category')}}">{{ __('add cat') }}</a></div>

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="col-md-12">

                           
                        <tr><th>name</th>
                            
                            {{-- <th>Category</th> --}}
                            
                            <th>slug</th>
                            <th>description</th><th>Delete</th><th>edit</th></tr>
                  
                         @foreach ($category as $item)


                            <tr><td>{{ $item->name }}</td>
                                {{-- {{-- <td>{{ $item->category->name }}</td>  --}}

                                <td>{{ $item->slug }}</td><td>{{ $item->description }}</td>
                                <td><img src="{{ asset('assets/uploads/category/'.$item->image) }}" width="40px" height="40px"> </td>

                                <td><a href="{{ url('admin/delete-category',$item->id) }}" class="btn btn-danger">Delete</a></td>

                                <td><a href="{{ url('admin/edit-category',$item->id) }}" class="btn btn-success">edit</a></td>
                                    </tr>
                                  
                                        @endforeach  
                                         {{-- @php('update-category')
                                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                         @endphp --}}
                                    
                                        {{-- @php('delete-category')
                                            <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                                        @endphp  --}}
                                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
