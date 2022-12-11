<div class="herohead">
    <h3>DASHBOARD</h3>
</div>
<div id="contentbox">
    <div class="container">
        <h3>Notifications</h3><br>
        <div class="row">
            
            @foreach($alogs as $log)
            <div class="col-12 col-sm-6 col-md-3">
                <a href="/viewarticle/{{$log->glob_id}}">
                    <div class="info-box" style="background-color:#343a40;color:#fff">
                        <span class="info-box-icon bg-info elevation-1"><i class="far fa-bell"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{$log->type}}</span>
                            <span class="info-box-number">
                                {{$log->created_at}}
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @if(Auth::User()->desig_id == 0)
        <div class="col-lg-4" style="pdding:0 !important;margin:0 0 50px">
            <h3>Total Amount of Articles</h3>
            <table class="table" id="allstdtable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Article Category</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                       <td>Top Stories</td>
                       <td>{{$top_stories}}</td>
                   </tr>
                   <tr>
                       <td>News</td>
                       <td>{{$news}}</td>
                   </tr>
                   <tr>
                       <td>Career Opertunities</td>
                       <td>{{$career}}</td>
                   </tr>
                   <tr>
                       <td>Total</td>
                       <td>{{$total}}</td>
                   </tr>
                
                </tbody>
            </table>
        </div>
        @endif


        @if($article)
        <h3>Recent Articles</h3><br>
        @endif
        <div class="row">
            @if($article)
            @foreach($article as $art)
                <?php
                    $time = strtotime($art->enddate);
                    $newformat = date('Y-m-d',$time);
                ?>
                @if($newformat >= $today)
                    
                    <div class="col-lg-3 ">
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
                @endif
            @endforeach
            @endif
        </div>
        @if($meeting && Auth::User()->desig_id == 1 && Auth::User()->desig_id == 6)

        <h3>Recent Meetings</h3><br>

        <div class="row">
                @foreach($meeting as $meet)
                <div class="col-md-4" >
                <div class="card card-primary card-outline direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$meet->name}}</h3>

                        <div class="card-tools">
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