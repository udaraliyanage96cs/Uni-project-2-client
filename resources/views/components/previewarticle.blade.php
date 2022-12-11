
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
                    <i class="fas fa-check-circle" style="color:yellow"></i>
                </h3>
            </div>
            
        </div>
        <?php
            $usersnames = RevReplyController::getUserNames(Auth::user()->id);
            $job = RevReplyController::getJobName(Auth::user()->id);
        ?>
        <span>Author -- 
            {{$Auth::user()->name}} 
        </span><br>
        <span>Department -- 
                <?php
                    $dptname = RevReplyController::getDeptName(Auth::user()->id);
                ?>
                {{$dptname->name}} 
        </span><br>
        <span>Faculty -- 
                <?php
                    $faculty = RevReplyController::getFacName(Auth::user()->id);
                ?>
                {{$faculty->name}} 
        </span>

        
        <div class="form-group articlecontent">
        
        {!! $article->content !!}
        </div>
        <div class="form-grop articlecontent">
        
            <div class="row">
            
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
    // CKEDITOR.replace('revcontent');
    // CKEDITOR.editorConfig = function( config ){
    //     config.height = '800px';
    // }
    
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
function showform(id){
    $("#formtag-"+id).show();
}
$("#replybtn").click(function (){

});
</script>
<style>
    #file{
        display:none;
    }
</style>