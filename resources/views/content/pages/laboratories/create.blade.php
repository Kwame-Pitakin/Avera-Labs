@extends('layouts.masterlayout')

@section('title', 'Create Laboratory')

@section('content')
    <style>
        .blabel {
            font-weight: 700;
        }

        .error {
            color: red;
            font-size: 5px;
        }
                /* Chrome, Safari, Edge, Opera */
                input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <!-- Icons -->


    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <br>
            <br>
            <br>
            <!-- Multi Column with Form Separator -->
            <div class="card mb-4">
                <span class="card-header" style="font-weight:600;">Create New Laboratory</span>
                <form method="POST" action="{{ route('laboratories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="company-info" class="content">

                        <div class="row g-4" style="margin: 0rem 1rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="lab_name" class="form-label blabel ">Laboratory Name</label>
                                        <input type="text" id="lab_name" name="lab_name" class="form-control"
                                            placeholder="Eg: Avera Labs" value="{{ old('lab_name') }}" />
                                        @error('lab_name')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="lab_email" class="form-label blabel">Laboratory Email</label>
                                        <input class="form-control" type="email" id="lab_email" name="lab_email"
                                            placeholder="company@example.com" value="{{ old('lab_email') }}" />
                                        @error('lab_email')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="lab_phone" class="form-label blabel">Laboratory Tel</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <i class="fi fi-gh fis rounded-circle fs-3 me-1"></i> &nbsp
                                                (+233)</span>
                                            <input class="form-control mobile-number" type="number" id="lab_phone"
                                                name="lab_phone" placeholder="202 555 0111"
                                                value="{{ old('lab_phone') }}" />
                                        </div>
                                        @error('lab_phone')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="lab_address" class="form-label blabel">Google Maps Location
                                        </label>
                                        <input class="form-control" type="text" id="lab_address" name="lab_address"
                                            placeholder="Enter  google maps location" value="{{ old('lab_address') }}" />
                                            @error('lab_address')
                                            <p class="error">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="GPS" class="form-label blabel">GPS Location</label>
                                        <div class="row">
                                            <div class="mb-2 col-sm-6">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                      Latitude
                                                    </span>
                                                    <input type="number" step="any" id="latitude" name="latitude"
                                                        class="form-control" placeholder="Enter latitude Cordinates"
                                                        value="{{ old('latitude') }}" />
                                                </div>
                                                @error('latitude')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                            </div>

                                            <div class="mb-2 col-sm-6">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                      Longitude
                                                    </span>
                                                    <input type="number" step="any" id="longitude" name="longitude" class="form-control"
                                                    placeholder=" Enter longitude Cordinates"
                                                    value="{{ old('longitude') }}" />
                                                </div>
                                                @error('longitude')
                                                <p class="error">{{ $message }}</p>
                                            @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="lab_Ghanapost_gps" class="form-label blabel">Ghana Post GPS
                                        </label>
                                        <input class="form-control" type="text" id="lab_Ghanapost_gps" name="lab_Ghanapost_gps"
                                            placeholder="Enter  google maps location" value="{{ old('lab_Ghanapost_gps') }}" />

                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <div class="input-groupp">
                                            <label class="form-label blabel" for="inputGroupFile01">Upload Company
                                                Logo</label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                accept="image/*" name="lab_logo_path" value="{{ old('lab_logo_path') }}" />
                                            @error('lab_logo_path')
                                                <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-sm-6">
                                        <label for="exampleFormControlTextarea1" class="form-label blabel">Brief
                                            company description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="150" name="lab_description">
                                            {{ old('lab_description') }}
                                        </textarea>
                                        @error('lab_description')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- 
                            <div class="mb-3 col-12">
                                <label for="billingAddress" class="form-label">Billing Address</label>
                                <input type="text" class="form-control" id="billingAddress"
                                    name="billingAddress" placeholder="Billing Address" />
                            </div> --}}
                                    {{-- <div class="mb-3 col-sm-6">
                                <label for="state" class="form-label">State</label>
                                <input class="form-control" type="text" id="state" name="state"
                                    placeholder="California" />
                            </div> --}}
                                    {{-- <div class="mb-3 col-sm-6">
                                <label for="zipCode" class="form-label">Zip Code</label>
                                <input type="text" class="form-control zip-code" id="zipCode"
                                    name="zipCode" placeholder="231465" maxlength="6" />
                            </div> --}}
                                    {{-- <div class="mb-3 col-sm-6">
                                <div class="input-groupp">
                                    <label class="form-label blabel" for="inputGroupFile01">Upload Company
                                        Logo</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" />
                                </div>
                            </div> --}}

                                    {{-- 
                            <div class="mb-3 col-sm-6">
                                <label for="Logo" class="form-label blabel">Company logo</label>

                                <select id="country" class="form-select select2" name="country">
                                    <option selected>USA</option>
                                    <option>Canada</option>
                                    <option>UK</option>
                                    <option>Germany</option>
                                    <option>France</option>
                                </select>
                            </div> --}}
                                </div>
                                <div class="mt-1">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <a  href="{{ route('laboratories.index') }}" type="reset" class="btn btn-label-secondary" style="float: right">Cancel</a>
                                </div>
                </form>
            </div>

        </div>
        <!-- / Content -->



    </div>
    <!-- Content wrapper -->

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection
