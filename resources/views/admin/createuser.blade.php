@extends('layouts.userpage')
@section('usercontect')

<div class="container">

           <div class="row">
         <!-- <div class="col-md-1"></div> -->
        <div class="col-md-12">
        <button onclick="tab1()" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-plus-sign"> Create</span></button>
          <button onclick="tab2()"  class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-eye-open"> View</span></button>
<div id="Section2" style="border:solid 1px black">
<div class="content1" name="resulttablen">
<div id="users">

</div>
</div>
</div>
          <div  id="Section1" style="border:solid 1px black">
            <br>
            <div class="content1" name="resulttablen" style="" >
                    <form class="form-horizontal" id="userreg1">
                      {{csrf_field()}}
                      <div class="form-group">
                          <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Name<font color="red"> *</font></label>
                          <div class="col-md-7 col-sm-10">
                            <input id="name" type="text" autocomplete="off" class="form-control" name="name"  placeholder="Enter User Name" required  autofocus>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Designation<font color="red"> *</font></label>
                          <div class="col-md-7 col-sm-10">
                            <input id="designation" type="text" autocomplete="off" class="form-control" placeholder="Enter Designation"name="designation"  required  autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Location<font color="red"> *</font></label>
                          <div class="col-md-7 col-sm-10">
                            <input id="location" type="text" autocomplete="off" class="form-control" placeholder="Enter Location" name="location"   required  autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Mobile<font color="red"> *</font></label>
                          <div class="col-md-7 col-sm-10">
                            <input id="mobile" type="number" autocomplete="off" class="form-control" placeholder="Enter Mobile Number" name="mobile"  required >
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">E-Mail<font color="red"> *</font></label>
                          <div class="col-md-7 col-sm-10">
                            <input id="email" type="email" autocomplete="off" class="form-control" placeholder="Enter Email Id"name="email"  required >
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Password<font color="red"> *</font></label>
                          <div class="col-md-7 col-sm-10">
                            <input id="password" type="text" class="form-control" placeholder="Enter Password"name="password"  required>
                          </div>
                      </div>
                      <input id="id" type="hidden" class="form-control" name="id"  required>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Authorized User<font color="red"> *</font></label>
                            <div class="col-md-7 col-sm-10">
                              <input  type="radio" checked name="authorized" value="0" required> No
                                <input  type="radio"   name="authorized" value="1" required> Yes
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-6"> -->
                                <input id="useroradmin" type="hidden" class="form-control" name="useroradmin" value="0" >
                            <!-- </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2"></label>
                            <div class="col-md-7 col-sm-10">
                              <center>
                                 <button type="reset" class="btn btn-warning">New</button>
                                 <button type="submit" class="btn btn-primary" value="Save" id="btnuser">
                                     {{ __('Create User') }}
                                 </button>
                                <a href="{{ url('dashboard') }}"> <button type="button"  class="btn btn-primary">Cancel</button></a> </center>
                               </center>
                               </div>
                           </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#Section2').hide();
function tab1(){
$('#Section1').show();$('#Section2').hide();
}

function tab2(){
$('#Section2').show();$('#Section1').hide();
$('#btnuser').html('Save');
$('#btnuser').val('Save');
//$('#expensetrans')[0].reset();
// exp_transaction_num();
// getFinYear();
dispUsers();
}
function dispUsers(){
  $.ajax({
         method:'get',
          url:'dispusers',
          dataType: 'json',
          success:function(data){
           $('#users').html(data.html);
          }
        });
}
$('.bodyheader').html('User');

</script>
@endsection
