@extends('content.pages.tests.testslayout')

@section('content')
<style>
    td{
        /* height: 80px; */
  /* width: 160px; */
  text-align: center;
  vertical-align: middle;
    }
    th{
        /* height: 80px;
  width: 160px; */
  text-align: center;
  vertical-align: middle;
    }
</style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Form Repeater -->
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-header mb-3 col-12 ">
                        <span class="" style="font-size: larger;font-weight:600">Add Test to <span> &nbsp; {{ $lab->lab_name }}&nbsp;</span>List</span>
                        <a  href="{{ route('laboratories.show',$lab->id) }}" type="reset" class="btn btn-label-secondary " style="float: right"><i class="fa-solid fa-xmark"></i></a>
                    </div>

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
                        
                        <form action="{{ route('labtest.store') }}" method="POST" class="form-repeater">
                            @csrf
                            <input type="number" value="{{ $lab->id }}" readonly name="laboratory_id" hidden>

                            <div data-repeater-list="group_a">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-1">Select Test</label>

                                            <select id="modal-category"
                                                class=" form-control select2 form-select form-select-lg "
                                                data-allow-clear="true" name='test_id' required>
                                                <option value="" selected disabled></option>
                                                @foreach ($allTests as $test)
                                                    <option value="{{ $test->id }}"> {{ $test->test_name }}</option>
                                                @endforeach



                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-2" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                title="Turn Around Time In Working Days, once sample is received by lab">Turn Around Time <i
                                                    class="fa-solid fa-circle-question"></i></label>
                                            <input class="form-control mobile-number" type="number" id="turn_around_time"
                                                name="turn_around_time" placeholder="Enter Turn Around Time" required />

                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-2">Test Price</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="fi fi-gh fis rounded-circle fs-3 me-1"></i> &nbsp
                                                    (GHC)</span>
                                                <input class="form-control mobile-number" type="number" id="test_price"
                                                    name="test_price" placeholder="Enter Test Price" required />
                                            </div>
                                        </div>


                                        <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                            <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                                <i class="bx bx-x"></i>
                                                <span class="align-middle">Delete</span>
                                            </button>
                                        </div>
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
        </div>
        <br><br><br><br>
        <div class="card">
            <h5 class="card-header">Tests Offered By<span>&nbsp; {{ $lab->lab_name }} &nbsp;</span></h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Cost</th>
                            <th>Turn Arouund Time</th>
                            <th class="w-px-200">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($lab->tests as $test)
                            <tr>
                                {{-- <td>{{ $test->id }}</td> --}}
                                <td>{{ $test->test_name }}</td>
                                <td>{{ $test->pivot->test_price }}</td>

                                <td style="align-items: center;align-content:center"> {{ $test->pivot->turn_around_time }}</td>

                                @foreach ($labtests as $labtest)
                                @endforeach
                                @if ($labtest->lab_test_status == 1)
                                    <td><span style="padding: 3px; border-radius:4px" class="bg-label-success">Active</span>
                                    </td>
                                @elseif($labtest->lab_test_status == 2)
                                    <td><span style="padding: 3px; border-radius:4px"
                                            class="bg-label-warning">Pending</span>
                                    </td>
                                @elseif($labtest->lab_test_status)
                                    <td><span style="padding: 3px; border-radius:4px"
                                            class="bg-label-secondary">Inactive</span>
                                    </td>
                                @endif

                                <td>Action</td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <!--/ Basic Bootstrap Table -->


@endsection
