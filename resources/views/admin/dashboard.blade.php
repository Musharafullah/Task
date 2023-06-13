@extends('admin.layouts.master')
@section('content')
    <aside class="right-side">

        <!-- Notifications -->

        <!-- Content -->
        <section class="content-header">
            <h1>All Users</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                        Settings
                    </a>
                </li>
                <li><a href="#">All Users</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content paddingleft_right15">
            <button class="btn btn-raised btn-primary " data-toggle="modal" data-target="#add_category">
                <span class="fa fa-plus"></span> Add New User
            </button>
            <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="add_category" role="dialog"
                aria-labelledby="modalLabelfade" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('add_attendees') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title" id="modalLabelfade">Add New User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="institute_name" class="control-label">Name
                                                *</label>
                                            <div>
                                                <input id="title" required name="name" type="text"
                                                    placeholder="Name" class="form-control required" value="" />

                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="institute_name" class="control-label">User Email
                                                *</label>
                                            <div>
                                                <input id="title" required name="email" type="email"
                                                    placeholder="email" class="form-control required" value="" />


                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn  btn-success" value="Save">
                                <button class="btn  btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="panel panel-primary table-responsive ">
                        {{-- <div class="row"> --}}
                        <div class="panel-heading">
                            <h4 class="panel-title">User List</h4>
                        </div>
                        <br />

                        <div class="panel-body ">

                            <table class="table  " style=" width:100%;" id="table" style="overflow-x: auto;">
                                <thead>
                                    <tr class="filters">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($all)
                                        @foreach ($all as $key => $showData)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $showData->name }}</td>
                                                <td>{{ $showData->email }}</td>
                                                <td style="text-align: center;">
                                                    <div style="display: flex; justify-content: center;">
                                                        <!-- Edit Icon -->
                                                        <i class="livicon" data-toggle="modal"
                                                            data-target="#edit_category_{{ $showData->id }}"
                                                            data-name="edit" data-size="18" data-loop="true"
                                                            data-c="#428BCA" data-hc="#428BCA" title="update category"></i>
                                                        <!-- Edit Form -->
                                                        <div class="modal fade modal-fade-in-scale-up" tabindex="-1"
                                                            id="edit_category_{{ $showData->id }}" role="dialog"
                                                            aria-labelledby="modalLabelfade" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('update_attendees') }}"
                                                                        method="POST" class="form-horizontal"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-header bg-primary">
                                                                            <h4 class="modal-title" id="modalLabelfade">
                                                                                Update
                                                                                User </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="hidden" name="attendes_id"
                                                                                        value="{{ $showData->id }}" />
                                                                                    <div class="form-group"
                                                                                        style="text-align: left;">
                                                                                        <label for="institute_name"
                                                                                            class="control-label">Name
                                                                                            *</label>
                                                                                        <div>
                                                                                            <input id="title" required
                                                                                                name="name"
                                                                                                type="text"
                                                                                                placeholder="Name"
                                                                                                class="form-control required"
                                                                                                value="{{ $showData->name }}" />
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group"
                                                                                        style="text-align: left;">
                                                                                        <label for="institute_name"
                                                                                            class="control-label">User
                                                                                            Email
                                                                                            *</label>
                                                                                        <div>
                                                                                            <input id="title" required
                                                                                                name="email"
                                                                                                type="email"
                                                                                                placeholder="email"
                                                                                                class="form-control required"
                                                                                                value="{{ $showData->email }}" />


                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="modal-footer">
                                                                                        <input type="submit"
                                                                                            class="btn btn-success"
                                                                                            value="Update">
                                                                                        <button class="btn btn-primary"
                                                                                            data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#"
                                                            onClick="javascript: return confirm('Are you sure want to inactivate this record?');">
                                                            <i class="livicon" data-name="unlock" data-size="18"
                                                                data-loop="true" data-c="#acf6ac" data-hc="#acf6ac"
                                                                title="Go to inactive >>"></i>
                                                        </a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- row-->
                {{-- </div> --}}
        </section>
    </aside>
@endsection
