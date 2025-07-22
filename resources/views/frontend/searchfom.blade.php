<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ftco-search d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Tour</a>

                                {{-- <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a> --}}

                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                            
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                   
                                    {{-- <form action="{{ url('/api/search') }}" method="POST" class="search-property-1"> --}}
                                        <form action="{{ url('/hotel') }}" method="GET" class="search-property-1">

                                        <div class="row no-gutters">
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="destination">Destination</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-search"></span></div>
                                                        <input type="text" name="destination" id="destination" class="form-control" placeholder="Search place" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4">
                                                    <label for="checkin_date">Check-in date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="checkin_date" id="checkin_date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4">
                                                    <label for="checkout_date">Check-out date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="checkout_date" id="checkout_date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group p-4">
                                                    <label for="price_limit">Price Limit</label>
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                            <select name="price_limit" id="price_limit" class="form-control">
                                                                {{-- @foreach ($search as $sea)
                                                                <option value="{{$sea->price_limit}}">{{$sea->price_limit}}</option>
                                                                @endforeach --}}
                                                                <option value="8000">$100</option>
                                                                <option value="10000">$10,000</option>
                                                                <option value="50000">$50,000</option>
                                                                <option value="100000">$100,000</option>
                                                                <option value="200000">$200,000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="results" class="mt-4">
                                        <!-- Search results will be displayed here -->
                                    </div>
                                
                                </div>

                                {{-- <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                                    <form action="#" class="search-property-1">
                                        <div class="row no-gutters">
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="#">Destination</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-search"></span></div>
                                                        <input type="text" class="form-control" placeholder="Search place">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Check-in date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="text" class="form-control checkin_date" placeholder="Check In Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Check-out date</label>
                                                    <div class="form-field">
                                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                                        <input type="text" class="form-control checkout_date" placeholder="Check Out Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="#">Price Limit</label>
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                            <select name="" id="" class="form-control">
                                                                <option value="">$100</option>
                                                                <option value="">$10,000</option>
                                                                <option value="">$50,000</option>
                                                                <option value="">$100,000</option>
                                                                <option value="">$200,000</option>
                                                                <option value="">$300,000</option>
                                                                <option value="">$400,000</option>
                                                                <option value="">$500,000</option>
                                                                <option value="">$600,000</option>
                                                                <option value="">$700,000</option>
                                                                <option value="">$800,000</option>
                                                                <option value="">$900,000</option>
                                                                <option value="">$1,000,000</option>
                                                                <option value="">$2,000,000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary p-0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div id="searchResults"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    