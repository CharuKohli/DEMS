
<div class="container">

           <div class="row">
         <div class="col-md-1"></div>
        <div class="col-md-10">
@if(null==session('authuser'))
        <button onclick="tab1()" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-plus-sign"> Create</span></button>
          <button onclick="tab2()"  class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-eye-open"> View</span></button>

    <div  id="Section1" class="form-horizontal" style="border:solid 1px black">
            <br>
            <div class="content1" name="resulttablen" style="" >
              <form method="post" action="" id="userticket">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Expense Name</label>
                    <div class="col-md-7 col-sm-10">
                      <select name="expensenamelist" id="expensenamelist" class="form-control" required>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Date</label>
                    <div class="col-md-7 col-sm-10">
                      <input type="text" class="form-control"autocomplete="off" id="ticketdate" name="date" placeholder="Enter date" required>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Location</label>
                    <div class="col-md-7 col-sm-10">
                      <input type="text" class="form-control"autocomplete="off" id="location" name="location" placeholder="Enter location" required>
                  </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2">Description</label>
                    <div class="col-md-7 col-sm-10">
                      <textarea  class="form-control"autocomplete="off" id="description" name="description" placeholder="Enter Remark" required></textarea>
                  </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 col-sm-2 control-label" for="exampleInputFirstName2"></label>
                    <div class="col-md-7 col-sm-10">

                   <center>       <button type="reset" class="btn btn-warning">New</button>
                   <button type="submit" class="btn btn-info" value="Save" id="btnticket">Save</button>

                  <a href="{{ url('dashboard') }}"> <button type="button" class="btn btn-primary">Cancel</button></a>
               </center>

                  </div>
                </div>
              </form>
            </div>
          </div>
          <div id="Section2"style="border:solid 1px black">
            <div class="content1" name="resulttablen">
          <div id="usertickets">

          </div>
          </div>
          </div>
          @else
          <div style="border:solid 1px black">
            <div class="content1" name="resulttablen">
          <div id="usertickets2">

          </div>
          </div>
          </div>
          @endif


        </div>
        <div class="col-md-1"></div>

      </div>
</div>

<script>
$('#ticketdate').datetimepicker({
  format:"{!! session('dateformat1') !!}"
});
$('#ticketdate').val(getTodayDate());
getExpenseNames();
function getExpenseNames(){
  $.ajax({
      method:'get',
      url:'getexpnames',
      success:function(data){
        $('select[name="expensenamelist"]').append('<option value="" selected >'+'--Select Expense Name--' +'</option>');
        for(var i=0;i<data.expnames.length;i++){
        $('select[name="expensenamelist"]').append('<option value="'+data.expnames[i].exp_name +'" >'+data.expnames[i].exp_name +'</option>');
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
$('#btnticket').html('Save');
$('#btnticket').val('Save');
$('#userticket')[0].reset();
dispTickets();
}
dispTickets();

function dispTickets(){
$.ajax({
      method:'get',
       url:'dispusertickets',
       dataType: 'json',
       success:function(data){
         //alert(data.html);
        $('#usertickets').html(data.html);
         $('#usertickets2').html(data.html);
       }
     });
}

</script>
