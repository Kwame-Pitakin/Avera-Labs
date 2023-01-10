@extends('layouts.masterlayout')
@section('title', 'Edit Profile')

@section('content')
    <style>
        .blabel {
            font-weight: 700;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .mb-3 {
            margin-bottom: 1.18rem !important;
        }
    </style>


    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-md-12">

                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>
                        <!-- Account -->
                        <div class="card-body">
                          <form id="formAccountSettings" method="POST" action="{{ route('user.updateProfile',Auth::user()->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset( Auth::user()->avatar)  }}" onerror="this.onerror=null;this.src='/assets/img/avatars/1.png';" alt="user-avatar" class="d-block rounded" height="100"
                                    width="100" id="uploadedAvatar" name="avatar"/>
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden
                                            accept="image/png, image/jpeg" name="avatar" />
                                    </label>
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    @error('avatar')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                           
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                      <label for="fullname" class="form-label blabel ">Edit Name</label>
                                      <input type="text" id="fullname" name="fullname" class="form-control"
                                          value="{{ Auth::user()->fullname }}" />
                                      @error('fullname')
                                          <p class="error">{{ $message }}</p>
                                      @enderror
                                  </div>
                                
                                  <div class="mb-3 col-md-6">
                                      <label for="phone" class="form-label blabel">Edit Phone</label>
                                      <div class="input-group input-group-merge">
                                          <span class="input-group-text">
                                              <i class="fi fi-gh fis rounded-circle fs-3 me-1"></i> &nbsp
                                              (+233)</span>
                                          <input class="form-control mobile-number" type="text" id="phone"
                                              name="phone" placeholder="202 555 0111"
                                              value="{{ Auth::user()->phone  }}" />
                                      </div>
                                      @error('phone')
                                          <p class="error">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-6">
                                      <label for="agent_address" class="form-label blabel">Google Maps Location
                                          address</label>
                                      <input class="form-control" type="text" id="agent_address" name="agent_address"
                                          placeholder="Enter  google maps location"
                                          value="{{ Auth::user()->user_location }}" />
                                          @error('agent_address')
                                          <p class="error">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-6">
                                      {{-- <label for="GPS" class="form-label blabel">Edit GPS Location</label> --}}
                                      <div class="row">
                                
                                          <div class="mb-3 col-md-6">
                                              <label for="agent_Ghanapost_gps" class="form-label blabel">Edit Ghana Post
                                                  GPS
                                              </label>
                                              <input class="form-control" type="text" id="agent_Ghanapost_gps"
                                                  name="agent_Ghanapost_gps" placeholder="Enter  google maps location"
                                                  value="{{ Auth::user()->user_Ghanapost_gps }}" />
                                                  @error('agent_Ghanapost_gps')
                                                  <p class="error">{{ $message }}</p>
                                              @enderror
                                          </div>

                                      </div>
                                  </div>
                                


                              </div>
                              <div class="mt-1">
                                <span> <button type="submit" class="btn btn-primary me-sm-3 me-1">Save
                                        Changes</button></span>
                                <span style="float: right">
                                    <a href="{{ route('user.show', Auth::user()->id) }}"
                                        class="btn btn-label-secondary">Cancel Edit</a>
                                </span>

                            </div>
                            </form>
                        </div>
                        <!-- /Account -->
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
@endsection
