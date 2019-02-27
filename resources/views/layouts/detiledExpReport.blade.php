@extends('layouts.userpage')
@section('usercontect')

<div class="container" >
    <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-10">
                <div class="tab-content tabs">
                        <!-- <h3>Section 1</h3> -->
                        <div  id="Section2" align="center">
                          <div  id="rstable" style="padding:40px;background-color:white;border:solid 1px #LightGray;">
                                <div class="content1" name="resulttablen" style="" >
                                  <form class="form-inline" >

                                    <div class="form-group">
                                          <label for="From">From:</label>
                                          <input type="text" name="from_date" autocomplete="off" id="from_date" placeholder="Select from date"class="form-control" >
                                        </div>
                                        <div class="form-group">
                                              <label for="to">To:</label>
                                              <input type="text" name="to_date" autocomplete="off"id="to_date" placeholder="Select to date"class="form-control" >
                                            </div>

                                            <div class="form-group">
                                              <button type="button" class="btn btn-primary" id="expdate">OK</button>
                                            </div>

                                        </form>

</div>
</div>
</div>

<div  id="Section1">
  <div class="content1" name="resulttablen">
  <div id="expdatereport" >


  </div>
   </div>
    </div>

</div>
</div>
<div class="col-md-1"></div>

</div>
</div>

<script>
$('#from_date').datetimepicker({
  format:"{!! session('dateformat1') !!}"
});
$('#to_date').datetimepicker({
  format:"{!! session('dateformat1') !!}"
});
$('#from_date').val(getTodayDate());
$('#to_date').val(getTodayDate());
$('#Section1').hide();
$('.bodyheader').html('Expense Report-DateWise');
</script>
@endsection
