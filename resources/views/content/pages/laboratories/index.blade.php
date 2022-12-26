@extends('layouts.masterlayout')

@section('content')

@php
    $sn=1
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
                    <h5 class="card-header">Multilingual</h5>

                </div>
                <div class="col-6">
                    <a href="{{ route('laboratories.create') }}" class=" btn btn-primary "
                        style="float:right; margin: 1.375rem; "><i class="bx bx-plus me-sm-2"></i> <span
                            class="d-none d-sm-inline-block">Add New
                            Laboratory</span></a>
                </div>
            </div>
            <div class="card-datatable table-responsive add-new-record pt-0 row g-2 text-nowrap">
                @unless(count($laboratories) == 0)
                    <table class="datatables-ajax  table table-bordered">
                        <thead>

                            <tr>
                                <!-- <th></th> -->

                                <th>id</th>
                                <th>Lab Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laboratories as $laboratory)
                                <tr>
                                    <td>{{ $laboratory->id }}</td>
                                    <td>{{ $laboratory->lab_name }}</td>
                                    <td>{{ $laboratory->lab_phone }}</td>
                                    <td>{{ $laboratory->lab_email }}</td>
                                    <td>{{ $laboratory->lab_address }}</td>
                                    {{-- <td>{{ $laboratory->lab_status }}</td> --}}
                                    @if ($laboratory->lab_status == 1)
                                        <td><span style="padding: 3px; border-radius:4px" class="bg-label-success">Active</span>
                                        </td>
                                    @elseif($laboratory->lab_status == 2)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-warning">Pending</span></td>
                                    @elseif($laboratory->lab_status == 3)
                                        <td><span style="padding: 3px; border-radius:4px"
                                                class="bg-label-secondary">Inactive</span></td>
                                    @endif
                                    <td>
                                        <div class="d-inline-block text-nowrap">
                                            <a href="{{ route('laboratories.show', $laboratory->id) }}"
                                                class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>
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
            <div style="margin: 0 2rem">
                {{ $laboratories->links() }}
            </div>
        </div>

        <!--/ Multilingual -->

    </div>


    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>


@endsection
