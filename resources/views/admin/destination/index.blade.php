@extends('layouts.admin')
{{-- @section('title','blog dashbord') --}}
            
@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                

                <div class="col-xxl-8 order-2 order-lg-1">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
                            <div>
                                <h4 class="card-title">Recent Order</h4>
                                <p class="text-muted fw-semibold mb-0">Order Based on Payment</p>
                            </div>

                            <div class="">
                                <a class="btn btn-outline-secondary me-2">
                                    <i class="mdi mdi-filter-outline pe-1 lh-1"></i>Filter
                                </a>
                                <a class="btn btn-outline-primary">
                                    See All
                                </a>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead >
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>slug</th>
                                        
                                            <th>Status</th>
                                           
                                            <th>Action</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                 <tbody>
                                  @foreach ($destination as $item)
                                  <tr>
                                    
                                        
                                   
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->slug}}</td>
                                   
                                    <td>
                                       <form class="forms-sample" data-id="{{ $item->id }}">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id }}">
                                      <input type="hidden" name="status" id="status-{{ $item->id }}" value="{{ $item->status }}">
                      
                                      <label class="toggle-switch">
                                          <input type="checkbox" id="toggle-{{ $item->id }}" class="toggle-input"
                                              {{ $item->status == '1' ? 'checked' : '' }}
                                              onchange="updateStatus({{ $item->id }}, this.checked)">
                                          <span class="toggle-slider"></span>
                                      </label>
                                      <label for="toggle-{{ $item->id }}" class="toggle-label">
                                          {{ $item->status == '1' ? 'Active' : 'Inactive' }}
                                      </label>
                                  </form>
                                </td>
                                
                                <td><span><a class="btn btn-success" href='{{url('/admin/pages/edit', $item->id)}}'>edit</a></span> <span>
                                    <form action="{{ url('admin/pages', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    
                      
                                        
                                  </span></td>
                                  
                                  <td>  
                                    <button type="submit" class="btn btn-primary">View</button>
                                    </td>
                                  </tr> @endforeach
                                 </tbody>
                                    
                                      
                                  </table>
                                <!-- end table -->
                            </div>
                        </div>
                    </div>
                </div><!-- end col-->
            </div>
   
            
           
            <!-- end row -->
        </div>
        <!-- end container -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>document.write(new Date().getFullYear())</script>2025 © Techmin - Theme by <b>Techzaa</b>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
    <!-- content -->
</div>

@endsection

<style>
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }
  
    .toggle-switch input {
        display: none;
    }
  
    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }
  
    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 15px;
        width: 15px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
  
    input:checked + .toggle-slider {
        background-color: #2196F3;
    }
  
    input:checked + .toggle-slider:before {
        transform: translateX(20px);
    }
  
    .toggle-label {
        display: inline-block;
        margin-left: 10px;
    }
  </style>
      
     <!-- Include Bootstrap JS -->


      <!-- End custom js for this page -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  
      <script>
  
  document.querySelectorAll('.item').forEach(function(item) {
      if (item.getAttribute('status') == 0) {
        item.style.display = 'none';  // Hide inactive products
      }
  });
  
        function updateStatus(id, isChecked) {
            let status = isChecked ? 1 : 0;
    
            $.ajax({
                type: "POST",
                url: '{{ url("/pages/updatestatus") }}',  // Correct route
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        // Update the hidden input value
                        $('#status-' + id).val(status);
    
                        // Update the label text dynamically
                        let label = $('#toggle-' + id).next('.toggle-label');
                        label.text(status === 1 ? 'Active' : 'Inactive');
                    } else {
                        alert('Failed to update status: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    
        window.updateStatus = updateStatus;
    </script>