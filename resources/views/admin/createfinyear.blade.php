@extends('layouts.userpage')
@section('usercontect')

<br>
<div class="container" >
    <div class="row">
      <div class="col-md-2"></div>
        <div class="col-md-8">

                    <form class="form-horizontal" id="fyear">
                      <div class="form-group">
                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Financial Year</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" required name="fin_year" id="fin_year"placeholder="Enter finacial year">
                                <div class="errmsg"></div>
                            </div>
                        </div>

                        <div class="form-group">

                         <center>       <button type="reset" class="btn btn-warning">New</button>
                         <button type="submit" id="btnfyear" value="Save" class="btn btn-info">Add Finacial Year</button>
                        <button type="button" onclick="location.href='{{ url('dashboard') }}'" class="btn btn-primary">Cancel</button> </center>

                        </div>
                    </form>

                    <div class="forn-group">
                      <label class="col-md-4"></label>
                      <div class="col-md-5">

                        <select class="form-control" multiple="multiple" id="fin_years" name="fin_years">
                            </select>
                      </div>

                    </div>



                    </div>
                    <div class="col-md-2"></div>

                </div>
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6" style="text-align:center;margin-top:10%"><b>NOTE:</b> Financial year format should be xxxx-xx . EX: 2019-20</div>
                  <div class="col-md-3"></div>
                </div>



              </div>
<script>
getFinyears();
function getFinyears(){
  $.ajax({
         method:'get',
          url:'dispfinyears',
          dataType: 'json',
          success:function(data){
          //  alert(data.finyears.length);
            $('select[name="fin_years"]').empty();
            for(var i=0;i<data.finyears.length;i++){
        $('select[name="fin_years"]').append('<option>'+data.finyears[i].fin_year +'</option>');
      }
          }
        });
}
currentFinYear();
function currentFinYear(){
  var d = new Date();
    var n = d.getFullYear();
   var tt=n.toString();
   var n2=parseInt(tt.substr(2,3))+1;
var curfinyear= n+"-"+n2;
$('input[name=fin_year]').val(curfinyear);
}


$('.bodyheader').html('Finacial Year');

</script>
@endsection
