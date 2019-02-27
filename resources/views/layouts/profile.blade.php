<br><br>
<div class="container">
    <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-10">

      <h2 style="text-transform: capitalize;" class="dummyInline">{{$profile->name}}</h2>
      @if(session('adminsection'))
      <button class="btn btn-info pull-right editprofile"><span class="glyphicon glyphicon-pencil dummyInline"></span></button>
      @endif
      <h4><span class="glyphicon glyphicon-envelope"></span> {{$profile->email}}</h4>
      <hr>

      <div class="row">
        <div class="col-md-4">
      <h3>User Id </h4>
      <h4><span class="glyphicon glyphicon-user"> {{$profile->user_id}}</span></h5>
      </div>

      <div class="col-md-4">
      <h3>Designation</h4>
      <h4 style="text-transform: capitalize;"><span class="glyphicon glyphicon-briefcase"> {{$profile->designation}}</span></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
    <h3>Location</h4>
    <h4 style="text-transform: capitalize;"><span class="glyphicon glyphicon-map-marker"> {{$profile->location}}</span></h5>
    </div>

    <div class="col-md-4">
    <h3>Mobile No.</h4>
    <h4><span class="glyphicon glyphicon-phone"> {{$profile->mobile}}</span></h5>
    </div>
  </div>

        </div>
        <div class="col-md-1"></div>

      </div>
</div>
<div id="editModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
          <div class="content1" name="resulttablen" style="magin-top:10px;border:solid 1px black" ><br>
                  <form class="form-horizontal" id="userupdate">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Name</label>
                        <div class="col-md-7 col-sm-10">
                          <input id="name" type="text" autocomplete="off" class="form-control" name="name" value="{{$profile->name}}" placeholder="Enter User Name" required  autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Designation</label>
                        <div class="col-md-7 col-sm-10">
                          <input id="designation" type="text" autocomplete="off" class="form-control" value="{{$profile->designation}}" placeholder="Enter Designation"name="designation"  required  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Location</label>
                        <div class="col-md-7 col-sm-10">
                          <input id="location" type="text" autocomplete="off" class="form-control" value="{{$profile->location}}" placeholder="Enter Location" name="location"   required  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Mobile</label>
                        <div class="col-md-7 col-sm-10">
                          <input id="mobile" type="number" autocomplete="off" class="form-control" value="{{$profile->mobile}}" placeholder="Enter Mobile Number" name="mobile"  required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">E-Mail</label>
                        <div class="col-md-7 col-sm-10">
                          <input id="email" type="email" autocomplete="off" class="form-control" value="{{$profile->email}}" placeholder="Enter Email Id"name="email"  required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Password</label>
                        <div class="col-md-7 col-sm-10">
                          <input id="password" type="text" class="form-control" placeholder="Enter Password"name="password" value="{{$profile->password}}" required>
                        </div>
                    </div>
                    <input id="id" type="hidden" class="form-control"name="id" value="{{$profile->id}}" required>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2"></label>
                        <div class="col-md-7 col-sm-10">
                          <center>
                             <button type="submit" class="btn btn-primary" value="Update" id="btnuser">
                                 {{ __('Update User') }}
                             </button>
                           </center>
                           </div>
                       </div>
                     </form>
                   </div>
          </div>
          <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
        </div>
    </div>
  </div>

<script>

$('.editprofile').click(function(){
$('#editModal').modal('show');
});

$('#userupdate').submit(function(e){
  e.preventDefault();
  $.ajax({
 method:'post',
 url:'updateuser',
 data:$('#userupdate').serialize(),
 dataType: 'json',
 success:function(data){
 alert(data.msg);
 $('#userupdate')[0].reset();
 $('#editModal').modal('hide');
 window.location="http://127.0.0.1:8000/profile";
 }
 });
})
</script>
