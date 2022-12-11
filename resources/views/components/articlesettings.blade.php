<div class="herohead">
    <h3>Article Settings</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="col-lg-4">
            <form action="/articlesettingsau" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">Title Max-Char Count</label>
                    <input type="text" name="tccount" id="tccount" class="form-control" @if($arsetting) value="{{$arsetting->title}}" disabled @endif >
                </div>
                <div class="form-group">
                    <label for="">Content Max-Char Count</label>
                    <input type="text" name="cccount" id="cccount" class="form-control"  @if($arsetting) value="{{$arsetting->content}}" disabled @endif >
                </div>
                <div class="form-group">
                    @if($arsetting) 
                    <input type="button" name="edit" id="edit" class="btn btn-primary" value="Edit">
                    <input type="submit" name="updatesetting" id="updatesetting" class="btn btn-success" value="Update">
                    @else
                    <input type="submit" name="addsetting" id="addsetting" class="btn btn-primary" value="Save">
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    #updatesetting{
        display:none;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script>

    $("#edit").click(function (){
        $("#updatesetting").show();
        $("#edit").hide();
        $('#tccount').prop("disabled", false);
        $('#cccount').prop("disabled", false);
    });

</script>
