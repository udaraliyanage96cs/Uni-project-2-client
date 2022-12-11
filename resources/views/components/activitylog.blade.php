
<?php
    use App\Http\Controllers\UserController;
?>
<div class="herohead">
    <h3>ACTIVITY LOGS</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="form-group">
            <div class="form-row">
                <input id="myInput" type="text" placeholder="Search.." class="form-control col-lg-11 mobser2">
                <div class="col-lg-1 mobser2"><i class="fas fa-search" id="schicon"></i></div>
            </div>
        </div>
        <div class="row">
            @if($logs)
                <table class="table" id="activities">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type</th>
                            <th scope="col">Affected ID</th>
                            <th scope="col">Action</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $lgs)
                            <?php
                                $user = UserController::getUser($lgs->user_id);
                            ?>
                            <tr  class="trow">
                                <th>{{$lgs->id}}</th>
                                <th>{{$lgs->type}}</th>
                                <th>{{$lgs->glob_id}}</th>
                                <th>{{$lgs->status}}</th>
                                @if(!$user)
                                <th>Admin</th>

                                @else
                                <th>{{$user->name}}</th>

                                @endif
                                <th>{{$lgs->updated_at}}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
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
            $("#activities .trow").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>