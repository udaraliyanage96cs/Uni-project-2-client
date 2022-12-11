<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<div class="herohead">
    <h3>RE-WRITE ARTICLE</h3>
</div>
<div id="contentbox">
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="/rewritearticle/{{$article->id}}">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-lg-8">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$article->name}}">
                </div>
                
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" class="form-control">{{$article->content}}</textarea>
            </div>
            <div class="form-grop articlecontent">
        
            <div class="row">
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
            <div class="form-group">
                <div class="form-group" >
                    <label for="">Attach Document</label><br>
                    <input type="file" name="file[]" id="file" multiple  class="form-control ">
                    <input type="button" value="Attach Document" id="attdoc" class="btn btn-success">
                    <div class="gallery"></div>
                </div>
            </div>
            <div class="form-group col-lg-2 ml-auto" style="display: grid;align-items: flex-end;">
                <input type="submit" value="Publish" class="btn btn-success"> 
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.editorConfig = function( config ){
        config.height = '800px';
    }
</script>
<script>
    $("#attdoc").click(function () {
        $("#file").click();
    });
    $(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#file').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
<style>
    #file{
        display: none;
    }

    .gallery img{
        width:150px;
        height:150px;
        margin-top:20px;
        margin-right:20px;
    }
</style>