@extends('content.pages.tests.testslayout')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


@section('content')

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
    </style>
    @php
        $sn = 1;
    @endphp
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Invoice /</span> List</h4> --}}

        <!-- Invoice List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="row ms-2 me-3 mt-4 mb-4">
                    <div
                        class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            {{-- <label>
                            <select
                                    name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                            </select>
                          </label> --}}
                        </div>
                        <div class=" text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3">
                            <a href="{{ route('tests.create') }}" class="dt-button btn btn-primary">
                                <span>
                                    <i class="bx bx-plus me-md-2"></i><span class="d-md-inline-block d-none">Create
                                        Test</span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>

                @unless(count($tests) == 0)
                    <table class="invoice-list-table table border-top">
                        <thead>
                            <tr >
                                {{-- <th>#ID</th> --}}
                                <th>Test Name</th>
                                {{-- <th>Price</th> --}}
                                <th class="text-truncate">Category</th>
                                <th>Target Gender</th>
                                <th>Sample</th>
                                <th data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                    title=" Amount of time you must wait from exposure to testing">TAF <i
                                        class="fa-solid fa-circle-question"></i></th>
                                <th>status</th>
                                <th>Action</th>
                                {{-- <th>Invoice Status</th>
                            <th class="cell-fit">Actions</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tests as $labtest)
                                <tr class="data-row">
                                    {{-- <td>{{ $sn++}}</td> --}}
                                    <td class="test_nameu">{{ $labtest->test_name }} </td>
                                    {{-- <td> {{ $test->test_price }} </td> --}}
                                    <td class="category_name" > {{ $labtest->test_category->category_name }}</td>
                                    <td>{{ $labtest->target_gender }} </td>
                                    <td>
                                        @foreach ($labtest->test_sample as $sample)
                                            {{ $sample->sample_name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $labtest->accurate_from }}</td>
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
                                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter">
                                            </button> --}}
                                            <a href="#" id="edit-item" class="btn btn-sm btn-icon editBtn" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter"><i class="bx bx-edit"></i></a>
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
    @endunless
    <!-- Vertically Centered Modal -->
    <div class="col-lg-4 col-md-6">
        {{-- <small class="text-light fw-semibold">Vertically centered</small> --}}
        <div class="mt-3">
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Launch modal
            </button> --}}

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Edit Lab Test</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editTestName" class="form-label"> Edit TEST NAME</label>
                                    <input type="text" id="modal-input-name" class="form-control"
                                        placeholder="Enter Test Name" name="test_name" required autocomplete="off"  />
                                </div>
                            </div>
                            <div class="row g-2 ">
                                <div class="col mb-3">
                                    <label for="emailWithTitle" class="form-label">Edit CATEGORY</label>
                                    <select id="select2Basic"
                                        class=" form-control {{ $errors->first('test_category_id') ? ' light-style-err' : '' }} select2 form-select form-select-lg "
                                        data-allow-clear="true" name='test_category_id'>
                                        <option disabled selected>Select Test Category</option>
                                        <option>Select Test Category</option>
                                        <option>Select Test Category</option>

                                    </select>
                                </div>

                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="emailWithTitle" class="form-label">Edit SAMPLE</label>
                                    <select name="requiredsample" id="select2Primary"
                                        class="select2 form-select {{ $errors->first('requiredsample') ? ' form-error' : '' }} "
                                        required multiple>
                                        <option value="he">hey</option>
                                        <option value="he">hey</option>
                                        <option value="he">hey</option>
                                        <option value="he">hey</option>

                                    </select>
                                </div>


                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="emailWithTitle" class="form-label">Edit STATUS</label>
                                    <select id="form-repeater-1-3"
                                        class="form-select {{ $errors->first('target_gender') ? ' form-error' : '' }} "
                                        name="target_gender" required>
                                        <option value="" disabled selected> Test Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="dobWithTitle" class="form-label">Edit TARGET GENDER </label>
                                    <select id="form-repeater-1-3"
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
                                    <input type="number" id="form-repeater-1-1" class="form-control"
                                        name="accurate_from" required
                                        {{ $errors->first('accurate_from') ? ' form-error' : '' }} autocomplete="off" />
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


   <script>
    $(document).ready(function() {
  /**
   * for showing edit item popup
   */

  $(document).on('click', "#edit-item", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#modalCenter').modal(options)
  })

  // on modal show
  $('#modalCenter').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var name = row.children(".test_nameu").text();
    console.log("this is"+name);
    var description = row.children(".category_name").text();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(name);
    $("#modal-input-category").val(description);

  })

  // on modal hide
  $('#modalCenter').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})
   </script>
@endsection
