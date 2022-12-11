<?php
    use App\Http\Controllers\RevReplyController;
?>
<script src="https://cdn.ckeditor.com/4.16.1/basic/ckeditor.js"></script>
<div class="herohead">
    <h3>{{$article->name}}</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="row">
            <div class="co-lg-3">
                <h3>{{$article->name}}
                    @if($article->status == 1)
                    <i class="fas fa-check-circle" style="color:#00af9c"></i>
                    @else
                    <i class="fas fa-check-circle" style="color:yellow"></i>
                    @endif
                </h3>
            </div>
            @if($article->user_id == Auth::User()->id)
            <div class="col-lg-3 ml-auto" style="text-align:right">
                @if($article->status != 1)
                    <a href="/editarticle/{{$article->id}}" class="btn btn-primary  ml-auto">Edit</a>
                @endif
                <a href="/downloadpdf/{{$article->id}}" class="btn btn-primary  ml-auto">Download</a>
            </div>
            @endif
        </div>
        <?php
            $usersnames = RevReplyController::getUserNames($article->user_id);
            $job = RevReplyController::getJobName($article->user_id);
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
            {{$usersnames->name}} ({{$job->name}})
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
        @if(Auth::User()->desig_id == 5){
            <h5 style="margin-top:50px">URL for this Article :- http://127.0.0.1:8000/viewarticle/{{$article->id}}</h5>
        @endif

        <br>
        <span>Start Date --
            {{$article->startdate}}
        </span>
        <br>
        <span>Expire Date --
            {{$article->enddate}}
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
        @if(Auth::User()->desig_id != 5)
        <div class="form-group reviews">
            <h5>Reviews</h5>

            @foreach($review as $rvrep)
            <?php
                    $replies = RevReplyController::getReplyies($rvrep->id);
                    $usersnames = RevReplyController::getUserNames($rvrep->user_id);
                ?>
            <div class="admrevcmnt  col-lg-10">{{$rvrep->note}}
                <div class="col-lg-12 dtime">{{$usersnames->name}}<br>{{$rvrep->created_at}}</div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="ml-auto " hidden>
                        <a class="ml-auto reactionbtn">Attachments |</a>
                    </div>
                    <div class=" ml-auto col-lg-1 ">
                        <a id="replybtn" onclick="showform({{$rvrep->id}})" class="ml-auto replybtn reactionbtn">
                            Reply</a>
                    </div>

                </div>
            </div>
            @foreach($replies as $rep)

            <div class="revcmnt  col-lg-10 ml-auto">
                <div class="row">
                    <div class="col-lg-9">{{$rep->reply}}</div>
                    <div class="col-lg-3">
                        <div class="row dtdel">
                            <div class="col-lg-8">{{$rep->created_at}}</div>

                            @if(Auth::User()->id == $article->user_id)
                            <div class="col-lg-4">
                                <a href="/deletereply/{{$rep->id}}">
                                    <div class="delbtn"><i class="far fa-trash-alt"></i></div>
                                </a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="form-group formtag" id="formtag-{{$rvrep->id}}">
                <form action="/replyreview/{{$rvrep->id}}/{{$article->id}}" method="post">
                    {{csrf_field()}}
                    <textarea name="revcontent" cols="30" rows="3" class="form-control col-lg-10 ml-auto"></textarea>
                    <input type="submit" value="Reply" class="btn btn-primary ml-auto subbtn">
                </form>
            </div>

            @endforeach
        </div>
        @endif
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script>
    // CKEDITOR.replace('revcontent');
    // CKEDITOR.editorConfig = function( config ){
    //     config.height = '800px';
    // }

</script>
<script>
    $("#attdoc").click(function () {
        $("#file").click();
    });
    $(function () {
        var imagesPreview = function (input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#file').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });
    function showform(id) {
        $("#formtag-" + id).show();
    }
    $("#replybtn").click(function () {

    });
</script>
<style>
    #file {
        display: none;
    }
</style>