<?php
    use App\Http\Controllers\UserController;
?>
<div class="herohead">
    <h3>ALL GROUPS</h3>
</div>
<div id="contentbox">
    <div class="container">

    <div class="form-group">
        <a href="/createusers" class="btn btn-success">Add New Group</a>
    </div>
    <div class="form-group">
        <div class="form-row">
            <input id="myInput" type="text" placeholder="Search.." class="form-control col-lg-11 mobser2">
            <div class="col-lg-1 mobser2"><i class="fas fa-search" id="schicon"></i></div>
        </div>
    </div>

    <hr>

    @if(Auth::User()->desig_id == 0)
    <div class="form-group">
       <a href="/downloadSampleCSV" class="btn btn-success">Download Sample CSV</a>
    </div>
    <div class="form-group">
        <form action="/addoldusers" method="post" >
            {{csrf_field()}}
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" class="btn btn-success">
        </form>
    </div>



    <hr>
    @endif

    @if(Auth::User()->desig_id == 4)
        <div class="form-row">
            <div class="form-group col-lg-4">
                <label for="">Faculty Search</label>
                <input id="facsearch" type="text" name="facsearch" placeholder="Faculty" class="form-control col-lg-11 mobser2">
            </div>
            <div class="form-group col-lg-4">
                <label for="">Department Search</label>
                <input id="deptsearch" type="text" name="deptsearch" placeholder="Faculty" class="form-control col-lg-11 mobser2">
            </div>
        </div>
    @endif


    <!-- Department -->
    <h3>Department Heads & Comitee Members</h3>
    <table class="table" id="allstdtable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Faculty</th> 
            <th scope="col">Department</th>
            <th scope="col">Designation</th>
            <th scope="col">Actions</th>
            @if(Auth::User()->desig_id == 0)
            <th scope="col">Comittie</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $usr)

            <?php
                $facultyname = UserController::getFacName($usr->fac_id);
                $deptname = UserController::getDeptName($usr->dept_id);
                $jobname = UserController::getJobName($usr->desig_id);
            ?>
            @if($usr->desig_id == 2 || $usr->desig_id == 4)
                <tr class="trow">
                        <td>{{$usr->name}}</td>
                        <td>{{$usr->email}}</td>
                        <td class="faccolumn">{{$facultyname->name}}</td>
                        <td class="depcolumn">{{$deptname->name}}</td>
                        <td>{{$jobname->name}}</td>
                        <td><a href="/viewuser/{{$usr->id}}" class="btn btn-primary">View User</a></td>
                        @if(Auth::User()->desig_id == 0)
                            <td>
                                @if($usr->desig_id == 4)
                                    <a href="/removedesignation/{{$usr->id}}" class="btn btn-danger">Remove</a>
                                @else
                                    @if($usr->desig_id == 2)
                                        <a href="/makecomiteemember/{{$usr->id}}" class="btn btn-primary">Add</a>
                                    @endif
                                @endif
                            
                            
                            </td>
                        @endif
                </tr>
            @endif

            @endforeach
        </tbody>
    </table>
  

    <!-- Sftaff Member -->
    <h3>Staff Heads & Web Teams</h3>
    <table class="table" id="allstdtable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Faculty</th> 
            <th scope="col">Department</th>
            <th scope="col">Designation</th>
            <th scope="col">Actions</th>
            @if(Auth::User()->desig_id == 0)
            <th scope="col">Web Team</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $usr)

            <?php
                $facultyname = UserController::getFacName($usr->fac_id);
                $deptname = UserController::getDeptName($usr->dept_id);
                $jobname = UserController::getJobName($usr->desig_id);
            ?>
            @if($usr->desig_id == 6 || $usr->desig_id == 5)
                <tr class="trow">
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->email}}</td>
                    <td class="faccolumn">{{$facultyname->name}}</td>
                    <td class="depcolumn">{{$deptname->name}}</td>
                    <td>{{$jobname->name}}</td>
                    <td><a href="/viewuser/{{$usr->id}}" class="btn btn-primary">View User</a></td>
                    @if(Auth::User()->desig_id == 0)
                    
                        <td>
                            @if($usr->desig_id == 5)
                                <a href="/removedesignationcom/{{$usr->id}}" class="btn btn-danger">Remove</a>
                            @else
                                @if($usr->desig_id == 6)
                                    <a href="/makewebmember/{{$usr->id}}" class="btn btn-primary">Add</a>
                                @endif
                            @endif
                        </td>
                       
                    @endif
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Student -->
    <h3>Students</h3>
    <table class="table" id="allstdtable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Faculty</th> 
            <th scope="col">Department</th>
            <th scope="col">Designation</th>
            <th scope="col">Actions</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($users as $usr)

            <?php
                $facultyname = UserController::getFacName($usr->fac_id);
                $deptname = UserController::getDeptName($usr->dept_id);
                $jobname = UserController::getJobName($usr->desig_id);
            ?>
            @if($usr->desig_id == 1)

            <tr class="trow">
                <td>{{$usr->name}}</td>
                <td>{{$usr->email}}</td>
                <td class="faccolumn">{{$facultyname->name}}</td>
                <td class="depcolumn">{{$deptname->name}}</td>
                <td>{{$jobname->name}}</td>
                <td><a href="/viewuser/{{$usr->id}}" class="btn btn-primary">View User</a></td>
            </tr>
            @endif

            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#allstdtable .trow").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#facsearch").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#allstdtable .trow").filter(function () {
                $("#allstdtable .trow ").toggle($("#allstdtable .trow .faccolumn").text().toLowerCase().indexOf(value) > -1)
            });
        });
        
        $("#deptsearch").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#allstdtable .trow").filter(function () {
                $("#allstdtable .trow ").toggle($("#allstdtable .trow .depcolumn").text().toLowerCase().indexOf(value) > -1)
            });
        });
        
    });

    


</script>