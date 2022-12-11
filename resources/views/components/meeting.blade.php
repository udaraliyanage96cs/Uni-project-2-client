<div class="herohead">
    <h3>MEETINGS</h3>
</div>
<div id="contentbox">
    <div class="container">

        <div class="form-group">
            <a href="/addmeeting" class="btn btn-success">Add New Meeting</a>
        </div>
        <div class="form-group">
            <div class="form-row">
                <input id="myInput" type="text" placeholder="Search.." class="form-control col-lg-11 mobser2">
                <div class="col-lg-1 mobser2"><i class="fas fa-search" id="schicon"></i></div>
            </div>
        </div>

        <div class="row">
            @if($meeting)
                @foreach($meeting as $meet)
                <div class="col-md-4">
                <div class="card card-primary card-outline direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$meet->name}}</h3>

                        <div class="card-tools">
                            @if(Auth::User()->id == $meet->user_id)
                                <a href="/deletemeeting/{{$meet->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            
                        </div>
                    </div>
                    <div class="card-body">

                        <p class=""><a href="{{$meet->url}}" target="_blank">{{$meet->url}}</a></p>
                        <div class="textbox" id="textbox-{{$meet->id}}">{{$meet->content}}</div>
                        <p class="">Meeting Date - {{$meet->mdate}}</p>
                        <p class="">Created Date- {{$meet->created_at}}</p>
                        <div class="show-more">
                            <a id="showbtn-{{$meet->id}}" class="showbtn" onclick="showbox({{$meet->id}})">Show more</a>
                            <a id="hidebtn-{{$meet->id}}" class="hidebtn" onclick="hidebox({{$meet->id}})">Hide Text</a>
                        </div>

                    </div>
                </div>
            </div>
                @endforeach
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
            $("#allstdtable .trow").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    function showbox(element){
        $("#textbox-"+element).addClass("showContent");
        $("#showbtn-"+element).hide();
        $("#hidebtn-"+element).show();
    }
    function hidebox(element){
        $("#textbox-"+element).removeClass("showContent");
        $("#showbtn-"+element).show();
        $("#hidebtn-"+element).hide();
    }
</script>