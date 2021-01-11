@extends('admin.master')
@section('title')
    Change Password
@endsection

@section('body')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Edit Password
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('profiles.password.update')}}" method="post" id="myForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" name="current_password" class="form-control" id="current_password">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" class="form-control" id="password">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="again_new_password">Again New Password</label>
                                        <input type="password" name="again_new_password" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>

                            </form>

                    </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->

            <!--/.direct-chat -->

            <!-- TO DO List -->

            <!-- /.card -->
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

    </section>
    <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <script>
        $(function () {
            $('#myForm').validate({
                rules: {
                    current_password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                        minlength:6
                    },
                    again_new_password:{
                        required: true,
                        eqaulTo: '#new_password'
                    }
                },
                messages: {
                    current_password: {
                        required: "Please enter current password",
                    },
                    new_password: {
                        required: "Please enter new password",
                        equalTo: "password will be minimum 6 characters or numbers"
                    },
                    again_new_password:{
                        required: "Please enter confirm password",
                        equalTo: "Confirm password does not match!!!!"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    </section>
@endsection


