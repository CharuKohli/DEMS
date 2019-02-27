<div class="container">

           <div class="row">
         <div class="col-md-1"></div>
        <div class="col-md-10">

        <button onclick="tab1()" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-plus-sign"> Create</span></button>
          <button onclick="tab2()"  class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-eye-open"> View</span></button>

<div id="Section2" style="border:solid 1px black">
  <!-- <div class="content1" name="resulttablen"> -->
<div id="userexp">

<!-- </div> -->
</div>
</div>
          <div  id="Section1"style="border:solid 1px black" >
            <br>
            <div class="content1" name="resulttablen" style="" >
              <form class="form-horizontal" id="expensetrans">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="exampleInputFirstName2">Select Financial Year<font color="red"> *</font></label>
                    <div class="col-md-5">
                      <select name="fiscalyearlist" class="form-control" >
                     </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="exampleInputLastName2">Transaction No.<font color="red"> *</font> </label>
                    <div class="col-md-5">
                      <!-- <input type="text" class="form-control" name="transnumexplist" disabled> -->
                      <select name="transnumexplist" class="form-control" >

                     </select>

                    </div>
                </div>
                                        <div class="form-group">

                                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Expense Name<font color="red"> *</font></label>
                                            <div class="col-md-5">
                                            <select name="expensenamelist" id="expensenamelist" class="form-control dummyInline" required>
                                            </select>
                                              </div>
                                            <a href="#" data-toggle="tooltip" class="white-tooltip" data-placement="right" title="For custom expense name contact admin or raise ticket" >  <span class="glyphicon glyphicon-info-sign dummyInline" style="margin-top:10px"></span></a>
                                         </div>

                                        <!-- <div class="form-group">
                                            <label class="col-md-4 control-label" for="exampleInputLastName2">Company/Person<font color="red"> *</font></label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control"autocomplete="off" name="person_name" placeholder="Enter Company/Person">
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Paid Towards<font color="red"> *</font></label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" autocomplete="off"name="paid_towards" placeholder="Enter Paid Towards" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Paid Amount<font color="red"> *</font></label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control"autocomplete="off" name="paid_amt" placeholder="Enter Paid Amount" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Date of Payment<font color="red"> *</font></label>
                                            <div class="col-md-5">
                                              <input type="text" class="form-control" autocomplete="off"name="payment_date" id="paymentdate" placeholder="Enter date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Upload Voucher</label>
                                            <div class="col-md-5">
                                              <input type="file"  autocomplete="off"name="exp_bill" id="exp_bill">
                                             <span id="invalidfile"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="exampleInputFirstName2">Remarks</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control"autocomplete="off" name="remarks" placeholder="Enter Remarks">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="optradio">Payment mode </label>
                                            <div class="col-md-7">
                                              <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel0" value='cash' checked>Cash
                                      </label>
                                      <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel1" onclick="$('#bank_name').val(null)"value='cheque'>Cheque
                                      </label>
                                      <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel2" onclick="$('#bank_name').val(null)" value='debit'>Debit Card
                                      </label>
                                      <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel3" onclick="$('#bank_name').val(null)" value='credit'>Credit Card
                                      </label>
                                      <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel4" onclick="$('#bank_name').val(null)"  value='online'>Online Payment
                                      </label>
                                      <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel5" onclick="$('#bank_name').val(null)"  value='paytm'>Paytm
                                      </label>
                                      <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sel6" onclick="$('#bank_name').val(null)"  value='freecharge'>FreeCharge
                                      </label>
                                            </div>
                                        </div>

                                        <div id="bank">
                                          <div class="form-group" >
                                                           <label class="control-label col-sm-4">Bank Name<font color="red"></font></label>
                                                 <div class="col-sm-6">
                                                   <input type="text" class="form-control"  autocomplete="off"placeholder="Enter Bank Name" id="bank_name" name="bank_name" >

                                                 </div>

                                                </div>
                                        </div>
            <div id="chequesec">
            <div class="form-group" >
            <label class="control-label col-sm-4" for="email">Cheque No.<font color="red"></font></label>
            <div class="col-sm-6">
            <input type="text" class="form-control"  placeholder="Enter Cheque No." autocomplete="off" name="cheq_num">
            </div>
            </div>
            <div class="form-group" >
            <label class="control-label col-sm-4" for="name"> Cheque Date</label>

            <div class="col-sm-6">

            <input type="text" class="form-control" name="cheq_date" autocomplete="off"id="cheqdate"placeholder="Enter date">

            </div>
            </div>
            </div>



            <div id="debitsec">
            <div class="form-group" id="debit">
            <label class="control-label col-sm-4" for="email">Debit Card No.<font color="red"></font></label>
            <div class="col-sm-6">
            <input type="text" class="form-control" autocomplete="off" placeholder="Enter Debit Card No."  name="debit_no">
            </div>
            </div>
            </div>

            <div id="creditsec">
            <div class="form-group" id="credit">
            <label class="control-label col-sm-4" for="email">Credit Card No.<font color="red"></font></label>
            <div class="col-sm-6">
            <input type="text" class="form-control" autocomplete="off" placeholder="Enter Credit Card No." name="credit_no" >
            </div>
            </div>
            </div>

            <div id="onlinesec">
            <div class="form-group">
            <label class="control-label col-sm-4" for="email">IFSC Code<font color="red"></font></label>
            <div class="col-sm-6">
            <input type="text" class="form-control" autocomplete="off" placeholder="Enter IFSC Code" name="ifsc" >
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-4" for="email">Account No.<font color="red"></font></label>
            <div class="col-sm-6">
            <input type="text" class="form-control"autocomplete="off"  placeholder="Enter Account No." name="account_no">
            </div>
            </div>
            </div>

                                        <div class="form-group" hidden>
                                            <label class="col-md-4 control-label" >IId</label>
                                            <div class="col-md-5">
                                                <input type="text"autocomplete="off" class="form-control" name="iid" placeholder="Enter Remarks">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                         <center>
                                            <button type="button" id="newform"class="btn btn-warning">New</button>
                                         <button type="submit" class="btn btn-info" value="Save" id="btnexpense">Save</button>
                                         <!-- <button type="button" id="deleteExpTrans" class="btn btn-danger">Delete</button> -->

                                       <button type="button" onclick="location.href='{{ url('dashboard') }}'" class="btn btn-primary">Cancel</button> </center>

                                        </div>
                                        </div>  </div>  </div>
                                        <div class="col-md-1"></div>

                                       </div>



    </div>
  <!-- </div>
