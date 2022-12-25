@extends('layouts.masterlayout')


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
                <form method="POST" action="{{ route('testcombo.store') }}">
                    @csrf
                    <div id="company-info" class="content">
                      <input type="text" value="{{ $laboratories->id }}" name="laboratory_id" readonly>
                        <div class="row g-4" style="margin: 0rem 1rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="combo_name" class="form-label blabel ">Combo Name</label>
                                        <input type="text" id="combo_name" name="combo_name" class="form-control"
                                            placeholder="Eg: Enter Combo Name" value="{{ old('combo_name') }}" autocomplete="off" />
                                        @error('combo_name')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="combo_category" class="form-label blabel ">Combo Category</label>
                                        <select id="multicol-country" class="select2 form-select" data-allow-clear="true"
                                            name="combo_category">
                                            <option value="">Select</option>
                                            <option value="1">Australia</option>
                                            <option value="2">Bangladesh</option>
                                            <option value="3">Belarus</option>
                                        </select>
                                        @error('combo_category')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6 select2-primary">
                                        <label for="combo_test" class="form-label blabel">Combo Test</label>
                                        <select id="combo_test" class="select2 form-select" multiple name="combo_test[]">
                                          <option value="">Select</option>

                                          @foreach ($laboratories->tests as $comboTest )
                                          <option value="{{ $comboTest->id}}">{{ $comboTest->test_name}}</option>

                                          @endforeach
                                            
                                        </select>
                                        @error('combo_test')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6 select2-primary">
                                        <label for="combo_sample" class="form-label blabel">Combo Sample</label>
                                        <select id="combo_sample" class="select2 form-select" multiple name="combo_sample[]">
                                            <option value="">select</option>
                                           @foreach ($samples as  $sample)
                                           <option value="{{ $sample->id }}">{{ $sample->sample_name}}</option>

                                           @endforeach

                                            
                                        </select>
                                        @error('combo_sample')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <div class="row">
                                            <div class="mb-2 col-sm-6">
                                                <label for="combo_price" class="form-label blabel">Combo Price</label>

                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                        GHC
                                                    </span>
                                                    <input type="number" step="any" id="combo_price" name="combo_price"
                                                        class="form-control" placeholder="Enter Combo Price"
                                                        value="{{ old('combo_price') }}" autocomplete="off" />
                                                </div>
                                                @error('combo_price')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 col-sm-6">
                                                <label for="turn_around_time" class="form-label blabel" >Turn Around
                                                    Time</label>

                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                        Days
                                                    </span>
                                                    <input type="number" step="any" id="turn_around_time"
                                                        name="turn_around_time" class="form-control"
                                                        placeholder=" Enter turn Around Time"
                                                        value="{{ old('turn_around_time') }}" autocomplete="off" />
                                                </div>
                                                @error('turn_around_time')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <div class="row">
                                            <div class="mb-2 col-sm-6">
                                                <label for="combo_target_gender" class="form-label blabel">Target
                                                    Gender</label>

                                                <select id="combo_target_gender" class="select2 form-select"
                                                    data-allow-clear="true" name="combo_target_gender">
                                                    <option value="">Select</option>
                                                    <option value="1">male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">All</option>
                                                </select>
                                                @error('combo_target_gender')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 col-sm-6">
                                                <label for="accurate_from" class="form-label blabel">Accurate
                                                    From</label>

                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                        Days
                                                    </span>
                                                    <input type="number" step="any" id="accurate_from"
                                                        name="accurate_from" class="form-control"
                                                        placeholder=" Enter turn Around Time"
                                                        value="{{ old('accurate_from') }}" />
                                                </div>
                                                @error('accurate_from')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    

                                    <div class="mb-3 col-sm-6">
                                        <label for="combo_description" class="form-label blabel">Brief
                                            Combo description</label>
                                        <textarea class="form-control" id="combo_description" rows="3" maxlength="150"
                                            name="combo_description">
                                            {{ old('combo_description') }}
                                        </textarea>
                                        @error('combo_description')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-1">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <a href="{{ route('laboratories.show', $laboratories->id) }}" type="reset"
                                        class="btn btn-label-secondary" style="float: right">Cancel</a>
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
