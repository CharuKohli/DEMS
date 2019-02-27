@php
$dateformat=session('dateformat');
$from_date=date($dateformat,strtotime($from_date));
$to_date=date($dateformat,strtotime($to_date));
$vouchercount=count($voucherpath);

@endphp
@if($records->count() <= 0)
<div class="alert alert-danger"  style="">
<strong>Sorry! There are no records</strong>
</div>
@else
<div style="background:#526069;padding:10px;color:white">
<div class="row">
<div class="col-md-6">Date : {{$from_date}} To {{$to_date}}</div>
<div class="col-md-4" align="right">
  <a href="{{url('datereport/'.$from_date.'/'.$to_date.'/'.'pdf')}}"><button><img src="{{asset('assets/images/pdf.png')}}" width="20px"> PDF</button></a>
  <a href="{{url('datereport/'.$from_date.'/'.$to_date.'/'.'excel')}}"><button><img src="{{asset('assets/images/excel-icon.png')}}" width="20px"> Excel</button></a>
</div>
</div>
</div>
@php $totalpaid_amt1=0;
 $test=0;
 $dw=-1;
 @endphp
 @foreach($records as $y)
 @php
 $dw++;
 foreach ($records1[$dw] as $x1) {
   $totalpaid_amt1=$totalpaid_amt1+$x1->paid_amount;
 }
 @endphp
 @endforeach
 <div style="margin: 10px;border: 1px solid #00436a;padding-left: 15px;padding-right:15px">

 <div class="row">
<div class="col-md-12">
<div class="row panel-heading " style="background-color:#e0ebeb;">
   <div class="col-xs-1">
    <div class="collapsible" id="collapsible" style="color:#00436a;"data-toggle="collapse" data-target="#group-of-rows-{{$test}}" aria-expanded="false" aria-controls="group-of-rows-1">
          </div>
      </div>
      <div class="col-sm-3 col-xs-12" ><b><center>Total Expense Amount</center></b></div>
      <div class="col-sm-4 col-xs-12" ><b><center>{{$totalpaid_amt1}}</center></b></div>

  </div>
     <div class="collapse" id="group-of-rows-{{$test}}">
 <div class="row panel-heading bgOrg">
        <div class="col-sm-1 col-xs-12 pull-left"><center>#</center></div>
        <div class="col-sm-2 col-xs-12"><center>Sl No.</center></div>
        <div class="col-sm-3 col-xs-12"><center>Expense Name</center></div>
        <div class="col-sm-3 col-xs-12"><center>Expense Amount Rs.</center></div>

    </div>
 @php $j=1;$d=-1;$totalpaid_amt=0;$totalpaid_amt1=0;
 @endphp
 @foreach($records as $y)
 @php $d++;
 $paid_amt=0;
 foreach ($records1[$d] as $x) {
   $paid_amt=$paid_amt+$x->paid_amount;
 }
 foreach ($records1[$d] as $x) {
   $totalpaid_amt1=$totalpaid_amt1+$x->paid_amount;
 }
 @endphp



 <div class="panel-body"style="background-color:#e0ebeb;text-align:justify">
   <div class="col-xs-1"><center>
          <div class="collapsible"
            data-toggle="collapse" data-target="#group-of-rows-{{$y->id}}" id="rows-{{$y->id}}" aria-expanded="false" aria-controls="group-of-rows-1">
          </div>
      </div></center>
      <div class="col-sm-2 col-xs-12" ><center>{{$j++}}</center></div>
      <div class="col-sm-3 col-xs-12" ><center>{{$y->expense_name}}</center></div>
      <div class="col-sm-2 col-xs-12"><center>{{$paid_amt}}</center></div>
  </div><br>
 <div class="collapse" id="group-of-rows-{{$y->id}}" style="margin-right: 10px;margin-bottom: 10px;margin-left: 10px;
    border: 1px solid #4CAF50;">
    <div class="table-responsive">
 <table class="table table-bordered"  >
 <thead>

        <tr class="row">
          <th align="center"><center>Sl.No.</center></th>
          <th align="center"><center>User Id</center></th>
          <th align="center"><center>Payment Date</center></th>
          <th align="center"><center>Paid Towards</center></th>
          <th align="center"><center>Payment Mode</center></th>
          <th align="center"><center>Amount Paid</center></th>
          @if($vouchercount!=0)
          <th align="center">Vouchers</th>
          @endif

         </tr>
       </thead>
          @php $i=1;
          foreach ($records1[$d] as $x) {
            $totalpaid_amt=$totalpaid_amt+$x->paid_amount;
          }
          @endphp
      @foreach($records1[$d] as $x)
      @php
      $payment_date=date($dateformat,strtotime($x->payment_date));
     @endphp
<tbody>
    <tr class="row" style="text-align:justify" >
     <td >{{$i++}}</td>
     <td >{{$x->user_id}}</td>
  <td >{{$payment_date}}</td>
  <td >{{$x->paid_towards}}</td>
  <td>{{$x->payment_mode}}</td>
      <td >{{$x->paid_amount}}</td>
      @if($vouchercount!=0)
      <td>
      <button type="button" class="btn btn-primary btn-xs showbill" value="{{$x->id}}">View</button>
      </td>
      @endif
          </tr>
        </tbody>
@endforeach
      </table>
</div>
</div>


<br>

@endforeach
</div>
<br><br>
<p style="color:black;font-size:12pt;font-weight:200">Total Expense Amount :  Rs. {{$totalpaid_amt}} </p>

 </div>
</div>

</div>
@endif
@include('partials.vouchermodal')
<style>
.collapsible {
 color: #00436a;
 cursor: pointer;
}
.collapsible:after {
 content: '\002B';
}

.active:after {
 content: "\2212";
}

</style>

 <script src="{{asset('assets/js/voucher.js')}}"></script>

 <script>
 var coll = document.getElementsByClassName("collapsible");
 var i;
 for (i = 0; i < coll.length; i++) {
   coll[i].addEventListener("click", function() {
     this.classList.toggle("active");
     var content = this.nextElementSibling;
     if (content.style.maxHeight){
       content.style.maxHeight = null;
     } else {
       content.style.maxHeight = content.scrollHeight + "px";
     }
   });
 }
 </script>
