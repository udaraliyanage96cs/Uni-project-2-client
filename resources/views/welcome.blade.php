<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@500&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                UOR
            </div>

            <div class="links">
                @guest
                <a data-bs-toggle="modal" data-bs-target="#regmodal">Register</a>
                <a data-bs-toggle="modal" data-bs-target="#loginmodal">Login</a>
                @endguest

                @auth
                <a href="/userhome">Dashboard</a>
                <a href="/logout">Logout</a>
                @endauth
            </div>

            <div class="modal fade bd-example-modal-lg" id="regmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Registration</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/regusers" method="post" enctype="multipart/form-data"
                                onsubmit="return validateform()" name="myForm">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="" class="formlable">Your Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Your name"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="formlable">Designation</label>
                                    <select name="desig" id="desig" class="form-control" required>
                                        <option value="0">Choose Your Job</option>
                                        @if($designation)
                                            @foreach($designation as $desig)
                                            @if($desig->id != 4 && $desig->id != 5 )
                                            <option value="{{$desig->id}}">{{$desig->name}}</option>
                                            @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group hidetag">
                                    <label for="" class="formlable">Faculty</label>
                                    <select name="fac" id="fac" class="form-control" required>
                                        <option value="fc" selected disabled>Select Faculty</option>
                                        @if($faculty)
                                        @foreach($faculty as $fac)
                                        <option value="{{$fac->id}}">{{$fac->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group hidetag" >
                                    <label for="" class="formlable">Department</label>
                                    <select name="dept" id="dept" class="form-control" required>
                                      
                                        @if($department)
                                        @foreach($department as $dept)
                                        <option value="{{$dept->id}}">{{$dept->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="row" style="align-items: flex-end;">
                                    <div class="form-group col-lg-6">
                                        <label for="" class="formlable">Your Email</label>
                                        <input type="text" name="email" id="email" placeholder="User"
                                            class="form-control" required autocomplete="false">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <input type="text" name="" id="" placeholder="Enter Email" class="form-control"
                                            disabled value="@">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="" class="formlable">Domain Name</label>
                                        <input type="text" name="domain" id="domain" placeholder="example.com"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="formlable">Password</label>
                                    <input type="password" name="pwd" id="pwd" placeholder="Enter Password"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="formlable">Conform Password</label>
                                    <input type="password" name="cpwd" id="cpwd" placeholder="Enter Password"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="formlable">Registration Number (Optional)</label>
                                    <input type="text" name="regno" id="regno" placeholder="Enter Registration Number"
                                        class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="" class="formlable">Profile Picture (Optional)</label>
                                    <input type="file" name="file" id="file" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Register" id="subtn">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/login" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="" class="formlable">User Email</label>
                                    <input type="email" name="email" id="email" placeholder="Enter Email"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="formlable">Password</label>
                                    <input type="password" name="pwd" id="pwd" placeholder="Enter Password"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Login" id="lgbtn">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            console.log("aaaaaaaa");
            $('#fac').on('change', function () {
                var fac = $("#fac").val();
                console.log(fac);
                $.ajax({
                    type: "get",
                    url: 'getDepartment/' + fac,
                    success: function (res) {
                        console.log(res);

                        $('#dept').empty();
                        $.each(res['item'], function (key, value) {
                            var id = value['id'];
                            var name = value['name'];
                            $('#dept').append('<option value="' + id + '">' + name + '</option>');
                        });
                        $('#dept').append('<option value="dis" selected disabled>Select Departments</option>');
                    }

                });
            });
        });

        function validateform() {
            let emailfull = document.forms["myForm"]["domain"].value;
            var email = emailfull.split('.');
            var len = email.length;
            console.log(emailsub);
            if (email[len - 1] != 'lk' || email[len - 2] != 'ac' || email[len - 3] != 'ruh') {
                alert("Please enter valid email addrss");
                return false;
            }else if($('#desig').val()==1 && $("#regno").val()==""){ 
                alert("Please enter your student registration number");
                return false;
            }else {
                var pwd = document.forms["myForm"]["pwd"].value;
                var cpwd = document.forms["myForm"]["cpwd"].value;
                if (pwd != cpwd) {
                    alert("Password does not match !!!");
                    return false;
                }
            }
            return false;
        }
        $('#desig').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            $(".hidetag").show();
            if (valueSelected == 1) {
                $('#fac').on('change', function (e) {
                    var optionSelected = $("option:selected", this);
                    var valueSelected = this.value;
                    console.log(valueSelected);

                    $.ajax({
                        url: "/getsname/" + valueSelected,
                        type: 'GET',
                        dataType: 'json', // added data type
                        success: function (res) {
                            console.log(res);
                            $("#domain").val(res['name']+".ruh.ac.lk");
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });

                });
            }else if(valueSelected == 5){
                $(".hidetag").hide();
            }
        });

    </script>
</body>

</html>