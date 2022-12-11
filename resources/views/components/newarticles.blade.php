<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>


<?php
    use App\Http\Controllers\RevReplyController;
?>
<div class="herohead">
    <h3>NEW ARTICLE</h3>
    @if(isset($Message))
        {{$Message}}
    @endif
</div>
<div id="contentbox">
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="addarticle" onsubmit="return validateform()" name="myForm">
            {{csrf_field()}}
            
            <div class="edttxt">
            <div class="form-row">
                <div class="form-group col-lg-4">
                    <div class="row">
                        <label class="col-lg-1">Title</label>
                        <label class="col-lg-10 ml-auto" style="text-align:right">Charcters Limit - </label>
                        <label class="col-lg-1" id="wcount">@if($arsetting) {{$arsetting->title}} @else 100 @endif</label>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" maxlength="@if($arsetting) {{$arsetting->title}} @else 100 @endif" required>
                </div>
                <div class="form-group col-lg-2">
                    <label for="" class="formlable">Category</label>
                    <select name="catid" id="catid" class="form-control" required>
                        <option disabled>Select A Category</option>
                        <option value="1">Top Stories</option>
                        <option value="2">News</option>
                        <option value="3">Career Opportunities</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <label for="" class="formlable">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option disabled>Select A Type</option>
                        <option value="1">Content Image</option>
                        <!-- <option value="2">Image Content</option> -->
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <label for="" class="formlable">Faculty</label>
                    <select name="fac" id="fac" class="form-control" required>
                        @if($faculty)
                        @foreach($faculty as $fac)
                        <option value="{{$fac->id}}">{{$fac->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <label for="" class="formlable">Department</label>
                    <select name="dept" id="dept" class="form-control" required>
                        @if($department)
                        @foreach($department as $dept)
                        <option value="{{$dept->id}}">{{$dept->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
           
            <div class=""  id="daterow">
                <div class="form-row" >
                    <div class="form-group col-lg-3">
                        <label for="">Start Date</label>
                        <input type="date" name="sdate" id="sdate" class="form-control"> 
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">End Date</label>
                        <input type="date" name="edate" id="edate" class="form-control"> 
                    </div>
                </div>
            </div>
            <div class="" id="master-container" >
                <div class="form-group sortable-container" id="contentdiv">
                    <div class="row">
                        <label for="">Content </label>
                        <label class="col-lg-2" style="text-align:right">Charcters Limit - </label>
                        <label class="col-lg-1" id="contentwcount">0</label>
                    </div>
                    <textarea name="content" id="textcontent" class="form-control" maxlength="20" required></textarea>
                </div>
                <div class="form-group sortable-container" id="attachdiv">
                    <div class="form-group">
                        <label for="">Attach Document</label><br>
                        <input type="file" name="file[]" id="file" multiple class="form-control ">
                        <input type="button" value="Attach Document" id="attdoc" class="btn btn-success">
                        <input type="button" value="Remove All Attach" id="resetattdoc" class="btn btn-danger">
                        <div class="row gallery"></div>
                    </div>
                </div>
            </div>
            
            <div class="form-group col-lg-2 ml-auto" style="display: grid;align-items: flex-end;">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-1 ml-auto" style="display: grid;align-items: flex-end;">
                    <input type="button" value="Preview" class="btn btn-primary" id="previewarticle">
                </div>
                <div class="form-group col-lg-1" style="display: grid;align-items: flex-end;">
                    <input type="button" value="Edit" class="btn btn-primary" id="editarticlenew" >
                </div>
            </div>
            <div class="prvtxt">
                <div id="">
                    <div class="container">
                        <div class="">
                            <div class="co-lg-3">
                                <h3 id="title">
                                    Test Article
                                    <i class="fas fa-check-circle" style="color:yellow"></i>
                                </h3>
                            </div>
                        </div>
                    
                        <span>Author -- 
                            {{Auth::User()->name}}
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
                
                        
                        <div class="form-group articlecontent" id="arcontent">
                        
                        
                        </div>
                        <div class="form-grop articlecontent">
                        
                            <div class="row">
                            
                            </div>
                            <div class="gallery"></div>
                        </div>
                      
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<style>
    .prvtxt{
        display:none;
    }
   
    #file {
        display: none;
    }

    .gallery img {
        width: 150px;
        height: 150px;
        margin-top: 20px;
        margin-right: 20px;
    }
    /* #daterow{
        display: none;
    } */
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>

<script>
   

    $("#resetattdoc").click(function (){
        $("#file").val(null);
        $(".allimgs").remove();
    });


    $('#type').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == 1){
            $('#attachdiv').insertAfter(contentdiv);
        }else if(valueSelected == 2){
            $('#contentdiv').insertAfter(attachdiv);
        }
       
    });
    // $('#master-container').sortable({
    //     items: ".sortable-container",
    //     start: function(event, ui){
    //         var textareaId = ui.item.find('textarea').attr('id');
    //         if (typeof textareaId != 'undefined') {
    //             var editorInstance = CKEDITOR.instances[textareaId];
    //             editorInstance.destroy();
    //             CKEDITOR.remove( textareaId );
    //         }
    //     },
    //     stop: function(event, ui){
    //         var textareaId = ui.item.find('textarea').attr('id');
    //         if (typeof textareaId != 'undefined') {
    //             CKEDITOR.replace( textareaId );
    //         }
    //     }
        
    // });
