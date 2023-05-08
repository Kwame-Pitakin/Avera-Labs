@extends('content.pages.tests.testslayout')

@section('title', 'Laboratory Details')


@section('content')
    @include('content._partials.stylesScripts.labDetailsStylesScript')

    <style>
        .tooltip-help {
            cursor: help;
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <br>
        <!-- User Pills -->

        <!--/ User Pills -->
        <div class="row gy-4">
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded my-4" src="{{ asset($labDetails->lab_logo_path) }}"
                                    height="310" width="310" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4>{{ $labDetails->lab_name }} Labs</h4>
                                    <span class="badge bg-label-secondary"><span style="font-weight:700">Date Joined:
                                        </span> {{ $labDetails->created_at->isoFormat('MMM Do YYYY') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap  py-3">

                            <div class="d-flex align-items-start me-4  gap-3">
                                <p>
                                    {{ $labDetails->lab_description }}
                                </p>
                            </div>

                        </div>
                        <h5 class="pb-2 border-bottom mb-4">About</h5>
                        <div class="info-container">
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bx bx-user">
                                    </i><span class="fw-semibold mx-2">Laboratory Name:</span>
                                    <span>{{ $labDetails->lab_name }} Labs</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bx bx-check"></i><span class="fw-semibold mx-2">Status:</span>

                                    @if ($labDetails->lab_status == 1)
                                        <span style="padding: 3px; border-radius:4px" class="bg-label-success">Active</span>
                                    @elseif($labDetails->lab_status == 2)
                                        <span style="padding: 3px; border-radius:4px"
                                            class="bg-label-warning">Pending</span>
                                    @elseif($labDetails->lab_status == 3)
                                        <span style="padding: 3px; border-radius:4px"
                                            class="bg-label-secondary">Inactive</span>
                                    @endif

                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bx bx-map"></i><span class="fw-semibold mx-2">Location:</span>
                                    <span>{{ $labDetails->lab_address }}</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span>
                                    <span>Ghana</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bx bx-detail"></i><span class="fw-semibold mx-2">Service Languages:</span>
                                    <span>English</span>
                                </li>




                            </ul>
                            <div class="d-flex justify-content-center pt-3">
                                <a href="{{ route('laboratories.edit', $labDetails->id) }}"
                                    class="btn btn-primary text-nowrap me-3">
                                    <i class="bx bx-edit"></i> Edit Lab Detaiils
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <span class="badge bg-label-primary">Standard</span>
                            <div class="d-flex justify-content-center">
                                <sup class="h5 pricing-currency mt-3 mt-sm-4 mb-0 me-1 text-primary">$</sup>
                                <h1 class="display-3 fw-normal mb-0 text-primary">99</h1>
                                <sub class="fs-6 pricing-duration mt-auto mb-4">/month</sub>
                            </div>
                        </div>
                        <ul class="ps-3 g-2 mb-3">
                            <li class="mb-2">10 Users</li>
                            <li class="mb-2">Up to 10 GB storage</li>
                            <li>Basic Support</li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="mb-0">Days</h6>
                            <h6 class="mb-0">65% Completed</h6>
                        </div>
                        <div class="progress mb-1" style="height: 8px">
                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span>4 days remaining</span>
                        <div class="d-grid w-100 mt-3 pt-2">
                            <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                Upgrade Plan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div  x-data="{ tab: 'Tests' }" class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a :class="{ 'active': tab === 'Tests' }" x-on:click.prevent="tab = 'Tests'" href="#" class="nav-link "><i class="menu-icon bx bx-test-tube"></i>Tests</a>
                    </li>
                    <li class="nav-item">
                      <a :class="{ 'active': tab === 'combo' }" x-on:click.prevent="tab = 'combo'" href="#" class="nav-link"  ><i class="bx bx-user  me-1"></i>Combo</a
                      >
                    </li>
                    <li class="nav-item">
                      <a :class="{ 'active': tab === 'stuff' }" x-on:click.prevent="tab = 'stuff'" href="#" class="nav-link"  ><i class="bx bx-detail me-1"></i>Stuff</a
                      >
                    </li>
                    <li class="nav-item">
                      <a :class="{ 'active': tab === 'Notifications' }" x-on:click.prevent="tab = 'Notifications'" href="#" class="nav-link" 
                        ><i class="bx bx-bell me-1"></i>Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a :class="{ 'active': tab === 'Connections' }" x-on:click.prevent="tab = 'Connections'" href="#" class="nav-link"
                        ><i class="bx bx-link-alt me-1"></i>Connections</a
                      >
                    </li>
                  </ul>
                <!-- Lab Tests -->
             
                    <div  x-show="tab === 'Tests'"  class="card mb-4">
                    
                        <div class="row  card-header">
                            <div class="col-6"> 
                               
                                <h5 class=""> Showing all &nbsp; {{ $labDetails->lab_name }} Tests</h5>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('labtest.create', $labDetails->id) }}" class="btn btn-primary"style="float:right;">
                                    <span >
                                        <i class="bx bx-plus me-md-2"></i><span class="d-md-inline-block d-none">
                                            Add Test</span>
                                    </span>
                                </a>
                            
                            </div>
                        </div>
    
                        <div class="table-responsive mb-3">
                            <table class="table datatable-project border-top">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Test Name</th>
                                        <th>Cost</th>
                                        <th class="w-px-200">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labDetails->tests as $test)
                                        <tr>
    
                                            <td>{{ $test->id }}</td>
                                            <td>{{ $test->test_name }}</td>
                                            <td>{{ $test->pivot->test_price }}</td>
    
                                            @foreach ($labtests as $labtest)
                                            @endforeach
                                            @if ($labtest->lab_test_status == 1)
                                                <td><span style="padding: 3px; border-radius:4px"
                                                        class="bg-label-success">Active</span>
                                                </td>
                                            @elseif($labtest->lab_test_status == 2)
                                                <td><span style="padding: 3px; border-radius:4px"
                                                        class="bg-label-warning">Pending</span></td>
                                            @elseif($labtest->lab_test_status)
                                                <td><span style="padding: 3px; border-radius:4px"
                                                        class="bg-label-secondary">Inactive</span></td>
                                            @endif
    
    
                                            <td>
                                                <div class="d-inline-block text-nowrap">
                                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalCenter">
                                                    </button> --}}
                                                    <a href="#" id="edit-item" class="btn btn-sm btn-icon "
                                                        data-bs-toggle="modal" data-bs-target="#modalCenter"><i
                                                            class="bx bx-edit"></i>
                                                        </a> &nbsp; &nbsp;&nbsp;
                                                    <a class="btn btn-sm btn-icon" href="javascript:void(0);"> 
                                                        <i class="bx bx-trash"></i></a>
    
    
                                                </div>
    
                                            </td>
                                        </tr>
                                    @endforeach
    
    
                                </tbody>
                            </table>
                        </div>
                    </div>
    
    
                  
                
              
            <!-- Combo-->
                <div x-show="tab === 'combo'">
                    <div class="row">
    
                        <div style="margin-top:10px">
    
                            <span class=""
                                style="font-weight: 800; float:left;margin-bottom:20px !important;text-align:center;padding-top:5px">Lab
                                Combos</span>
    
    
    
                            <a href="{{ route('testcombo.create', $labDetails->id) }}" class="btn btn-primary"
                                style="float: right;margin-bottom:20px">Make New Combo</a>
    
                        </div>
    
                        {{-- @php
                            dd($comboDetails);
                        @endphp --}}
                        @foreach ($labDetails->testCombos as $comboDetails)
                            <div class="col-lg-12 col-xl-6">
    
                                <div class="card card-action mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                {{-- <div class="avatar avatar-sm me-2">
                                                    <img src="../assets/img/icons/brands/react-label.png" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div> --}}
                                                <div class="me-2 text-body span mb-0" style="color: #237381 !important;font-weight:800">
                                                    {{ $comboDetails->combo_name }}
                                                </div>
                                            </a>
                                            <div class="ms-auto">
                                                <ul class="list-inline mb-0 d-flex align-items-center">
                                                    <li class="list-inline-item me-0">
                                                        <a href="javascript:;" class="me-1">
                                                            <span class=" badge bg-label-danger tooltip-help"
                                                                data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                                data-bs-placement="top" data-bs-html="true"
                                                                title="The turnaround time in working days, once your sample is recieved by lab">{{ $comboDetails->turn_around_time }}
                                                                &nbsp; TAT
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                            class="bx bx-show"></i>&nbsp; edit</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"> <i
                                                                            class="bx bx-trash"></i>&nbsp; Delete</a></li>
    
    
    
                                                            </ul>
                                                        </div>
    
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
    
                                        <div class="ms-auto mb-2">
                                            <div class=" ms-auto mb-2" style="font-weight:400;">Test For :</div>
    
                                            @foreach ($comboDetails->tests as $combotest)
                                                <a href="javascript:;" class="me-1 mr-3">
                                                    <span
                                                        class="badge bg-label-primary mb-1">{{ $combotest->test_name }}</span></a>
                                            @endforeach
                                        </div>
    
                                        <p>
                                            {{ $comboDetails->combo_description }}
    
                                        <div class="ms-auto">
                                            <x-combo-tags :comboTagsCsv="$comboDetails->combo_tags"/>
                                            {{-- <a href="javascript:;" class="me-1">
                                                <span class="badge bg-label-success ">
                                                    {{ $comboDetails->combo_category_id }}
                                                </span>
                                            </a> --}}
    
                                            <span class=" me-1 tooltip-help" style="float: right" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                title="This is the amount of time you have to wait from exposure to testing">
                                                <i class=" bx bx-calendar"></i>Accurate from <span
                                                    style="font-weight:600;">{{ $comboDetails->accurate_from }}
                                                    days</span>
                                            </span>
    
                                        </div>
    
                                        </p>
    
                                        <div class="d-flex align-items-center flex-wrap gap-1">
                                            <div class="d-flex align-items-center">
    
                                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                    @foreach ($comboDetails->combo_sample as $comboSample)
                                                        @if ($comboSample->id == 1)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Sweat"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/cotton-swab.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @elseif ($comboSample->id == 2)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Urine"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/dark-urine.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @elseif ($comboSample->id == 3)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Saliva"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/saliva.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @elseif ($comboSample->id == 4)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Swab"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/cotton-swab.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @elseif ($comboSample->id == 5)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Body Tissue"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/cotton-swab.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @elseif ($comboSample->id == 6)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Blood Sample"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/blood-test.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @elseif ($comboSample->id == 7)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" title="Feaces"
                                                                class="avatar avatar-sm pull-up">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/avatars/cotton-swab.png') }}"
                                                                    alt="Avatar" />
                                                            </li>
                                                        @endif
                                                    @endforeach
    
    
    
    
                                                    <li>
                                                        <small class="text-muted ms-1"> Required Sample</small>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:;" class="me-1">
                                                    <span class="badge bg-label-warning">GHC &nbsp;{{ $comboDetails->combo_price }}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        @endforeach
    
                        <!--/ Connections -->
    
                    </div>
                </div>


                {{-- Stuff --}}
                  <div x-show="tab === 'stuff'">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-header">Showing All User</h5>
            
                            </div>
            
                            <div class="col-lg-6 col-md-6 ">
                                <div class="mt-3">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasAddUser" aria-controls="offcanvasAddUser"
                                        style="float:right; margin-right:10px">
                                        <i class="bx bx-plus me-sm-2"></i> Add Stuff
                                        
                                    </button>
                                    {{-- off canvas content --}}
                                    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasAddUser"
                                        aria-labelledby="offcanvasAddUserLabel">
                                        <div class="offcanvas-header border-bottom">
                                            <h6 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h6>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body mx-0 flex-grow-0">
            
                                            <form id="formAuthentication" class="add-new-user pt-0" action="{{ route('labStuff.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{-- uploading profile image --}}

                                                <input type="text" name="works_at" readonly id="" value="{{ $labDetails->id }}" hidden >

                                                <div class="d-flexX align-items-start align-items-sm-center gap-4">
            
            
                                                    <img src="{{ asset('assets/img/avatars/avatar.jpeg') }}" alt="user-avatar"
                                                        class="d-block rounded" height="100" width="100" id="uploadedAvatar"
                                                        name="avatar" />
            
                                                    <br>
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                            <span class="d-none d-sm-block">Select Avatar</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input" hidden
                                                                accept="image/png, image/jpeg" name="avatar" required />
                                                        </label>
                                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Reset</span>
                                                        </button>
            
                                                        <p class="">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                                        <br>
                                                        @error('avatar')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
            
                                                </div>
                                                {{-- end uploading profile image --}}
                                                <div class="mb-3">
                                                    <label for="fullname" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="userFullname" name="userFullname"
                                                        placeholder="Enter your username" autofocus required
                                                        value="{{ old('userFullname') }}" />
                                                    @error('userFullname')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
            
                                                <div class="mb-3">
                                                  <label class="form-label" for="user-role">User Role</label>
            
                                                  <select id="user-role" class="select2 form-select" name="role">
                                                      <option value="">Select</option>
                                                      </option>
                                                      <option value="Front Desk" {{ old('role') === 'Front Desk' ? 'selected' : '' }}> Front Desk
                                                      </option>
                                                      <option value="Lab Technician" {{ old('role') === 'Lab Technician' ? 'selected' : '' }}> Lab Technician </option>
                                                      </option>
                                                  </select>
                                                  @error('role')
                                                      <p class="error">{{ $message }}</p>
                                                  @enderror
                                              </div>
            
                                                <div class="mb-3">
                                                    <label for="Email" class="form-label">User Email</label>
                                                    <input type="text" class="form-control" id="userEmail" name="userEmail"
                                                        placeholder="Enter your user email" required value="{{ old('userEmail') }}" />
                                                    @error('userEmail')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                              
                                              
                                                <div class="mb-3 ">
                                                  <label class="userContact" for="userContact">Contact Number</label>
                                                  <div class="input-group input-group-merge">
                                                      <span class="input-group-text">
                                                          <i class="fi fi-gh fis rounded-circle fs-3 me-1"></i> &nbsp
                                                          (+233)</span>
                                                      <input class="form-control mobile-number" type="number" id="userContact" name="userContact"
                                                          placeholder="202 555 0111" min="9" max="10" value="{{ old('userContact') }}" required />
                                                  </div>
                                                  @error('userContact')
                                                  <p class="error">{{ $message }}</p>
                                                  @enderror
                      
                                              </div>
            
                                                <div class="mb-3">
                                                  <label class="form-label" for="add-user-location">Location</label>
                                                  <input type="text" id="add-user-location" class="form-control"
                                                      placeholder="Enter Your Google Map Location" aria-label="User Location"
                                                      name="userLocation" value="{{ old('userLocation') }}" />
                                                      @error('userLocation')
                                                      <p class="error">{{ $message }}</p>
                                                      @enderror
                                              </div>
            
                                                <br><br>
                                                <button type="submit"
                                                    class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                                                <button type="reset" class="btn btn-label-secondary" style="float: right"
                                                    data-bs-dismiss="offcanvas">Cancel</button>
                                            </form>
                                        </div>
            
            
                                    </div>
                                </div>
                                
                            </div>
                            <table class="datatables-ajax  table table-bordered">
                                <thead>
        
                                    <tr>
                                        <!-- <th></th> -->
        
                                        <th>id</th>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
        
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($labDetails->labStuff as $stuff )

                                    
                                    <tr>
                                        <td>
                                            {{ $stuff->id}}
                                        </td>

                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="{{ asset($stuff->avatar) }}" alt="Avatar"
                                                            class="rounded-circle"
                                                            onerror="this.error=null;this.src='../assets/img/avatars/avatar.jpeg' ">
    
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column"><a href="#"
                                                        class="text-body text-truncate">
                                                        <span class="fw-semibold">
                                                            {{ $stuff->fullname }}
                                                        </span></a>
                                                    <small class="text-muted">{{ $stuff->email }}</small>
                                                </div>
                                            </div>
                                        </td>


                                    @if(!empty($stuff->getRoleNames()))
                                    
                                    @foreach($stuff->getRoleNames() as $stuffRole)

                               
                                   
                                    @if ($stuffRole == 'Front Desk')
                                        <td>
                                            <span
                                                class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i
                                                    class="bx bx-mobile-alt bx-xs"></i></span>
                                            
                                            {{ $stuffRole }}
                                        </td>
                                    @elseif ($stuffRole == 'Lab Technician')
                                        <td>
                                            <span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i
                                                class="bx bx-edit bx-xs"></i></span>
                                            {{ $stuffRole }}
                                        </td>
                                     
                                    @else
                                        
                                    <td>
                                        <span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"></span>
                                        Role Not Assigned
                                    </td>
                                    
                                    @endif

                                    @endforeach
                                    @endif

                                    <td>{{ $stuff->phone }}</td>
                                    @if ($stuff->status_id == 1)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-success">Active</span>
                                        </td>
                                    @elseif($stuff->status_id == 2)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-warning">Pending</span></td>
                                    @elseif($stuff->status_id == 3)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-secondary">Inactive</span></td>
                                    @endif


                                    <td>
                                        <div class="d-inline-block text-nowrap">
                                            <a href="#" class="btn btn-sm btn-icon"><i
                                                    class="bx bx-show"></i></a>
                                            {{-- <button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button> --}}
                                            <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end m-0">
                                                <a href="" class="dropdown-item">view</a>
                                                <a href="javascript:;" class="dropdown-item">Suspend</a>
                                            </div>

                                        </div>

                                    </td>
                                    </tr>
                                 
                                    @endforeach
                                    
                                   

                                </tbody>


                            </table>
                        </div>
                       
                      
                    </div>
                  </div>

            </div>

        </div>



    </div>


    <script>
        // Update/reset user image of account page
        let accountUserImage = document.getElementById('uploadedAvatar');
        const fileInput = document.querySelector('.account-file-input'),
            resetFileInput = document.querySelector('.account-image-reset');

        if (accountUserImage) {
            const resetImage = accountUserImage.src;
            fileInput.onchange = () => {
                if (fileInput.files[0]) {
                    accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                }
            };
            resetFileInput.onclick = () => {
                fileInput.value = '';
                accountUserImage.src = resetImage;
            };
        }
    </script> 

@endsection()
