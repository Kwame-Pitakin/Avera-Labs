@extends('content.pages.tests.testslayout')
@section('title', 'Edit Laboratory')

@section('content')
    <style>
        .blabel {
            font-weight: 700;
        }

        .error {
            color: red;
            font-size: 5px;
        }

        .mb-3 {
            margin-bottom: 1.18rem !important;
        }
    </style>


    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->

                <form method="POST" action="{{ route('laboratories.update', $laboratories->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset($laboratories->lab_logo_path) }}" alt="user-avatar" class="d-block  h-auto ms-0 ms-sm-4 rounded-3 user-profile-img""
                                height="100" width="100" id="uploadedAvatar" name="lab_logo_path" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new Logo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" name="lab_logo_path"
                                        value="" />
                                </label>

                                {{-- <button type="button" class="btn btn-label-secondary account-image-reset mb-4" 
                                onclick="document.getElementById('upload').value = null; return false;">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button> --}}

                                {{-- <p class="mb-0">{{ $laboratories->lab_logo_path }}</p> --}}
                                <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                @error('lab_logo_path')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-0" />
                    <div id="company-info" class="content">

                        <div class="row g-4" style="margin: 0rem 1rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="lab_name" class="form-label blabel ">Edit Laboratory Name</label>
                                        <input type="text" id="lab_name" name="lab_name" class="form-control"
                                            value="{{ $laboratories->lab_name }}" />
                                        @error('lab_name')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lab_email" class="form-label blabel">Edit Laboratory Email</label>
                                        <input class="form-control" type="email" id="lab_email" name="lab_email"
                                            value="{{ $laboratories->lab_email }}" />
                                        @error('lab_email')
                                            <p class="error ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lab_phone" class="form-label blabel">Edit Laboratory Tel</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <i class="fi fi-gh fis rounded-circle fs-3 me-1"></i> &nbsp
                                                (+233)</span>
                                            <input class="form-control mobile-number" type="text" id="lab_phone"
                                                name="lab_phone" placeholder="202 555 0111"
                                                value="{{ $laboratories->lab_phone }}" />
                                        </div>
                                        @error('lab_phone')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lab_address" class="form-label blabel">Google Maps Location
                                            address</label>
                                        <input class="form-control" type="text" id="lab_address" name="lab_address"
                                            placeholder="Enter  google maps location"
                                            value="{{ $laboratories->lab_address }}" />

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="GPS" class="form-label blabel">Edit GPS Location</label>
                                        <div class="row">


                                            <div class="mb-2 col-sm-6">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                        Latitude
                                                    </span>
                                                    <input type="text" id="latitude" name="latitude"
                                                        class="form-control" placeholder="Enter Logitude Cordinates"
                                                        value="{{ $laboratories->latitude }}" />
                                                </div>
                                                @error('latitude')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>



                                            <div class="mb-3 col-sm-6">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                        Longitude
                                                    </span>
                                                    <input type="text" id="longitude" name="longitude"
                                                        class="form-control" placeholder=" Enter longitude Cordinates"
                                                        value="{{ $laboratories->longitude }}" />
                                                </div>
                                                @error('longitude')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="lab_Ghanapost_gps" class="form-label blabel">Edit Ghana Post
                                                    GPS
                                                </label>
                                                <input class="form-control" type="text" id="lab_Ghanapost_gps"
                                                    name="lab_Ghanapost_gps" placeholder="Enter  google maps location"
                                                    value="{{ $laboratories->lab_Ghanapost_gps }}" />

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlTextarea1" class="form-label blabel">Edit Brief
                                            company description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="150"
                                            name="lab_description">
                                            {{ $laboratories->lab_description }}
                                        </textarea>
                                        @error('lab_description')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>
                                <br>
                                <div class="mt-1" style="float: right">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Save Changes</button>
                                    <a href="{{ route('laboratories.show', $laboratories->id) }}"
                                        class="btn btn-label-secondary">Cancel Edit</a>
                                </div>
                </form>

            </div>
        </div>
    </div>
    
@endsection
