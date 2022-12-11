<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PDF</title>
</head>

<body>
    <?php
        use App\Http\Controllers\RevReplyController;
    ?>
    <script src="https://cdn.ckeditor.com/4.16.1/basic/ckeditor.js"></script>

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


            @if($article->type == 1)
            <div class="form-group articlecontent">
                {!! $article->content !!}
            </div>

            <div class="form-grop articlecontent">
                <div class="row">

                    @foreach($contimage as $imgs)
                    <div class="col-lg-3">
                        <div class="imgs" style="width: 25%;">
                            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('/uploads/images/'.$articleid.'/'.$imgs->url)))}} "
                                alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @else


            <div class="form-grop articlecontent">
                <div class="row">
                    @foreach($contimage as $imgs)
                    <div class="col-lg-3" style="width: 25%;">
                        <div class="imgs">
                            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('/uploads/images/'.$articleid.'/'.$imgs->url)))}} "
                                alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group articlecontent">
                {!! $article->content !!}
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

        .herohead {
            height: 150px;
            width: 100%;
            background-color: violet;
            color: #fff;
            display: grid;
            align-items: center;
            justify-content: center;
        }

        #contentbox {
            padding: 100px 0;
        }

        .articlecontent {
            margin-top: 50px;
        }

        .imgs img {
            width: 100%;
            height: 150px;
            margin-top: 20px;
            object-fit: cover;
            cursor: pointer;
        }
    </style>

</body>

</html>