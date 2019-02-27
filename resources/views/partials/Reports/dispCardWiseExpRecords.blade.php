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
<div class="col-md-4">Date : {{$from_date}} To {{$to_date}}</div>
<div class="col-md-4">Card Type : {{$cardtype}}</div>
<div class="col-md-4"></div>
<div class="col-md-4" align="right">
  <a href="{{url('cardreport/'.$from_date.'/'.$to_date.'/'.$cardtype.'/'.'pdf')}}"><button><img src="{{asset('assets/images/pdf.png')}}" width="20px"> PDF</button></a>
  <a href="{{url('cardreport/'.$from_date.'/'.$to_date.'/'.$cardtype.'/'.'excel')}}"><button><img src="{{asset('assets/images/excel-icon.png')}}" width="20px"> Excel</button></a>
</div>
</div>
</div>


<div class="table-responsive">
<table class="table table-bordered">
<thead >
<tr >
<th align="center">Sl.No.</th>
<th align="center">User Id</th>
<th align="center">Expense Name</th>
<th align="center">Amount Paid</th>
<th align="center">Payment Date</th>
<th align="center">Paid Towards</th>
@if($vouchercount!=0)
<th align="center">Vouchers</th>
@endif
</tr>
</thead>
<tbody style="font-family:Times New Roman;font-size: 1.7rem;">
@php $i=1;@endphp
@foreach($records as $expense)
@php
$payment_date=date($dateformat,strtotime($expense->payment_date));
@endphp
<tr style="background-color:white;text-align:center">
<td>{{$i++}}</td>
<td>{{$expense->user_id}}</td>
<td>{{$expense->expense_name}}</td>
<td>{{$expense->paid_amount}}</td>
<td>{{$payment_date}}</td>
<td>{{$expense->paid_towards}}</td>
@if($vouchercount!=0)
<td>
<button type="button" class="btn btn-primary btn-xs showbill" value="{{$expense->id}}">View</button>
</td>
@endif
</tr>
@endforeach

</tbody>
</table>
</div>
@endif
@include('partials.vouchermodal')
<script src="{{asset('assets/js/voucher.js')}}"></script>
