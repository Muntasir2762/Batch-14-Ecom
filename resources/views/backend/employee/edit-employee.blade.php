@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{url('/admin/update-employees/'.$employee->id)}}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Name*</label>
                                <input type="text" name="name" value="{{$employee->name}}" class="form-control" placeholder="Enter employee name*" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Email*</label>
                                <input type="email" name="email" value="{{$employee->email}}" class="form-control" placeholder="Enter employee email*" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Password</label>
                                <input type="text" name="password" value="" class="form-control" placeholder="Enter employee password">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Role*</label>
                                <select name="role" class="form-control">
                                    <option value="employee" @if ($employee->role == "employee")
                                        selected
                                    @endif>Eployee</option>
                                    <option value="editor" @if ($employee->role == "editor")
                                        selected
                                    @endif>Editor</option>
                                    <option value="admin" @if ($employee->role == "admin")
                                        selected
                                    @endif>Admin</option>
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
