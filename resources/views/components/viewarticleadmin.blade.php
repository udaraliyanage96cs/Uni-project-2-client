<?php
    use App\Http\Controllers\RevReplyController;
?>
<div class="herohead">
    <h3>{{$article->name}}</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">

                <h3>{{$article->name}}
                    @if($article->status == 1)
                    <i class="fas fa-check-circle" style="color:#00af9c"></i>
                    @else
                    <i class="fas fa-check-circle" style="color:yellow"></i>
                    @endif
                </h3>
                <?php
                    $usersnames = RevReplyController::getUserNames($article->user_id);
                ?>
                <span>
                    Category --
                    @if($article->type == 1)
                    Top Stories
                    @elseif($article->type == 2)
                    News
                    @else
                    Career Opportunities
                    @endif
                </span><br>
                <span>Author --
                    @if($article->re_article_id != 0)
                    <?php
                            $OrgAuthor = RevReplyController::getOrgAuthor($article->re_article_id);
                        ?>
                    {{$usersnames->name}} and {{$OrgAuthor->name}}
                    @else
                    {{$usersnames->name}}
                    @endif
                </span><br>
                <span>Department --
                    <?php
                            $dptname = RevReplyController::getDeptName($article->user_id);
                        ?>
                    {{$dptname->name}}
                </span><br>
                <span>Faculty --
                    <?php
                            $faculty = RevReplyController::getFacName($article->user_id);
                        ?>
                    {{$faculty->name}}
                </span>

                @if($article->type == 1)
                <div class="form-group articlecontent">
                    {!! $article->content !!}
                </div>

                <div class="form-grop articlecontent">
                    <div class="row">
                        @if($article->re_article_id != 0)
                        @foreach($recontimgs as $imgs)
                        <div class="col-lg-3">
                            <a href="/uploads/images/{{$article->re_article_id}}/{{$imgs->url}}" target="_blank">
                                <div class="imgs">
                                    <img src="/uploads/images/{{$article->re_article_id}}/{{$imgs->url}}" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                        @foreach($contimage as $imgs)
                        <div class="col-lg-3">
                            <a href="/uploads/images/{{$articleid}}/{{$imgs->url}}" target="_blank">
                                <div class="imgs">
                                    <img src="/uploads/images/{{$articleid}}/{{$imgs->url}}" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                

                <div class="form-grop articlecontent">
                    <div class="row">
                        @if($article->re_article_id != 0)
                        @foreach($recontimgs as $imgs)
                        <div class="col-lg-3">
                            <a href="/uploads/images/{{$article->re_article_id}}/{{$imgs->url}}" target="_blank">
                                <div class="imgs">
                                    <img src="/uploads/images/{{$article->re_article_id}}/{{$imgs->url}}" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                        @foreach($contimage as $imgs)
                        <div class="col-lg-3">
                            <a href="/uploads/images/{{$articleid}}/{{$imgs->url}}" target="_blank">
                                <div class="imgs">
                                    <img src="/uploads/images/{{$articleid}}/{{$imgs->url}}" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group articlecontent">
                    {!! $article->content !!}
                </div>
                @endif

                <div class="form-group reviews">
                    @if(count($review)>0)
                    <h5>Reviews</h5>
                    @endif


                    @foreach($review as $rvrep)
                    <?php
                            $replies = RevReplyController::getReplyies($rvrep->id);
                            $usersnames = RevReplyController::getUserNames($rvrep->user_id);
                        ?>
                    @if($rvrep->note != "")
                    <div class="admrevcmnt  col-lg-10">{{$rvrep->note}}
                        <div class="col-lg-12 dtime">{{$usersnames->name}}<br>{{$rvrep->created_at}}</div>
                    </div>
                    @endif
                    @foreach($replies as $rep)

                    <div class="revcmnt  col-lg-10 ml-auto">
                        <div class="row">
                            <div class="col-lg-9">{{$rep->reply}}</div>
                            <div class="col-lg-2 ">{{$rep->created_at}}</div>
                        </div>
                    </div>

                    @endforeach

                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 ml-auto">
                <form action="/addreview/{{$article->id}}" method="post">
                    {{csrf_field()}}
                    <div class="form-row ml-auto">
                        @if(Auth::User()->desig_id != 4)
                        <a href="/rewrite/{{$article->id}}" class="btn btn-warning ml-auto btt">Re-Write</a>
                        @endif
                        <input type="submit" class="btn btn-primary btt" value="Save Review">
                        @if($article->status == 0)
                        <a href="/approve/{{$article->id}}" class="btn btn-success btt">Approve Article</a>

                        @else
                        <a href="/unapprove/{{$article->id}}" class="btn btn-danger btt">Un-Publish Article</a>

                        @endif
                    </div>
                    <div class="form-row ml-auto" style="margin-top:20px">
                        <label for="">Feedback | Request</label>
                        <textarea name="review" id="review" cols="30" rows="4" class="form-control"
                            placeholder="Type your Note here"></textarea>
                    </div>
                    <div class="form-row ml-auto" style="margin-top:20px">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Not Completed</option>
                            <option value="1">Completed</option>
                        </select>

                    </div>
                    <a href="" id="updatefor"></a>
                </form>
                @if(count($review)>0)
                <div class="form-group rvbox">
                    <label for="">Previous Reviews</label>
                    @foreach($review as $rev)
                    @if($rev->note != "")
                    <div class="revtxt">
                        {{$rev->note}} - {{$rev->created_at}} - <a href="/deletereview/{{$rev->id}}"><span
                                style="color:#f00">Remove</span></a>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
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


</script>