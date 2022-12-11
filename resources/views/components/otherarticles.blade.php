
<div class="herohead">
    <h3>USER'S ARTICLE</h3>
</div>
<div id="contentbox">
    <div class="container">
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
                       <td>Other</td>
                       <td>{{$other}}</td>
                   </tr>
                
                </tbody>
            </table>
        </div>

        <div class="row">
            @if($aorticle)
                @foreach($aorticle as $art)
                <?php
                    $time = strtotime($art->enddate);
                    $newformat = date('Y-m-d',$time);
                ?>
                @if(1)
                    <div class="col-lg-3 ">
                        <a href="/viewarticleadmin/{{$art->id}}" class="grdanchor">
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
                                    <p>
                                        @if($art->category_id == 1)
                                            Top Stories
                                        @elseif($art->category_id == 2)
                                            News
                                        @else
                                            Career Opportunities
                                        @endif
                                    </P>
                                </div>

                                <div class="icon">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                                <div class="small-box-footer">Read More <i class="fas fa-arrow-circle-right"></i></div>
                            </div>
                        </a>
                    </div>
                @endif


                <!-- <div class="col-lg-3 ">
                    <a href="/viewarticleadmin/{{$art->id}}" class="grdanchor">
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
                </div> -->
                @endforeach
            @endif
        </div>
    </div>
</div>