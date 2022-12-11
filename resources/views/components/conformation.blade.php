<?php
    use App\Http\Controllers\UserController;
?>
<div class="herohead">
    <h3>ALL Web Teams</h3>
</div>
<div id="contentbox">
    <div class="container">
    <div class="form-group">
        <div class="form-row">
            <input id="myInput" type="text" placeholder="Search.." class="form-control col-lg-11 mobser2">
            <div class="col-lg-1 mobser2"><i class="fas fa-search" id="schicon"></i></div>
        </div>
    </div>
    <table class="table" id="allstdtable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Team Name</th>
            <th scope="col">Email</th>
            <th scope="col">Designation</th>
            <th scope="col">Created Date</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $usr)
            <?php
                $jobname = UserController::getJobName($usr->desig_id);
            ?>
            <tr class="trow">
                <td>{{$usr->name}}</td>
                <td>{{$usr->email}}</td>
                <td>{{$jobname->name}}</td>
                <td>{{$usr->created_at}}</td>
                <td>

                @if($usr->approve == 1)
                <a href="/teamdisabled/{{$usr->id}}" class="btn btn-danger">Disabled</a>
                @else
                <a href="/teamapprove/{{$usr->id}}" class="btn btn-success">Approve</a>
                @endif
                </td>
            </tr>
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
    });
</script>