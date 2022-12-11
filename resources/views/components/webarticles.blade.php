<div class="herohead">
    <h3>PUBLICATIONS</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="row">
            @if($article)
                @foreach($article as $art)
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