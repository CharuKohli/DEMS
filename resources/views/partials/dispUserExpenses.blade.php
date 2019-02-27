<div class="table-responsive">
<table class="table table-bordered">
<thead class="thead">
<tr >
<th align="center"><center>Sl.No.</center></th>
<th align="center"><center>User Id</center></th>
<th align="center"><center>Expense Name</center></th>
<th align="center"><center>Amount Paid</center></th>
<th align="center"><center>Payment Date</center></th>
<th align="center"><center>Paid Towards</center></th>
<th align="center"><center>Payment Mode</center></th>
<th align="center"><center>Actions</center></th>
<th align="center"><center>Voucher</center></th>
</tr>
</thead>
<tbody style="font-family:Times New Roman;font-size: 1.7rem;">
@php $i=1;
$dateformat=session('dateformat');
@endphp
@foreach($userexpenses as $expense)
@php $payment_date=date($dateformat,strtotime($expense->payment_date));
     $billpath=$expense->bill_path;
@endphp
<tr style="background-color:white;text-align:justify">
<td>{{$i++}}</td>
<td>{{$expense->user_id}}</td>
<td>{{$expense->expense_name}}</td>
<td>{{$expense->paid_amount}}</td>
<td>{{$payment_date}}</td>
<td>{{$expense->paid_towards}}</td>
<td>{{$expense->payment_mode}}</td>
<td>

<button type="button"  class="btn btn-warning btn-xs editexp" value="{{$expense->id}}"><span class="glyphicon glyphicon-pencil"></span> </button>
<button type="button"  class="btn btn-danger btn-xs deletexp" value="{{$expense->id}}"><span class="glyphicon glyphicon-trash"></span> </button>
</td>
<td>
<!-- @if(session('adminsection')) -->
<!-- @else -->
<button type="button" class="btn btn-primary btn-xs showbill" value="{{$expense->id}}">View/Edit</button>

 <!-- @endif -->

</tr>
@endforeach

</tbody>
</table>
</div>
@include('partials.vouchermodal')
</div>
<script src="{{asset('assets/js/voucher.js')}}"></script>

<script>
$('.deletexp').click(function(){
  var res=confirm("Are you sure to delete this record?");
	if(res==true){
var id=$(this).val();
//alert(id);
$.ajax({
  method:'get',
   url:'deleteexp/'+id,
   success:function(data){
       alert("Expense deleted successfully");
       $('#userexp').html(data.html);
     }
});
}
});

$('.editexp').click(function(){
  var res=confirm("Are you sure to edit this record?");
	if(res==true){
var id=$(this).val();
//alert(id);
$.ajax({
  method:'get',
   url:'editexp/'+id,
   success:function(data){
      $('#Section2').hide();
      $('#Section1').show();
    //  alert(data.exp);

      var date1=data.exp.payment_date;
      var tmp=date1.split('-');
      var payment_date=null;
      if("{!!$dateformat!!}"=="Y-m-d"){
        payment_date=date1;
      }else if("{!!$dateformat!!}"=="d-m-Y"){
        payment_date=(tmp[2]+"-"+tmp[1]+"-"+tmp[0]);
      }else if("{!!$dateformat!!}"=="m-d-Y"){
        payment_date=(tmp[1]+"-"+tmp[0]+"-"+tmp[2]);
      }

      $('input[name=trans_date]').val(data.exp.trans_date);
      $('input[name=income]').val(data.exp.income);
      $('input[name=remarks]').val(data.exp.remarks);
      $('input[name=iid]').val(data.exp.id);
     $('select[name="expensenamelist"]').val(data.exp.expense_name);
      $('select[name="fiscalyearlist"]').val(data.exp.fin_year);
      $('select[name="transnumexplist"]').empty();
      $('select[name="transnumexplist"]').append('<option value="'+parseInt(data.exp.transaction_no)  +'" selected >'+parseInt(data.exp.transaction_no)+'</option>');

       // $('select[name=transnumexplist]').val(data.exp.transaction_no);
      $('input[name=paid_towards]').val(data.exp.paid_towards);
      $('input[name=payment_date]').val(payment_date);
      $('input[name=paid_amt]').val(data.exp.paid_amount);
      $('input[name=bank_name]').val(data.exp.bank_name);
      $('input[name=ifsc]').val(data.exp.ifsc_code);
      $('input[name=credit_no]').val(data.exp.credit_no);
      $('input[name=debit_no]').val(data.exp.debit_no);
      $('input[name=cheq_num]').val(data.exp.cheque_no);
      $('input[name=cheq_date]').val(data.exp.cheque_date);
      $('input[name=account_no]').val(data.exp.acc_no);
      if(data.exp.payment_mode == "cash"){
        $('input:radio[name=optradio]')[0].checked = true;
        $('#chequesec').hide();
        $('#debitsec').hide();
        $('#creditsec').hide();
        $('#onlinesec').hide();
        $('#bank').hide();

      }else if(data.exp.payment_mode == "cheque"){
        $('input:radio[name=optradio]')[1].checked = true;
        $('#chequesec').show();
        $('#bank').show();
        $('#debitsec').hide();
        $('#creditsec').hide();
        $('#onlinesec').hide();
      }else if(data.exp.payment_mode == "debit"){
        $('input:radio[name=optradio]')[2].checked = true;
        $('#chequesec').hide();
        $('#debitsec').show();
        $('#bank').show();
        $('#creditsec').hide();
        $('#onlinesec').hide();

      }else if(data.exp.payment_mode == "credit"){
        $('input:radio[name=optradio]')[3].checked = true;
        $('#chequesec').hide();
        $('#debitsec').hide();
        $('#creditsec').show();
        $('#bank').show();
        $('#onlinesec').hide();

      }else if(data.exp.payment_mode == "online"){
        $('input:radio[name=optradio]')[4].checked = true;
        $('#chequesec').hide();
        $('#debitsec').hide();
        $('#creditsec').hide();
        $('#onlinesec').show();
        $('#bank').show();


      }

      $('#btnexpense').html('Update');
      $('#btnexpense').val('Update');
    }
  });
}
});

// function centerModal() {
//     $(this).css('display', 'block');
//     var $dialog = $(this).find(".modal-dialog");
//     var offset = ($(window).height() - $dialog.height()) / 2;
//     // Center modal vertically in window
//     $dialog.css("margin-top", offset);
// }
//
// $('.modal').on('show.bs.modal', centerModal);
// $(window).on("resize", function () {
//     $('.modal:visible').each(centerModal);
// });
</script>
