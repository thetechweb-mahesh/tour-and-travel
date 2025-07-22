@extends('layouts.admin')


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
                                <h4 class="card-title">Add Destination</h4>
                              
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
                            <div class="container-fluid">
                                <div class="row page-titles mx-0">
                                   
                          
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                                </div>
                    
                                <div class="row">
                                    <div class="basic-form">
                                        <form class="forms-sample" action="{{url('admin/add-destination')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                   <!-- List Group for Vertical Tabs -->
                                                   <div class="list-group" id="productTabs" role="tablist">
                                                    <a href="#info" id="info-tab" class="list-group-item list-group-item-action active" data-bs-toggle="list" role="tab" aria-controls="info" aria-selected="true">Info</a>
                                                    {{-- <a href="#banner" id="banner-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="banner" aria-selected="false">Banner</a> --}}
                                                    <a href="#meta" id="meta-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="meta" aria-selected="false">Meta</a>
                                                    {{-- <a href="#extra" id="extra-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="extra" aria-selected="false">Extra</a> --}}
                                                    {{-- <a href="#faq" id="faq-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="faq" aria-selected="false">FAQ</a> --}}
                                                    {{-- <a href="#howto" id="howto-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="howto" aria-selected="false">How to do it</a> --}}
                                                </div>
                                                </div>
                                    
                                                <!-- Tab Content -->
                                                <div class="col-md-9">
                                                    <div class="tab-content mt-3" id="productTabsContent">
                                                        <!-- Info Tab -->
                                                        <select name="category_id" class="tab-content">
    
                                                          <option value="">choose category</option> 
                                                          @foreach ($category as $cate)
                                                          <option value="{{$cate->id}}"> {{$cate->name}}</option>
                                                          @endforeach          
    
                                                        </select>
                                                      
                                                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                                          
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="title">Title</label>
                                                                        <input type="text" class="form-control" name="name" id="name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="slug">Slug</label>
                                                                        <input type="text" class="form-control" name="slug" id="slug" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                       <!-- Featured Image -->
                                                            <div class="form-group">
                                                                <label for="featured_image">Featured Image</label>
                                                                <input type="file" class="form-control" name="image" id="image">
                                                            </div>
                            
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <!-- Product in this page -->
                                                            <div class="form-group">
                                                                <label for="product_in_page">Price</label>
                                                                <input type="text" class="form-control" name="average_price" id="average_price">
                                                                {{-- <select class="form-control" name="product_in_page" id="product_in_page">
                                                                    <option value="No">No</option>
                                                                    <option value="Yes">Yes</option>
                                                                </select> --}}
                                                            </div>
                            
                                                                    </div>
                                                                </div>
                                                            </div>
    {{--                                                         
                                                            <div class="form-group">
                                                                <label for="subtitle">Subtitle</label>
                                                                <input type="text" class="form-control" name="subtitle" id="subtitle">
                                                            </div> --}}
                                                          
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea class="ckeditor form-control" name="description" id="description" rows="5"></textarea>
                                                         
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputCity1">Navbar Status</label>
                                                                <input type="checkbox"  name="navbar_status"  >
                                                                &nbsp;
                                                                <label for="exampleInputCity1">Status</label> &nbsp;
                                                                <input type="checkbox"  name="status"  >
                                                              </div>
                                                   
                                                    </div>
                            
                                    
                                                        <!-- Banner Tab -->
                                                        {{-- <div class="tab-pane fade" id="banner" role="tabpanel" aria-labelledby="banner-tab">
                                                          
                                                          
                                                            <div class="form-group">
                                                                <label for="banner_subtitle">Banner Subtitle</label>
                                                                <textarea class="form-control font-style ckeditor" rows="2" cols="40" name="extra[banner]" style="visibility: hidden; display: none;"></textarea> 
                                                            
                                                            </div>
                                                       
                                                    </div> --}}
                                    
                                                        <!-- Meta Tab -->
                                                        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
                                                            <div class="row">   <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="meta_title">Meta Title</label>
                                                                    <input type="text" class="form-control" name="meta_title" id="meta_title">
                                                                </div> </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="meta_keyword">Meta key</label>
                                                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                                                                    </div> </div>
                                                            </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="meta_description">Meta Description</label>
                                                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="5"></textarea>
                                                                </div>
                                                          
                                                        </div>
                                                        
                                                        <!-- Extra Tab -->
                                                        {{-- <div class="tab-pane fade" id="extra" role="tabpanel" aria-labelledby="extra-tab">
                                                          
                                                            <div class="form-group">
                                                                <label for="extra_content">Extra Content</label>
                                                                <textarea class="form-control" id="css"  name="extra[css]" rows="5" placeholder="css"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                              
                                                                <textarea class="form-control" id="js"  name="extra[js]" rows="5" placeholder="js"></textarea>
                                                            </div>
                                                      
                                                    </div> --}}
                                    
                                                     
                                                   
                                                  <!-- FAQ Tab -->
                    {{-- <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                        <div id="dynamic_faq">
                            <div class="row align-items-end">
                                <div class="form-group col-md-4">
                                    <label for="faq[0][0]">Question</label>
                                    <input class="form-control" name="faq[0][0]" type="text" placeholder="FAQ Question 1">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="faq[0][1]">Answer</label>
                                    <textarea class="form-control" name="faq[0][1]" placeholder="FAQ Answer 1"></textarea>
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-success" type="button" id="addmorefaq">Add more</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                                
                                    
                                                      <!-- How to Do It Tab -->
                                                      {{-- <div class="tab-pane fade" id="howto" role="tabpanel" aria-labelledby="howto-tab">
                                                           
                                                            
                                                        <div id="dynamic_howto">
                        
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="extra[title]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Title of the procedure</font></font></label>
                                                                    <input class="form-control font-style" name="extra[howtotitle]" type="text" >
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label for="extra[estimatedCost]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estimated cost</font></font></label>
                                                                    <input class="form-control font-style" name="extra[estimatedCost]" type="text" >
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label for="extra[totalTime]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estimated time</font></font></label>
                                                                    <input class="form-control font-style" name="extra[totalTime]" type="text" value="" id="extra[totalTime]">
                                                                </div>
                                                            </div>
                            
                                                            <div class="mb-3">
                                                                <label for="extra[howtodetails]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Procedure details</font></font></label>
                                                                <textarea class="form-control font-style" rows="2" cols="40" name="extra[howtodetails]" id="extra[howtodetails]"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="extra[tools]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tools</font></font></label>
                                                                <textarea class="form-control font-style" rows="2" cols="40" name="extra[tools]" id="extra[tools]"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="extra[supplies]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Supplies</font></font></label>
                                                                <textarea class="form-control font-style" rows="2" cols="40" name="extra[supplies]" id="extra[supplies]"></textarea>
                                                            </div>
                                                            <div class="form-row align-items-end">
                            
                                                                <div class="form-group col-md-3 order-1">
                                                                    <label for="extra[howto][0][que]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Question</font></font></label>
                                                                    <input class="form-control font-style" name="extra[howto][0][que]" type="text" id="extra[howto][0][que]">
                                                                </div>
                                                              
                                                                <div class="form-group col-md-2 order-5">
                                                                    <button class="btn btn-success" type="button" name="add" id="addmorehowto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add an additional section</font></font></button>
                                                                </div>
                            
                                                            </div>
                                                        </div>
                                                  
                                                </div> --}}
                                                    </div>
                                    
                                            
                                                     <!-- Submit Buttons -->
                                                     <div class="form-group mt-4">
                                                        <button type="submit" class="btn btn-primary">Create</button>
                                                        <button type="submit" name="continue" class="btn btn-success">Create and continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                    
                    
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
