<div class="herohead">
    <h3>NEW Groups</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Add Groups</h3>
                <form action="/addusers" method="post" enctype="multipart/form-data" hidden>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="formlable">Groups Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your name" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Groups Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Password</label>
                        <input type="password" name="pwd" id="pwd" placeholder="Enter Password" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Designation</label>
                        <select name="desig" id="desig" class="form-control" required>
                            @if($designation)
                            @foreach($designation as $desig)
                            @if($desig->id != 5)
                            <option value="{{$desig->id}}">{{$desig->name}}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Faculty</label>
                        <select name="fac" id="fac" class="form-control" required>
                            @if($faculty)
                            @foreach($faculty as $fac)
                            <option value="{{$fac->id}}">{{$fac->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Department</label>
                        <select name="dept" id="dept" class="form-control" required>
                            @if($department)
                            @foreach($department as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Profile Picture</label>
                        <input type="file" name="file" id="file" class="form-control ">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register" id="subtn">
                    </div>
                </form>
                <form action="/addusers" method="post" enctype="multipart/form-data" name="myForm">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="formlable">User Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter User name" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Designation</label>
                        <select name="desig" id="desig" class="form-control" required>
                            <option value="0">Choose User Job</option>
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
                        <select name="fac" id="fac" class="form-control fac1" required>
                            @if($faculty)
                            @foreach($faculty as $fac)
                            <option value="{{$fac->id}}">{{$fac->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group hidetag">
                        <label for="" class="formlable">Department</label>
                        <select name="dept" id="dept" class="form-control dept1" required>
                            @if($department)
                            @foreach($department as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="row" style="align-items: flex-end;">
                        <div class="form-group col-lg-6">
                            <label for="" class="formlable">User Email</label>
                            <input type="text" name="email" id="email" placeholder="User" class="form-control" required
                                autocomplete="false">
                        </div>
                        <div class="form-group col-lg-2">
                            <input type="text" name="" id="" placeholder="Enter Email" class="form-control" disabled
                                value="@">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="" class="formlable">Domain Name</label>
                            <input type="text" name="domain" id="domain" placeholder="example.com" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Password</label>
                        <input type="password" name="pwd" id="pwd" placeholder="Enter Password" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="" class="formlable">Registration Number (Optional)</label>
                        <input type="text" name="regno" id="regno" placeholder="Enter Registration Number"
                            class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="" class="formlable">Profile Picture</label>
                        <input type="file" name="file" id="file" class="form-control ">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register" id="subtn">
                    </div>
                </form>
            </div>
            <div class="col-lg-5 ml-auto">
                <h3>Add Faculty</h3>
                <form action="/addfaculty" method="post">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="col-lg-10 form-group">
                            <label for="" class="formlable">Add Faculty</label>
                            <input type="text" name="fname" id="fname" placeholder="Enter faculty name"
                                class="form-control" required>
                        </div>
                        <div class="col-lg-2 form-group fbtn">
                            <input type="submit" class="btn btn-primary" value="Add" id="subtn">
                        </div>
                    </div>
                </form>
                <hr>
                <h3>Add Department</h3>
                <form action="/adddepartment" method="post">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="col-lg-10 form-group">
                            <label for="" class="formlable">Add Department</label>

                            <select name="faculty" id="faculty" class="form-control" required>
                                @if($department)
                                @foreach($faculty as $fac)
                                <option value="{{$fac->id}}">{{$fac->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <input type="text" name="dname" id="dname" placeholder="Enter department name"
                                class="form-control" required style="margin-top:20px">
                            <input type="text" name="dsname" id="dsname" placeholder="Enter short name"
                                class="form-control" required style="margin-top:20px">
                        </div>
                        <div class="col-lg-2 form-group fbtn">
                            <input type="submit" class="btn btn-primary" value="Add" id="subtn">
                        </div>
                    </div>
                </form>
                <hr hidden>
                <h3 hidden>Create Web Team Users</h3>
                <form action="/addwebteam" method="post" hidden>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="formlable">User Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your name" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">User Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Password</label>
                        <input type="password" name="pwd" id="pwd" placeholder="Enter Password" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register" id="subtn">
                    </div>
                </form>
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

<script>
    $(document).ready(function () {
        console.log("aaaaaaaa");
        $('.fac1').on('change', function () {
            var fac1 = $(".fac1").val();
            console.log(fac1);
            $.ajax({
                type: "get",
                url: 'getDepartment/' + fac1,
                success: function (res) {
                    console.log(res);

                    $('.dept1').empty();
                    $.each(res['item'], function (key, value) {
                        var id = value['id'];
                        var name = value['name'];
                        $('.dept1').append('<option value="' + id + '">' + name + '</option>');
                    });
                    $('.dept1').append('<option value="dis" selected disabled>Select Departments</option>');
                }

            });
        });
    });

</script>