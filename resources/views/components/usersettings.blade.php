<div class="herohead">
    <h3>User Settings</h3>
</div>
<div id="contentbox">
    <div class="container col-lg-6 mx-auto">
        <h4>Update Bio</h4>
        <form action="/updateusers/{{Auth::User()->id}}" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
            <div class="form-group">
                <label for="" class="formlable">Your Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your name" class="form-control"
                    value="{{Auth::User()->name}}">
            </div>
            <div class="row" style="align-items: flex-end;">
                <div class="form-group col-lg-6">
                    <label for="" class="formlable">Your Email</label>
                    <input type="text" name="email" id="email" placeholder="User" class="form-control"
                        value="{{Auth::User()->email}}" autocomplete="false">
                </div>
            </div>
            @if(Auth::User()->desig_id ==1)
            <div class="form-group">
                <label for="" class="formlable">Registration Number</label>
                <input type="text" name="regno" id="regno" placeholder="Enter Registration Number" class="form-control"
                    value="{{Auth::User()->regno}}">
            </div>
            @endif
            <div class="form-group">
                <label for="" class="formlable">Change Profile Picture</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Bio" id="subtn">
            </div>
        </form>

        <h4>Update Password</h4>
        <form action="/updatepwd/{{Auth::User()->id}}" method="post" onsubmit="return validateform()" name="myForm">
            {{csrf_field()}}
            <div class="form-group">
                <label for="" class="formlable">Old Password</label>
                <input type="password" name="opwd" id="opwd" placeholder="Enter Password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="" class="formlable">New Password</label>
                <input type="password" name="npwd" id="npwd" placeholder="Enter Password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="" class="formlable">Re-Enter Password</label>
                <input type="password" name="rpwd" id="rpwd" placeholder="Enter Password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Password" id="subtn1">
            </div>
        </form>
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
    function validateform() {
        let npwd = document.forms["myForm"]["npwd"].value;
        let rpwd = document.forms["myForm"]["rpwd"].value;
       
        console.log(npwd+" : "+rpwd);
        if (npwd != rpwd) {
            alert("Password Does not match");
            return false;
        } 
    }
</script>