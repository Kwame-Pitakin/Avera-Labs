@extends('content.pages.tests.testslayout')
@section('title', 'All Users')


@section('content')

    @php
        $sn = 1;
    @endphp
    <style>
        .bs-toast {
            position: absolute;
            right: 0;
            z-index: 100;
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y" id="form-add-new-record">

        <br>
        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>

        <!-- Multilingual -->
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
                            <i class="bx bx-plus me-sm-2"></i>
                            <span class="d-none d-sm-inline-block">
                                Add New User
                            </span>
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

                                <form id="formAuthentication" class="add-new-user pt-0" action="{{ route('storeUsers') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- uploading profile image --}}
                                    <div class="d-flexX align-items-start align-items-sm-center gap-4">


                                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="user-avatar"
                                            class="d-block rounded" height="100" width="100" id="uploadedAvatar"
                                            name="avatar" />

                                        <br>
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload Avatar</span>
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

                                      <select id="user-role" class="select2 form-select" name="role_id">
                                          <option value="">Select</option>
                                          <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>Lab Agent
                                          </option>
                                          <option value="3" {{ old('role_id') == 3 ? 'selected' : '' }}>Front Desk
                                          </option>
                                          <option value="4" {{ old('role_id') == 4 ? 'selected' : '' }}>Lab
                                              Tecnichian</option>
                                          <option value="5" {{ old('role_id') == 5 ? 'selected' : '' }}>Patient
                                          </option>
                                      </select>
                                      @error('role_id')
                                          <p class="error">{{ $message }}</p>
                                      @enderror
                                  </div>

                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">userEmail</label>
                                        <input type="text" class="form-control" id="userEmail" name="userEmail"
                                            placeholder="Enter your userEmail" required value="{{ old('userEmail') }}" />
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
            </div>
            <div class="card-datatable table-responsive add-new-record pt-0 row g-2 text-nowrap">
                @unless(count($users) == 0)
                    <table class="datatables-ajax  table table-bordered">
                        <thead>

                            <tr>
                                <!-- <th></th> -->

                                <th>id</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td class="sorting_1">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3">
                                                    <img src="{{ asset($user->avatar) }}" alt="Avatar"
                                                        class="rounded-circle"
                                                        onerror="this.error=null;this.src='../assets/img/avatars/2.png' ">

                                                </div>
                                            </div>
                                            <div class="d-flex flex-column"><a href="{{ route('user.show',$user->id) }}"
                                                    class="text-body text-truncate">
                                                    <span class="fw-semibold">
                                                        {{ $user->fullname }}
                                                    </span></a>
                                                <small class="text-muted">{{ $user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- role --}}

            
                                    {{-- <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                           <span >{{ $v }}</span>
                                        @endforeach
                                      @endif
                                    </td> --}}

                                    @if(!empty($user->getRoleNames()))
                                    
                                    @foreach($user->getRoleNames() as $userRole)

                                    @if ($userRole == 'Super Admin')
                                        <td>
                                            <span
                                                class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i
                                                    class="bx bx-cog bx-xs"></i></span>
                                           
                                                     {{ $userRole }}
                                        </td>
                                    @elseif ($userRole == 'Lab Agent')
                                        <td>
                                            <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>
                                            
                                            {{ $userRole }}
                                        </td>
                                    @elseif ($userRole == 'Front Desk')
                                        <td>
                                            <span
                                                class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i
                                                    class="bx bx-mobile-alt bx-xs"></i></span>
                                            
                                            {{ $userRole }}
                                        </td>
                                    @elseif ($userRole == 'Lab Technician')
                                        <td>
                                            <span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i
                                                class="bx bx-edit bx-xs"></i></span>
                                            {{ $userRole }}
                                        </td>
                                    @elseif ($userRole == 'Lab Patient')
                                        <td>
                                            <span
                                            class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i
                                                class="bx bx-user bx-xs"></i></span>
                                            {{ $userRole }}
                                        </td>
                                    @endif

                                    @endforeach
                                    @endif


                                    {{-- end role --}}

                                    <td>{{ $user->phone }}</td>
                                    <td> {{ $user->user_location }}</td>




                                    @if ($user->status_id == 1)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-success">Active</span>
                                        </td>
                                    @elseif($user->status_id == 2)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-warning">Pending</span></td>
                                    @elseif($user->status_id == 3)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-secondary">Inactive</span></td>
                                    @endif
                                    <td>
                                        <div class="d-inline-block text-nowrap">
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-icon"><i
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
                @else
                    <h1> no listings available</h1>
                @endunless
            </div>
            {{-- <div style="margin: 0 2rem">
                {{ $user->links() }}
            </div> --}}
        </div>

        <!--/ Multilingual -->

    </div>


    {{-- <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script> --}}
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

@endsection