</script>
<script>
    var charlimit = <?php
        if($arsetting){
            echo $arsetting->content;
        }else{
            echo 1000;
        }
    ?>;
    function validateform() {
        if($("#edate").val() != "" && $("#edate").val() != null){
            console.log("aaaaa");
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = mm + '/' + dd + '/' + yyyy;

            console.log(today);
            date = new Date($('#edate').val());

            var date = new Date($('#edate').val());
            var end_day = date.getDate();
            var end_month = date.getMonth() + 1;
            var end_year = date.getFullYear();

            var enddate_new = end_month+'/'+end_day+'/'+end_year;
            console.log(enddate_new);

            if(end_year>=yyyy && end_month>=mm && end_day >= dd){
                console.log("ok");
            }else{
                console.log("error");
                alert("Invalid Date !!!");
                return false;
            }
        }

        if (CKEDITOR.instances['textcontent'].getData() == "") {
            alert("Content cannot be empty");
            return false;
        }else{
            var content = CKEDITOR.instances['textcontent'].getData();
            var ccount = stripHtml(content)-1;
            if(charlimit < ccount){
                alert("Please Check your content charecter limit again. You cannot exceed "+charlimit+" count of charecters");
                return false;
            }else{
                alert("Your article has been successfully submitted");
                return true;
            }
        }

        
        
    }

    $('#edate').on('change', function (e) {
        // var today = new Date();
        // var dd = String(today.getDate()).padStart(2, '0');
        // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        // var yyyy = today.getFullYear();
        // today = mm + '/' + dd + '/' + yyyy;

        // console.log(today);
        // date = new Date($('#edate').val());

        // var date = new Date($('#edate').val());
        // var end_day = date.getDate();
        // var end_month = date.getMonth() + 1;
        // var end_year = date.getFullYear();

        // var enddate_new = end_month+'/'+end_day+'/'+end_year;
        // console.log(enddate_new);

        // if(end_year>=yyyy && end_month>=mm && end_day >= dd){
        //     console.log("ok");
        // }else{
        //     console.log("error");
        // }
    });

    CKEDITOR.replace('content');
    // CKEDITOR.replace( 'content', {
    //     extraPlugins: 'divarea'
    // });
    CKEDITOR.editorConfig = function (config) {
        config.height = '800px';
        config.wordcount = {
            showCharCount: true,
            maxCharCount: 200,
        };
        config.extraPlugins = "wordcount,notification";
    }
   
    // CKEDITOR.instances.content.on( 'key', function() {
    //     var str = CKEDITOR.instances.content.getData();
    //     if (str.length > 1000) {
    //         CKEDITOR.instances.content.setData(str.substring(0, 1000));
    //     }
    // } );
   // CKEDITOR.instances.content.wordCount.charCount 

</script>
<script>
    $("#editarticlenew").hide();
    $("#attdoc").click(function () {
        $("#file").click();
    });
    $(function () {
        var imagesPreview = function (input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                let j = 0;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        let htm = '';
                        
                        htm += '<div class="col-lg-3 allimgs imgid-'+j+'">';
                        htm += '<div class="">';
                        htm += '<img class="imgidim-'+j+'" src="'+event.target.result+'">';
                        htm +='</div>';
                        htm += '<input type="button" class="btn btn-danger" value="Remove" onclick="remimg('+j+')">';
                        htm +='</div>';
                        $($.parseHTML(htm)).appendTo(placeToInsertImagePreview);
                        j++;
                        // $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        // $($.parseHTML('<div>')).attr('style',"width:150px;height:150px;background-color:#fff").appendTo(placeToInsertImagePreview);

                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#file').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });
    $("#name").keyup(function(){
        var count = $("#name").val().length;
        var tccounts = <?php
            if($arsetting){
                echo $arsetting->title;
            }else{
                echo 100;
            }
        ?>;
        $("#wcount").text(tccounts-count);
        if(count == 100){
            $("#name")
        }
       // console.log(count);
    });

                
    CKEDITOR.instances['textcontent'].on('change', function() { 
        CKEDITOR.instances['textcontent'].updateElement() ;
        var content = CKEDITOR.instances['textcontent'].getData();
        var ccount = stripHtml(content)-1;
        $("#contentwcount").text(ccount);
    });
                


    function stripHtml(html){
        var temporalDivElement = document.createElement("div");
        temporalDivElement.innerHTML = html;
        return temporalDivElement.textContent.length || temporalDivElement.innerText.length || "";

    }

    $("#previewarticle").click(function (){
        $(".prvtxt").show();
        $(".edttxt").hide();
        $("#title").text($("#name").val());
       
        $("#previewarticle").hide();
        $("#editarticlenew").show();
        $("#editarticlenew").css('grid','block !important');
      

      //  let content = document.forms["myForm"]["content"].value;
        var content = CKEDITOR.instances['textcontent'].getData();
        $("#arcontent").html( content) ;
    });
    $("#editarticlenew").click(function (){
        $(".prvtxt").hide();
        $(".edttxt").show();
        $("#previewarticle").show();
        $("#editarticle").hide();
        $("#editarticlenew").hide();
    });

    // $("#catid").change(function () {
    //     var opt = this.value;
    //     if(opt == 2){
    //         $("#daterow").show();
    //     }else{
    //         $("#daterow").hide();
    //     }
    // });

    function remimg(id){
        console.log(id);
        $(".imgid-"+id).remove();
        console.log($("#file").val());
    }
    
    
</script>
