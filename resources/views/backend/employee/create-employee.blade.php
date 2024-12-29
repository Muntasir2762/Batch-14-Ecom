@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{url('/admin/store-employees')}}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add New Employee</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Name*</label>
                                <input type="text" name="name" value="" class="form-control" placeholder="Enter employee name*" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Email*</label>
                                <input type="email" name="email" value="" class="form-control" placeholder="Enter employee email*" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Password*</label>
                                <input type="text" name="password" value="" class="form-control" placeholder="Enter employee password*" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Role*</label>
                                <select name="role" class="form-control">
                                    <option value="employee" selected>Eployee</option>
                                    <option value="editor">Editor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Submit" class="form-control btn btn-success">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