</div> -->
<!-- </div> -->


<script>
$('#newform').click(function(){
  $('select[name="expensenamelist"]').append('<option value="" selected >'+'--Select Expense Name--' +'</option>');
  $('input[name=person_name]').val(null);
  $('input[name=paid_towards]').val(null);
  $('input[name=paid_amt]').val(null);
  $('input[name=remarks]').val(null);
  $('input[name=bank_name]').val(null);
  $('input[name=ifsc]').val(null);
  $('input[name=credit_no]').val(null);
  $('input[name=debit_no]').val(null);
  $('input[name=cheq_num]').val(null);
  $('input[name=cheq_date]').val(null);
  $('input[name=account_no]').val(null);
});
exp_transaction_num();
function exp_transaction_num(){
  $.ajax({
      method:'get',
      url:'gettransnums',
      success:function(data){
        //console.log(data.expenses);
        var len=(data.expenses.length);
        //alert(len);
        if(len==0){

          $('select[name="transnumexplist"]').append('<option value="'+1+'">'+1+'</option>');

        }else{

           // $('select[name="transnumexplist"]').html(len+1);
           // $('select[name="transnumexplist"]').val(data.expenses[len-1].transaction_no+1);
            $('select[name="transnumexplist"]').empty();
            $('select[name="transnumexplist"]').append('<option value="'+parseInt(parseInt(data.expenses[len-1].transaction_no)+1)  +'" selected >'+(parseInt(len)+1)+'</option>');
          // $('select[name="transnumexplist"]').append('<option value="'+(i+1) +'" >'+(i+1) +'</option>');
          //}
        }
      }
    });
}
getFinYear();
function getFinYear(){
  $.ajax({
      method:'get',
      url:'finyear',
      success:function(data){
        for(var i=0;i<data.finyears.length;i++){
        $('select[name="fiscalyearlist"]').append('<option value="'+data.finyears[i].fin_year +'" selected >'+data.finyears[i].fin_year +'</option>');
        }
      }
    });
}
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

$('#cheqdate').datetimepicker({
  format:"{!! session('dateformat1') !!}"
});
$('#paymentdate').datetimepicker({
  format:"{!! session('dateformat1') !!}"
});
$('#cheqdate').val(getTodayDate());
$('#paymentdate').val(getTodayDate());
$(document).ready(function(){
$('#chequesec').hide();
  $('#debitsec').hide();
  $('#creditsec').hide();
  $('#onlinesec').hide();
  $('#bank').hide();
  $('input[type="radio"]').click(function(){
       var inputValue = $(this).attr("value");
       if(inputValue == "cash"){
         $('#chequesec').hide();
         $('#debitsec').hide();
         $('#creditsec').hide();
         $('#onlinesec').hide();
         $('#bank').hide();
       }else if(inputValue == "cheque"){
         $('#chequesec').show();
         $('#bank').show();
         $('#debitsec').hide();
         $('#creditsec').hide();
         $('#onlinesec').hide();
       }else if(inputValue == "credit"){
         $('#chequesec').hide();
         $('#debitsec').hide();
         $('#creditsec').show();
         $('#bank').show();
         $('#onlinesec').hide();
       }else if(inputValue == "debit"){
         $('#chequesec').hide();
         $('#debitsec').show();
         $('#bank').show();
         $('#creditsec').hide();
         $('#onlinesec').hide();
       }else if(inputValue == "online"){
         $('#chequesec').hide();
         $('#debitsec').hide();
         $('#creditsec').hide();
         $('#onlinesec').show();
         $('#bank').show();

       }
     });
   });

   $('#Section2').hide();
function tab1(){
$('#Section1').show();$('#Section2').hide();
exp_transaction_num();
}

function tab2(){
  $('#Section2').show();$('#Section1').hide();
  $('#btnexpense').html('Save');
  $('#btnexpense').val('Save');
  $('#expensetrans')[0].reset();
  exp_transaction_num();
  getFinYear();
  dispExpenses();
}
function dispExpenses(){
  $.ajax({
         method:'get',
          url:'dispuserexpenses',
          dataType: 'json',
          success:function(data){
            //alert(data.html);
           $('#userexp').html(data.html);
          }
        });
}

</script>
