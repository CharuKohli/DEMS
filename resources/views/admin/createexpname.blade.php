@extends('layouts.userpage')
@section('usercontect')
<div class="container">

           <div class="row">
         <div class="col-md-1"></div>
        <div class="col-md-10">

        <button onclick="tab1()" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-plus-sign"> Create</span></button>
          <button onclick="tab2()"  class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-eye-open"> View</span></button>

<div id="Section1" style="border:solid 1px black">
  <br>
  <div class="content1" name="resulttablen" style="" >
                          <form method="post" class="form-horizontal" id="expName" >
                            {{csrf_field()}}
                              <div class="form-group">
                                  <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Expense name<font color="red"> *</font> </label>
                                  <div class="col-md-7 col-sm-10">
                                    <input type="text" class="form-control" autocomplete="off" id="expname" placeholder="Enter Expense Name"  name="exp_name" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Due Date</label>
                                  <div class="col-md-7 col-sm-10">
                                    <input type="text"  id="datePicker" autocomplete="off" placeholder="Select Date" class="form-control" name="due_date" >
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Created for<font color="red"> *</font></label>
                                  <div class="col-md-7 col-sm-10">
                                    <input type="radio"  checked name="category" value="general" required>General
                                    <input type="radio" name="category" value="user" required>User                                  </div>
                              </div>
                              <div class="form-group" id="userloc" style="display:none">
                                  <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Select user</label>
                                  <div class="col-md-7 col-sm-10">
                                    <select class="form-control" name="for_whom" id="for_whom">
                                     <option disabled selected vlaue="">--Select User Id--</option>

                                    </select>                              </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2"></label>
                                  <div class="col-md-7 col-sm-10">
                                    <center>
                                       <button type="reset" class="btn btn-warning">New</button>
                                    <button type="submit" class="btn btn-info " value="Save" id="btnexpname">Save</button>
                                    <button type="button" onclick="location.href='{{ url('dashboard') }}'" class="btn btn-primary">Cancel</button> </center>
                                  </center>
                                  </div>
                              </div>

                            </form>
                        </div>
                      </div>
                        <div id="Section2" style="border:solid 1px black" >
                          <div class="content1" name="resulttablen">
                               <div id="expensenames">

                          </div>
                            </div>

                        </div>
                        </div>
                        <div class="col-md-1"></div>
                        </div>
                        </div>




<script>
$('#datePicker').datetimepicker({
    format:"{!! session('dateformat1') !!}"
  });
  $('#userloc').hide();
var $radios = $('input[name="category"]');
$radios.change(function() {
  var $checked = $radios.filter(function() {
    return $(this).prop('checked');
  }).val();
  if($checked=="user"){
    $('#userloc').show();
    $('#userloc').css('display','block');
  }
  if($checked=="general"){
    $('#userloc').hide();
  }
});
getUserids();
function getUserids(){
$.ajax({
       method:'get',
        url:'getuserids',
        success:function(data){
          for(var i=0;i<data.userids.length;i++){
              $('#for_whom').append('<option value='+'"'+data.userids[i].user_id+'"'+'>'+data.userids[i].user_id+'</option>');
            }
          }
});
}

$('#Section2').hide();
function tab1(){
$('#Section1').show();$('#Section2').hide();
}

function tab2(){
$('#Section2').show();$('#Section1').hide();
$('#btnexpname').html('Save');
$('#btnexpname').val('Save');
dispExpNames();
}
function dispExpNames(){
  $.ajax({
         method:'get',
          url:'dispexpnames',
          dataType: 'json',
          success:function(data){
           $('#expensenames').html(data.html);
          }
        });
}


$('.bodyheader').html('Expense Name');

</script>
@endsection
