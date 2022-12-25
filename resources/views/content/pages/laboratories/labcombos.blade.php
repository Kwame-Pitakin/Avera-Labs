@extends('content.pages.labs.labcomponents.LayoutLabCombo')

@section('content')

@include('content._partials.stylesScripts.labcombosStylesScript')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             



             @include('content.pages.labs.labcomponents.navbarpills')

              <!-- Project Cards -->
              <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-start">
                        <div class="d-flex align-items-start">
                          <div class="avatar me-3">
                            <img
                              src="../assets/img/icons/brands/social-label.png"
                              alt="Avatar"
                              class="rounded-circle"
                            />
                          </div>
                          <div class="me-2">
                            <h5 class="mb-1"><a href="javascript:;" class="h5 stretched-link" style="font-weight: 800">Combo Name</a></h5>
                            {{-- <div class="client-info d-flex align-items-center text-nowrap">
                              <h6 class="mb-0 me-1" style="font-weight: 800">Client:</h6>
                              <span>Christian Jimenez</span>
                            </div> --}}
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown zindex-2">
                            <button
                              type="button"
                              class="btn dropdown-toggle hide-arrow p-0"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="javascript:void(0);">Rename project</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                              <li>
                                <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item text-danger" href="javascript:void(0);">Leave Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <span class="badge bg-label-primary ms-auto" >Constituents</span>

                      <div class="d-flex align-items-center flex-wrap">
                        <div class=" p-2 rounded me-auto mb-3">
                          <ul class="align-items-center avatar-group mb-0 zindex-2">
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div>
                        {{-- <div class="text-end mb-3">
                          
                          <ul class="list-unstyled align-items-center avatar-group mb-0 zindex-2">
                            <li  class="  pull-up">hehhehhhe jjsjjjs</li>
                            <li  class="  pull-up">hhshhshhhs kkskkkkks</li>
                            <li  class="  pull-up">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div> --}}
                      </div> 
                      <p class="mb-0">brief description of combo brief description of combo brief description of combo brief description of combo</p>
                    </div>
                    <div class="card-body border-top">
                      <div class="d-flex align-items-center mb-3">
                        {{-- <h6 class="mb-1">All Hours: <span class="text-body fw-normal">380/244</span></h6> --}}
                        <div >
                          <span class="badge bg-label-primary ms-auto" >Cost</span>
                          <span class="badge bg-label-primary ms-auto" style="font-weight: 800">GH¢ 360</span>
                        </div>
                       
                      </div>
                      {{-- <div class="d-flex justify-content-between align-items-center mb-1">
                        <small>Task: 290/344</small>
                        <small>95% Completed</small>
                      </div> --}}
                      {{-- <div class="progress mb-3" style="height: 8px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 95%"
                          aria-valuenow="95"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                      </div>
                      </div> --}}
                      <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Blood sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Urine Sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Swap"
                              class="avatar avatar-sm pull-up me-2"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li><small>Sample Required</small></li>
                          </ul>
                        </div>
                        {{-- <div class="ms-auto">
                          <a href="javascript:void(0);" class="text-body"><i class="bx bx-chat"></i> 15</a>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-start">
                        <div class="d-flex align-items-start">
                          <div class="avatar me-3">
                            <img
                              src="../assets/img/icons/brands/social-label.png"
                              alt="Avatar"
                              class="rounded-circle"
                            />
                          </div>
                          <div class="me-2">
                            <h5 class="mb-1"><a href="javascript:;" class="h5 stretched-link" style="font-weight: 800">Combo Name</a></h5>
                            {{-- <div class="client-info d-flex align-items-center text-nowrap">
                              <h6 class="mb-0 me-1" style="font-weight: 800">Client:</h6>
                              <span>Christian Jimenez</span>
                            </div> --}}
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown zindex-2">
                            <button
                              type="button"
                              class="btn dropdown-toggle hide-arrow p-0"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="javascript:void(0);">Rename project</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                              <li>
                                <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item text-danger" href="javascript:void(0);">Leave Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <span class="badge bg-label-primary ms-auto" >Constituents</span>

                      <div class="d-flex align-items-center flex-wrap">
                        <div class=" p-2 rounded me-auto mb-3">
                          <ul class="align-items-center avatar-group mb-0 zindex-2">
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div>
                        {{-- <div class="text-end mb-3">
                          
                          <ul class="list-unstyled align-items-center avatar-group mb-0 zindex-2">
                            <li  class="  pull-up">hehhehhhe jjsjjjs</li>
                            <li  class="  pull-up">hhshhshhhs kkskkkkks</li>
                            <li  class="  pull-up">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div> --}}
                      </div> 
                      <p class="mb-0">brief description of combo brief description of combo brief description of combo brief description of combo</p>
                    </div>
                    <div class="card-body border-top">
                      <div class="d-flex align-items-center mb-3">
                        {{-- <h6 class="mb-1">All Hours: <span class="text-body fw-normal">380/244</span></h6> --}}
                        <div >
                          <span class="badge bg-label-primary ms-auto" >Cost</span>
                          <span class="badge bg-label-primary ms-auto" style="font-weight: 800">GH¢ 360</span>
                        </div>
                       
                      </div>
                      {{-- <div class="d-flex justify-content-between align-items-center mb-1">
                        <small>Task: 290/344</small>
                        <small>95% Completed</small>
                      </div> --}}
                      {{-- <div class="progress mb-3" style="height: 8px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 95%"
                          aria-valuenow="95"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                      </div>
                      </div> --}}
                      <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Blood sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Urine Sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Swap"
                              class="avatar avatar-sm pull-up me-2"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li><small>Sample Required</small></li>
                          </ul>
                        </div>
                        {{-- <div class="ms-auto">
                          <a href="javascript:void(0);" class="text-body"><i class="bx bx-chat"></i> 15</a>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-start">
                        <div class="d-flex align-items-start">
                          <div class="avatar me-3">
                            <img
                              src="../assets/img/icons/brands/social-label.png"
                              alt="Avatar"
                              class="rounded-circle"
                            />
                          </div>
                          <div class="me-2">
                            <h5 class="mb-1"><a href="javascript:;" class="h5 stretched-link" style="font-weight: 800">Combo Name</a></h5>
                            {{-- <div class="client-info d-flex align-items-center text-nowrap">
                              <h6 class="mb-0 me-1" style="font-weight: 800">Client:</h6>
                              <span>Christian Jimenez</span>
                            </div> --}}
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown zindex-2">
                            <button
                              type="button"
                              class="btn dropdown-toggle hide-arrow p-0"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="javascript:void(0);">Rename project</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                              <li>
                                <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item text-danger" href="javascript:void(0);">Leave Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <span class="badge bg-label-primary ms-auto" >Constituents</span>

                      <div class="d-flex align-items-center flex-wrap">
                        <div class=" p-2 rounded me-auto mb-3">
                          <ul class="align-items-center avatar-group mb-0 zindex-2">
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div>
                        {{-- <div class="text-end mb-3">
                          
                          <ul class="list-unstyled align-items-center avatar-group mb-0 zindex-2">
                            <li  class="  pull-up">hehhehhhe jjsjjjs</li>
                            <li  class="  pull-up">hhshhshhhs kkskkkkks</li>
                            <li  class="  pull-up">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div> --}}
                      </div> 
                      <p class="mb-0">brief description of combo brief description of combo brief description of combo brief description of combo</p>
                    </div>
                    <div class="card-body border-top">
                      <div class="d-flex align-items-center mb-3">
                        {{-- <h6 class="mb-1">All Hours: <span class="text-body fw-normal">380/244</span></h6> --}}
                        <div >
                          <span class="badge bg-label-primary ms-auto" >Cost</span>
                          <span class="badge bg-label-primary ms-auto" style="font-weight: 800">GH¢ 360</span>
                        </div>
                       
                      </div>
                      {{-- <div class="d-flex justify-content-between align-items-center mb-1">
                        <small>Task: 290/344</small>
                        <small>95% Completed</small>
                      </div> --}}
                      {{-- <div class="progress mb-3" style="height: 8px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 95%"
                          aria-valuenow="95"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                      </div>
                      </div> --}}
                      <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Blood sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Urine Sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Swap"
                              class="avatar avatar-sm pull-up me-2"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li><small>Sample Required</small></li>
                          </ul>
                        </div>
                        {{-- <div class="ms-auto">
                          <a href="javascript:void(0);" class="text-body"><i class="bx bx-chat"></i> 15</a>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-start">
                        <div class="d-flex align-items-start">
                          <div class="avatar me-3">
                            <img
                              src="../assets/img/icons/brands/social-label.png"
                              alt="Avatar"
                              class="rounded-circle"
                            />
                          </div>
                          <div class="me-2">
                            <h5 class="mb-1"><a href="javascript:;" class="h5 stretched-link" style="font-weight: 800">Combo Name</a></h5>
                            {{-- <div class="client-info d-flex align-items-center text-nowrap">
                              <h6 class="mb-0 me-1" style="font-weight: 800">Client:</h6>
                              <span>Christian Jimenez</span>
                            </div> --}}
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown zindex-2">
                            <button
                              type="button"
                              class="btn dropdown-toggle hide-arrow p-0"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="javascript:void(0);">Rename project</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                              <li>
                                <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item text-danger" href="javascript:void(0);">Leave Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <span class="badge bg-label-primary ms-auto" >Constituents</span>

                      <div class="d-flex align-items-center flex-wrap">
                        <div class=" p-2 rounded me-auto mb-3">
                          <ul class="align-items-center avatar-group mb-0 zindex-2">
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                            <li  class=" ">hehhehhhe jjsjjjs</li>
                            <li  class=" ">hhshhshhhs kkskkkkks</li>
                            <li  class=" ">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div>
                        {{-- <div class="text-end mb-3">
                          
                          <ul class="list-unstyled align-items-center avatar-group mb-0 zindex-2">
                            <li  class="  pull-up">hehhehhhe jjsjjjs</li>
                            <li  class="  pull-up">hhshhshhhs kkskkkkks</li>
                            <li  class="  pull-up">jjjsjjjsjjsj jjsjjjjs</li>
                          </ul>
                        </div> --}}
                      </div> 
                      <p class="mb-0">brief description of combo brief description of combo brief description of combo brief description of combo</p>
                    </div>
                    <div class="card-body border-top">
                      <div class="d-flex align-items-center mb-3">
                        {{-- <h6 class="mb-1">All Hours: <span class="text-body fw-normal">380/244</span></h6> --}}
                        <div >
                          <span class="badge bg-label-primary ms-auto" >Cost</span>
                          <span class="badge bg-label-primary ms-auto" style="font-weight: 800">GH¢ 360</span>
                        </div>
                       
                      </div>
                      {{-- <div class="d-flex justify-content-between align-items-center mb-1">
                        <small>Task: 290/344</small>
                        <small>95% Completed</small>
                      </div> --}}
                      {{-- <div class="progress mb-3" style="height: 8px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 95%"
                          aria-valuenow="95"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                      </div>
                      </div> --}}
                      <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Blood sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Urine Sample"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Swap"
                              class="avatar avatar-sm pull-up me-2"
                            >
                              <img class="rounded-circle" src="../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li><small>Sample Required</small></li>
                          </ul>
                        </div>
                        {{-- <div class="ms-auto">
                          <a href="javascript:void(0);" class="text-body"><i class="bx bx-chat"></i> 15</a>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
              <!--/ Project Cards -->
            </div>
            <!-- / Content -->


          </div>
          <!-- Content wrapper -->






@endsection