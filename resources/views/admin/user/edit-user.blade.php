@extends('admin.master')
@section('title')
    Home
@endsection

@section('body')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->

                <!-- ./col -->

                <!-- ./col -->

                <!-- ./col -->
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
                                Edit User
                                <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>User List</a>
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('users.update',$user->id)}}" method="post" id="myForm">
                                @csrf
                                <div class="form-group col-md-4">
                                    <label for="usertype">User Role</label>
                                    <select name="usertype" id="usertype" class="form-control">
                                        <option value="">Select Role</option>
                                        <option value="Admin" {{($user->usertype=='Admin')?"selected":""}}>Admin</option>
                                        <option value="User" {{($user->usertype=='User')?"selected":""}}>User</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                    <font style="color: red">{{$errors->has('email')?($errors->first('email')):''}}</font>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="submit" value="submit" class="btn btn-success btn-block">
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

                    <!-- Map card -->

                    <!-- /.card -->

                    <!-- solid sales graph -->

                    <!-- /.card -->

                    <!-- Calendar -->

                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <script>
            $(function () {
                $('#myForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        usertype: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        password2: {
                            required: true,
                            equalTo: '#password'
                        },
                    },
                    messages: {
                        name:{
                            required: 'Please enter a username'
                        },
                        usertype: {
                            required: 'Please select a usertype'
                        },
                        email: {
                            required: "Please enter a email address",
                            email: "Please enter a <em>vaild</em> email address"
                        },
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        password2: {
                            required: "Please enter confirm password",
                            equalTo: "Confirm password does not match"
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


