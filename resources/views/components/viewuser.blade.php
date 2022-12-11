<?php
    use App\Http\Controllers\UserController;

    $facultyname = UserController::getFacName($user->fac_id);
    $deptname = UserController::getDeptName($user->dept_id);
?>
<div class="herohead">
    <h3>VIEW USER</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>User's Profile</h4>
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}"
                        class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="name" id="name" value="{{$user->email}}"
                        class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Faculty</label>
                    <input type="text" name="name" id="name" value="{{$facultyname->name}}"
                        class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <input type="text" name="name" id="name" value="{{$deptname->name}}"
                        class="form-control" disabled>
                </div>
                <div class="form-group"> 
                    <a class="btn btn-danger ml-auto" style="color:#fff" href="/deleteuser/{{$user->id}}">Delete</a>
                </div>
            </div>
            <div class="col-lg-7 ml-auto">
                <div class="row">
                @if($article)
                    @foreach($article as $art)
                    <div class="col-lg-4 ">
                        <a href="/viewarticle/{{$art->id}}" class="grdanchor">
                        @if($art->status == 1)
                            <div class="small-box bg-info">
                        @else
                                <div class="small-box bg-warning">
                        @endif
                                <div class="inner">
                                    <h3>Article {{$art->id}}</h3>
                                    <p>{{$art->name}}</p>
                                    <span><i class="fab fa-bitbucket"></i>
                                @if($art->status == 1)
                                    WebTeam
                                @else
                                    Department Head
                                @endif
                                </span>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                                <div class="small-box-footer">Read More <i class="fas fa-arrow-circle-right"></i></div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>