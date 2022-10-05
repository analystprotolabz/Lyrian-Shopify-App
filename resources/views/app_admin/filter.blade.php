@extends('shopify-app::layouts.default')
@include('style')
@include('customstyle')
@section('content')
<div class="loader"><span><svg viewBox="0 0 32 32"><path d="M16 32c-4.274 0-8.292-1.664-11.314-4.686s-4.686-7.040-4.686-11.314c0-3.026 0.849-5.973 2.456-8.522 1.563-2.478 3.771-4.48 6.386-5.791l1.344 2.682c-2.126 1.065-3.922 2.693-5.192 4.708-1.305 2.069-1.994 4.462-1.994 6.922 0 7.168 5.832 13 13 13s13-5.832 13-13c0-2.459-0.69-4.853-1.994-6.922-1.271-2.015-3.066-3.643-5.192-4.708l1.344-2.682c2.615 1.31 4.824 3.313 6.386 5.791 1.607 2.549 2.456 5.495 2.456 8.522 0 4.274-1.664 8.292-4.686 11.314s-7.040 4.686-11.314 4.686z"></path></svg></span></div>
    <!-- You are: (shop domain name) -->
    @include('app_admin.navigation')
    <div class="container">
        <div class="first_wrap_section">
            <div class="row">
                <div class="col">
                    <p class="text-left">Filter options</p>

                </div>
                {{-- <div class="col">
                    <p class="text-right text_preview">Preview</p>
                </div> --}}
            </div>
        </div>
        <div class="main">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                          <div class="form-group has-search">
                            <span class="search_icons">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.347 14.1873L11.5085 10.3488C12.3392 9.31755 12.8262 8.02848 12.8262 6.62484C12.8262 3.35921 10.1335 0.666504 6.86785 0.666504C3.57358 0.666504 0.909515 3.35921 0.909515 6.62484C0.909515 9.91911 3.57358 12.5832 6.86785 12.5832C8.24285 12.5832 9.53191 12.1248 10.5632 11.2941L14.4017 15.1327C14.5163 15.2759 14.6882 15.3332 14.8887 15.3332C15.0606 15.3332 15.2324 15.2759 15.347 15.1327C15.6335 14.8748 15.6335 14.4452 15.347 14.1873ZM2.28452 6.62484C2.28452 4.104 4.31837 2.0415 6.86785 2.0415C9.38868 2.0415 11.4512 4.104 11.4512 6.62484C11.4512 9.17432 9.38868 11.2082 6.86785 11.2082C4.31837 11.2082 2.28452 9.17432 2.28452 6.62484Z" fill="#6D778A"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Search Filter">
                          </div>
                    </div>
                    <div class="col">
                        <p class="wrap-text-left">Showing <span id="filterCount">{{count($shopFilters)}}</span> Products Filter</p>
                    </div>
                    <div class="col">
                        <p class="wrap-text-right"><button type="button" class="btn btn-link">Reset all to Default</button></p>
                    </div>
                </div>

                <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Status</th>
                            <th>Filter Label</th>
                            <th>Type</th>
                            <th>Display Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- @php
                          echo'<pre>';
                          print_r($shopFilters);   
                          echo'</pre>';
                         @endphp --}}
                        <tbody id="shopFilters">
                         @foreach ($shopFilters as $filter)
                         <tr>
                          <td>
                            <label class="switch">
                                <input type="checkbox" data-fid="{{ $filter->filter_id }}" {{ $filter->option_status == 1 ? 'checked':'' }}>
                                <span class="slider round"></span>
                            </label>
                          </td>
                          <td>{{ $filter->option_label }}</td>
                          <td>{{ $filter->option_type }}</td>
                          <td>{{ $filter->option_display }}</td>
                          <td> 
                              <a href="#" class="wrap_delete" data-fid="{{ $filter->filter_id }}"><span class="delete">
                                  <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.7751 2.00016H8.48346V1.5835C8.48346 0.894251 7.9227 0.333496 7.23346 0.333496H5.56679C4.87755 0.333496 4.31679 0.894251 4.31679 1.5835V2.00016H2.02513C1.45075 2.00016 0.983459 2.46745 0.983459 3.04183V4.50016C0.983459 4.73027 1.17002 4.91683 1.40013 4.91683H1.62783L1.98781 12.4763C2.01961 13.1439 2.56804 13.6668 3.23638 13.6668H9.56388C10.2322 13.6668 10.7807 13.1439 10.8124 12.4763L11.1724 4.91683H11.4001C11.6302 4.91683 11.8168 4.73027 11.8168 4.50016V3.04183C11.8168 2.46745 11.3495 2.00016 10.7751 2.00016ZM5.15013 1.5835C5.15013 1.35376 5.33705 1.16683 5.56679 1.16683H7.23346C7.4632 1.16683 7.65013 1.35376 7.65013 1.5835V2.00016H5.15013V1.5835ZM1.81679 3.04183C1.81679 2.92696 1.91026 2.8335 2.02513 2.8335H10.7751C10.89 2.8335 10.9835 2.92696 10.9835 3.04183V4.0835C10.855 4.0835 2.3489 4.0835 1.81679 4.0835V3.04183ZM9.98005 12.4366C9.96945 12.6592 9.78664 12.8335 9.56388 12.8335H3.23638C3.01359 12.8335 2.83078 12.6592 2.8202 12.4366L2.46211 4.91683H10.3381L9.98005 12.4366Z" fill="#1C2B4B"/>
                                  </svg>
                              </span> </a>
                              <a href="#" class="wrap_edit" data-fid="{{ $filter->filter_id }}">
                                  <span class="edit">
                                      <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M10.3608 7.46663C10.1545 7.46663 9.99412 7.64997 9.99412 7.8333V10.4C9.99412 10.8125 9.65037 11.1333 9.26079 11.1333H1.92745C1.51495 11.1333 1.19412 10.8125 1.19412 10.4V3.06663C1.19412 2.67705 1.51495 2.3333 1.92745 2.3333H4.49412C4.67745 2.3333 4.86079 2.17288 4.86079 1.96663C4.86079 1.7833 4.67745 1.59997 4.49412 1.59997H1.92745C1.10245 1.59997 0.460785 2.26455 0.460785 3.06663V10.4C0.460785 11.225 1.10245 11.8666 1.92745 11.8666H9.26079C10.0629 11.8666 10.7275 11.225 10.7275 10.4V7.8333C10.7275 7.64997 10.5441 7.46663 10.3608 7.46663ZM11.8504 1.11872L11.2087 0.477051C11.0025 0.247884 10.7275 0.133301 10.4295 0.133301C10.1545 0.133301 9.87954 0.247884 9.65037 0.477051L4.17329 5.95413C3.96704 6.16038 3.82954 6.41247 3.76079 6.71038L3.39412 8.61247C3.34828 8.7958 3.48579 8.9333 3.6462 8.9333C3.66912 8.9333 3.69204 8.9333 3.71495 8.9333L5.61704 8.56663C5.91495 8.49788 6.16704 8.36038 6.37329 8.15413L11.8504 2.67705C12.2858 2.24163 12.2858 1.53122 11.8504 1.11872ZM5.8462 7.62705C5.75454 7.74163 5.61704 7.81038 5.47954 7.8333L4.24204 8.08538L4.49412 6.84788C4.51704 6.71038 4.58578 6.57288 4.70037 6.48122L8.77954 2.37913L9.94829 3.54788L5.8462 7.62705ZM11.3462 2.14997L10.4525 3.04372L9.2837 1.87497L10.1775 0.981218C10.2691 0.889551 10.3837 0.866634 10.4295 0.866634C10.4983 0.866634 10.6129 0.889551 10.7045 0.981218L11.3462 1.62288C11.4379 1.71455 11.4608 1.82913 11.4608 1.89788C11.4608 1.94372 11.4379 2.0583 11.3462 2.14997Z" fill="#1C2B4B"/>
                                      </svg>
                                  </span>
                              </a>
                              </td>
                        </tr>
                         @endforeach
                        </tbody>
                      </table>

                      <div class="button_productoption">
                          <a href="#"><button type="button" class="btn btn-primary add_product-options" data-toggle="modal" data-target="#add_filter_option">+ Add More Filter Option</button></a>
                      </div>
                </div>
            </div>
          </div>
          </div>
    </div>


