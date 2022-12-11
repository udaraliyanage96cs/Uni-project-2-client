<div class="herohead">
    <h3>NEW MEETING</h3>
</div>
<div id="contentbox">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Add Meeting </h3>
                <form action="/addmeetings" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="formlable">Meeting Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Meeting Name" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Meeting Link (Optional)</label>
                        <input type="text" name="url" id="url" placeholder="Enter URL" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="formlable">Discription (Optional)</label>
                        <textarea name="discr" id="discr" cols="30" rows="5"  class="form-control"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="">Start Date</label>
                        <input type="date" name="date" id="date" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save" id="subtn">
                    </div>
                </form>
            </div>
            <div class="col-lg-5 ml-auto">
               <div class="row">
               <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23F6BF26&ctz=Asia%2FColombo&src=bGR1ZGFyYWxpeWFuYWdlQGdtYWlsLmNvbQ&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%230B8043&showTitle=0" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
               </div>
            </div>
        </div>
    </div>
</div>