@extends('layouts.admin')
{{-- @section('title','blog dashbord') --}}

@section('content')

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <div class="content-body" style="min-height: 788px;">

        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add apge</h4>

                    </div>
                </div>
      
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
            </div>

            <div class="row">
                <div class="basic-form">
                    <form action="{{ url('update-content', $content->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <!-- List Group for Vertical Tabs -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="list-group" id="pageTabs" role="tablist">
                                        <a href="#info" id="info-tab" class="list-group-item list-group-item-action active" data-bs-toggle="list" role="tab" aria-controls="info" aria-selected="true">Info</a>
                                        <a href="#banner" id="banner-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="banner" aria-selected="false">Banner</a>
                                        <a href="#meta" id="meta-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="meta" aria-selected="false">Meta</a>
                                        <a href="#extra" id="extra-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="extra" aria-selected="false">Extra</a>
                                        <a href="#faq" id="faq-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                                        <a href="#howto" id="howto-tab" class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" aria-controls="howto" aria-selected="false">How to do it</a>
                                    </div>
                                </div>
                
                                <!-- Tab Content -->
                                <div class="col-md-9">
                                    <div class="tab-content mt-3" id="pageTabsContent">
                                        <!-- Info Tab -->
                                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                          
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control" name="title" id="title" value="{{ $content->title }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="slug">Slug</label>
                                                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $content->slug }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           <!-- Featured Image -->
                                                <div class="form-group">
                                                    <label for="featured_image">Featured Image</label>
                                                    <input type="file" class="form-control" name="img" id="img">
                                                </div>
                
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <!-- Product in this page -->
                                                <div class="form-group">
                                                    <label for="product_in_page">Product in this page</label>
                                                    <select class="form-control" name="product_in_page" id="product_in_page">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="subtitle">Subtitle</label>
                                                    <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $content->subtitle }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="ckeditor form-control" name="details" id="details" rows="5">{{ $content->details }}</textarea>
                                                </div>
                                         
                                        </div>
                
                                        <!-- Banner Tab -->
                                        <div class="tab-pane fade" id="banner" role="tabpanel" aria-labelledby="banner-tab">
                                          
                                              
                                                <div class="form-group">
                                                    <label for="extra[banner]">Banner Subtitle</label>
                                                    <textarea class="form-control" name="extra[banner]" id="extra[banner]" rows="5">
                                                        {{ $content->extra['banner'] ?? '' }}
                                                    </textarea>
                                                  
                
                                                </div>
                                           
                                        </div>
                
                                        <!-- Meta Tab -->
                                        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
                                            <div class="row">   <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta[title]" id="meta[title]"   value="{{ $content->meta['title'] ?? '' }}">
                                                </div> </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="meta_title">Meta key</label>
                                                        <input type="text" class="form-control" name="meta[key]" id="meta[key]" value="{{ $content->meta['key'] ?? '' }}">
                                                    </div> </div>
                                            </div>
                                                
                                                <div class="form-group">
                                                    <label for="meta_description">Meta Description</label>
                                                    <textarea class="form-control" name="meta[description]" id="meta[description]" rows="5">{{ $content->meta['description'] ?? '' }}</textarea>
                                                </div>
                                          
                                        </div>
                
                                        <!-- Extra Tab -->
                                        <div class="tab-pane fade" id="extra" role="tabpanel" aria-labelledby="extra-tab">
                                          
                                                <div class="form-group">
                                                    <label for="extra_content">Extra Content</label>
                                                    <textarea class="form-control" id="css"  name="extra[css]" rows="5" placeholder="css">{{ $content->extra['css'] ?? '' }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                  
                                                    <textarea class="form-control" id="js"  name="extra[js]" rows="5" placeholder="js">{{ $content->extra['js'] ?? '' }}</textarea>
                                                </div>
                                          
                                        </div>
                
                                        <!-- FAQ Tab -->
                                        <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                           
                                            <div id="dynamic_faq">
                                                <div class="row align-items-end">
                                                    <div class="form-group col-md-4 order-1">
                                                        <label for="faq[0][0]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Question</font></font></label>
                                                        <input class="form-control font-style" name="faq[0][0]" type="text" id="faq[0][0]" value="{{ $content->faq}}">
                                                    </div>
                                                    <div class="form-group col-md-10 order-1">
                                                        <label for="faq[0][1]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Answer</font></font></label>
                                                        <textarea class="form-control font-style faqrow" cols="2" rows="2" name="faq[0][1]" id="faq[0][1]">{{ $content->faq}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-2 order-5">
                                                        <button class="btn btn-success" type="button" name="add" id="addmorefaq"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add more</font></font></button>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        </div>
                
                                        <!-- How to Do It Tab -->
                                        <div class="tab-pane fade" id="howto" role="tabpanel" aria-labelledby="howto-tab">
                                           
                                                {{-- <div class="form-group">
                                                    <label for="howto_content">How to Do It Content</label>
                                                    <textarea class="form-control" name="howto_content" id="howto_content" rows="5"></textarea>
                                                </div> --}}
                                                <div id="dynamic_howto">
                
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="extra[howtotitle]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Title of the procedure</font></font></label>
                                                            <input class="form-control font-style" name="extra[howtotitle]" type="text" value="" id="extra[howtotitle]" value="{{ $content->extra['howtotitle'] ?? '' }}">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="extra[estimatedCost]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estimated cost</font></font></label>
                                                            <input class="form-control font-style" name="extra[estimatedCost]" type="text" value="" id="extra[estimatedCost]" value="{{ $content->extra['estimatedCost'] ?? '' }}">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="extra[totalTime]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estimated time</font></font></label>
                                                            <input class="form-control font-style" name="extra[totalTime]" type="text"  id="extra[totalTime]" value="{{ $content->extra['totalTime'] ?? '' }}">
                                                        </div>
                                                    </div>
                    
                                                    <div class="mb-3">
                                                        <label for="extra[howtodetails]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Procedure details</font></font></label>
                                                        <textarea class="form-control font-style" rows="2" cols="40" name="extra[howtodetails]" id="extra[howtodetails]">{{ $content->extra['howtodetails'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="extra[tools]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tools</font></font></label>
                                                        <textarea class="form-control font-style" rows="2" cols="40" name="extra[tools]" id="extra[tools]">{{ $content->extra['tools'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="extra[supplies]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Supplies</font></font></label>
                                                        <textarea class="form-control font-style" rows="2" cols="40" name="extra[supplies]" id="extra[supplies]">{{ $content->extra['supplies'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="form-row align-items-end">
                    
                                                        <div class="form-group col-md-3 order-1">
                                                            <label for="extra[howto][0][que]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Question</font></font></label>
                                                            <input class="form-control font-style" name="extra[howto][0][que]" type="text" id="extra[howto][0][que]" >
                                                        </div>
                                                        {{-- <div class="form-group col-md order-1">
                                                            <label for="extra[howto][0][ans]" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Answer</font></font></label>
                                                           
                                                        </div> --}}
                                                        <div class="form-group col-md-2 order-5">
                                                            <button class="btn btn-success" type="button" name="add" id="addmorehowto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add an additional section</font></font></button>
                                                        </div>
                    
                                                    </div>
                                                </div>
                                          
                                        </div>
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
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script>
        document.getElementById('addmorefaq').addEventListener('click', function() {
            var faqContainer = document.getElementById('dynamic_faq');
            var faqIndex = faqContainer.querySelectorAll('.row').length; // Get the next index for FAQ
    
            var newRow = document.createElement('div');
            newRow.classList.add('row', 'align-items-end');
            newRow.innerHTML = `
                <div class="form-group col-md-4">
                    <label for="faq[${faqIndex}][0]">Question</label>
                    <input class="form-control" name="faq[${faqIndex}][0]" type="text" placeholder="FAQ ${faqIndex + 1}">
                </div>
                <div class="form-group col-md-8">
                    <label for="faq[${faqIndex}][1]">Answer</label>
                    <textarea class="form-control" name="faq[${faqIndex}][1]" placeholder="Answer FAQ ${faqIndex + 1}"></textarea>
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-danger" type="button" onclick="this.closest('.row').remove()">Remove</button>
                </div>
            `;
            faqContainer.appendChild(newRow);
        });
    </script>
    <script>
        document.getElementById('ckfinder-button').addEventListener('click', function() {
            CKFinder.popup({
                chooseFiles: true,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var fileUrl = file.getUrl();
                        document.getElementById('ckfinder-input').value = fileUrl; // Update the input field with the file URL
                    });
    
                    finder.on('file:choose:resizedImage', function(evt) {
                        var fileUrl = evt.data.resizedUrl;
                        document.getElementById('ckfinder-input').value = fileUrl; // Update the input field with the resized image URL
                    });
                }
            });
        });
    </script>
    
@endsection