<!--******************add filter option modal start************************** -->  

 <div class="modal" id="add_filter_option">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title add_new-option">Add New Option</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="add_more-options" id="add_more-options" action="#">
              <div class="form-group">
                  <label for="option_type">Option Type</label>
                  <select class="form-control" id="option_type" name="option_type">
                    <option value="type">Type</option>
                    <option value="color">Color</option>
                    <option value="vendor">Vendor</option>
                    <option value="price">Price</option>
                    <option value="collection">Collection</option>
                  </select>
               </div>

               <div class="form-group">
                    <label for="option_label">Option Lable</label>
                    <input type="text" class="form-control" id="option_label" name="option_label" placeholder="Color Selection">
               </div>

               <div class="form-group">
                    <label for="option_display">Option Display</label>
                    <select class="form-control" id="option_display" name="option_display">
                      <option value="range">Range</option>
                      <option value="swatch">Swatch</option>
                      <option value="list">List</option>
                    </select>
               </div>

               <div class="form-group">
                    <label for="option_select">Option Select</label>
                    <input type="text" class="form-control" id="option_select" name="option_select" placeholder="Multiple">
               </div>

               <div class="submit_wraps">
                   <button type="button" class="btn btn-primary" id="addNewFilter">Add Filter Option</button>
               </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!--************************* add filter option modal end****************************** --> 


<!--************************edit filter option modal start********************************* -->  

 <div class="modal" id="edit_filter_option">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title add_new-option">Update Option</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="edit_more-options" action="#">
              <input type="hidden" value="" id="filterId">
              <div class="form-group">
                  <label for="option_type">Option Type</label>
                  <select class="form-control" id="option_type" name="option_type">
                    <option value="type">Type</option>
                    <option value="color">Color</option>
                    <option value="vendor">Vendor</option>
                    <option value="price">Price</option>
                    <option value="collection">Collection</option>
                  </select>
               </div>

               <div class="form-group">
                    <label for="option_label">Option Lable</label>
                    <input type="text" class="form-control" id="option_label" name="option_label" placeholder="Color Selection">
               </div>

               <div class="form-group">
                    <label for="option_display">Option Display</label>
                    <select class="form-control" id="option_display" name="option_display">
                      <option value="range">Range</option>
                      <option value="swatch">Swatch</option>
                      <option value="list">List</option>
                    </select>
               </div>

               <div class="form-group">
                    <label for="option_select">Option Select</label>
                    <input type="text" class="form-control" id="option_select" name="option_select" placeholder="Multiple">
               </div>

               <div class="submit_wraps">
                   <button type="button" class="btn btn-primary updatefilter">Update Filter</button>
               </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

<!--********************************************* edit filter option modal end****************************************** -->    
@endsection
@section('scripts')

    @parent

    {{-- <script>
        actions.TitleBar.create(app, { title: 'Filter' });
    </script> --}}
    @include('script')
    <script src="{{ asset('public/assets/js/filter.js') }}"></script>

@endsection

