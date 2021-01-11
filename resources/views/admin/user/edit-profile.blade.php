@extends('admin.master')
@section('title')
    Home
@endsection

@section('body')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                                Edit Profile
                                <a class="btn btn-success float-right btn-sm" href="{{route('profiles.view')}}"><i class="fa fa-list"></i>Your Profile</a>
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('profiles.update',$user->id)}}" method="post" id="myForm"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
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
                                    <div class="form-group col-md-4">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" value="{{$user->address}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{($user->gender=='Male')?"selected":""}}>Male</option>
                                            <option value="Female" {{($user->gender=='Female')?"selected":""}}>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <img id="showImage" src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/three.png')}}" style="width: 150px; height: 160px; border: 1px solid#000b16;" alt="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="submit" value="Update" class="btn btn-success btn-block">
                                    </div>
                                </div>

                            </form>

                        </div><!-- /.card-body -->
                    </div>

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

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



