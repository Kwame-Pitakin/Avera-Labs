@extends('content.pages.tests.testslayout')
{{-- Jquery CDN --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('title', 'Create Test')

@section('content')

    <!-- Content -->
    <style>
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

        .form-error {

            border: 1px solid #ff5b5c !important;
        }
    </style>



    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Form Repeater -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add new lab test</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('tests.store') }}" method="POST" class="form-repeater">
                        @csrf
                        <div data-repeater-list="group_a">
                            <div data-repeater-item>

                                <div class="row">
                                    <table class="table">

                                        <thead>
                                            <tr>
                                                <th class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">Test Name <br>

                                                </th>
                                                <th class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">Test Category</th>
                                                <th class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">Target Gender</th>
                                                <th class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">Required Sample</th>
                                                <th class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" data-bs-toggle="tooltip"
                                                    data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                    title=" Amount of time you must wait from exposure to testing">TAF <i
                                                        class="fa-solid fa-circle-question"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <div>

                                                </div>
                                                <td class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" style="min-height: 100%">
                                                    <input type="text" id="form-repeater-1-1"
                                                        class="form-control {{ $errors->first('test_name') ? ' form-error' : '' }}"
                                                        placeholder="Enter Test Name" name="test_name" required />
                                                    @error('test_name')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror

                                                </td>

                                                <td class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">


                                                    {{-- <label for="select2Basic" class="form-label">Test Category</label> --}}
                                                    <select id="select2Basic"
                                                        class=" form-control {{ $errors->first('test_category_id') ? ' light-style-err' : '' }} select2 form-select form-select-lg "
                                                        data-allow-clear="true" name='test_category_id'>
                                                        <option disabled selected>Select Test Category</option>
                                                        @foreach ($categorydata as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- @error('test_category_id')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror --}}

                                                </td>
                                                <td class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    {{-- <label class="form-label" for="form-repeater-1-3">Terget Gender</label> --}}
                                                    <select id="form-repeater-1-3"
                                                        class="form-select {{ $errors->first('target_gender') ? ' form-error' : '' }} "
                                                        name="target_gender" required>
                                                        <option value="" disabled selected> Target Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="all">All</option>
                                                    </select>
                                                    @error('target_gender')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror

                                                </td>
                                                <td class="mb-4 col-lg-6 col-xl-2 col-12 mb-0">

                                                    <!-- Success -->
                                                    {{-- <label class="form-label " for="select2Primary">Required Sample</label> --}}
                                                    <div class="select2-primary">
                                                        <select name="requiredsample" id="select2Primary"
                                                            class="select2 form-select {{ $errors->first('requiredsample') ? ' form-error' : '' }} "
                                                            required multiple>
                                                            @foreach ($sampledata as $sample)
                                                                <option value="{{ $sample->id }}">
                                                                    {{ $sample->sample_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        {{-- @error('requiredsample')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror --}}
                                                    </div>

                                                </td>
                                                <td class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">

                                                    {{-- <label class="form-label" for="form-repeater-1-1">Test Name</label> --}}
                                                    <input type="number" id="form-repeater-1-1" class="form-control"
                                                        name="accurate_from" required
                                                        {{ $errors->first('accurate_from') ? ' form-error' : '' }} />
                                                    @error('accurate_from')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror

                                                </td>

                                                <td class="mb-4 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <button type="button" class="btn btn-label-danger mt-4x"
                                                        data-repeater-delete>
                                                        <i class="bx bx-x"></i>
                                                        <span class="align-middle"></span>
                                                    </button>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>



                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="mb-0">

                            <button type="button" class="btn btn-primary" data-repeater-create>
                                <i class="bx bx-plus"></i>
                                <span class="align-middle">Add New Row</span>
                            </button>

                            <button type="submit" id="saveChanges" class="btn btn-primary me-sm-3 me-1"
                                style="float: right">Save Changes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Form Repeater -->

        <hr class="my-3" />

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Test Name</th>
                            <th class="text-truncate">Category</th>
                            <th>Target Gender</th>
                            <th>Sample</th>
                            <th>status</th>
                            <th>Action</th>

                        </tr>

                    </thead>
                    @unless(count($tests) == 0)
                        <tbody class="table-border-bottom-0">
                            @foreach ($tests as $labtest)
                                <tr>
                                    <td>{{ $labtest->id }}</td>
                                    <td>{{ $labtest->test_name }} </td>
                                    {{-- <td> {{ $test->test_price }} </td> --}}
                                    <td> {{ $labtest->test_category->category_name }}</td>
                                    <td>{{ $labtest->target_gender }} </td>
                                    <td id="sampleuu">
                                        @foreach ($labtest->test_sample as $sample)
                                            {{ $sample->sample_name }}
                                        @endforeach
                                        

                                    </td>
                                    @if ($labtest->test_status == 1)
                                        <td><span style="padding: 3px; border-radius:4px" class="bg-label-success">Active</span>
                                        </td>
                                    @elseif($labtest->test_status == 2)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-warning">Pending</span></td>
                                    @elseif($labtest->test_status == 3)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-secondary">Inactive</span></td>
                                    @endif
                                    <td>
                                        <div class="d-inline-block text-nowrap">
                                            <button value="{{ $labtest->id }}" href="#" id="edit-item"
                                                class="btn btn-sm btn-icon  editbtn" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter"><i class="bx bx-edit"></i></button>
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
                    @endunless
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <!-- Vertically Centered Modal -->
        <div class="col-lg-4 col-md-6">
            <div class="mt-3">

                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Lab Test</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="modal-test-id" id="modal-test-id" value="">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="editTestName" class="form-label"> Edit TEST NAME</label>
                                        <input type="text" id="modal-test-name" class="form-control"
                                            placeholder="Enter Test Name" name="test_name" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="row g-2 ">
                                    <div class="col mb-3">
                                        <label for="emailWithTitle" class="form-label">Edit CATEGORY</label>
                                        <select id="modal-category"
                                            class=" form-control {{ $errors->first('test_category_id') ? ' light-style-err' : '' }} select2 form-select form-select-lg "
                                            data-allow-clear="true" name='test_category_id'>
                                            @foreach ($categorydata as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="row g-2">
                                    <div class="col mb-3">
                                        <label for="emailWithTitle" class="form-label">Previous SAMPLE</label>
                                        <div class="li-wrapper d-flex justify-content-start align-items-center">
                                            
                                            <div class="list-content">
                                              <h6 class="mb-1" id="">List group item heading</h6>
                                            </div>
                                          </div>

                                        {{-- <input type="text" class="modal-sample" id="modal-sample"> --}}
                                    </div>


                                </div>
                                <div class="row g-2">
                                    <div class="col mb-3">
                                        <label for="emailWithTitle" class="form-label">Edit SAMPLE</label>
                                        <select name="requiredsample" id="modal-sample"
                                            class="select2 form-select {{ $errors->first('requiredsample') ? ' form-error' : '' }} "
                                            required multiple>
                                            @foreach ($sampledata as $sample)
                                                <option value="{{ $sample->id }}">
                                                    {{ $sample->sample_name }}</option>
                                            @endforeach
                                        </select>

                                        {{-- <input type="text" class="modal-sample" id="modal-sample"> --}}
                                    </div>


                                </div>
                                <div class="row g-2">
                                    <div class="col mb-3">
                                        <label for="emailWithTitle" class="form-label">Edit STATUS</label>
                                        <select id="modal-test-status"
                                            class="form-select {{ $errors->first('target_gender') ? ' form-error' : '' }} "
                                            name="target_gender" required>
                                            <option value="" disabled selected> Target Gender</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                            <option value="3">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="dobWithTitle" class="form-label">Edit TARGET GENDER </label>
                                        <select id="modal-target-gender"
                                            class="form-select {{ $errors->first('target_gender') ? ' form-error' : '' }} "
                                            name="target_gender" required>
                                            <option value="" disabled selected> Target Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="dobWithTitle" class="form-label">Edit TAF</label>
                                        <input type="number" id="modal-taf" class="form-control" name="accurate_from"
                                            required {{ $errors->first('accurate_from') ? ' form-error' : '' }}
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

    </div>



    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var test_id = $(this).val();

                var sampleuu = $('#sampleuu').text();
               

                // console.log(test_id);
                $('#modalCenter').modal('show');
                $('#modal-sample').val(sampleuu);
                console.log(sampleuu);


                $.ajax({
                    type: "GET",
                    url: "/tests/edit/" + test_id,
                    success: function(response) {
                        console.log(response);
                        $('#modal-test-name').val(response.testedit.test_name);
                        $('#modal-category').val(response.testedit.test_category_id);
                        $('#modal-test-status').val(response.testedit.test_status);
                        $('#modal-target-gender').val(response.testedit.target_gender);
                        $('#modal-taf').val(response.testedit.accurate_from);
                        // $('#modal-sample').val(1)

                    }
                });
            });
        });
    </script>

@endsection
