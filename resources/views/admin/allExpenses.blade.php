@extends('layouts.userpage')
@section('usercontect')
@php $voucherscount=count($voucherpath);
@endphp
<br>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <!-- <div class="panel panel-default">
       <div class="panel-body"> -->
       @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@else

         <div class="table-responsive">
         <table  class="table table-bordered">
         <thead class="thead">
         <tr>
         <th><center>Sl.No.</center></th>
         <th><center>User Id</center></th>
         <th><center>Expense Name</center></th>
         <th><center>Amount Paid</center></th>
         <th><center>Payment Date</center></th>
         <th><center>Paid Towards</center></th>
         <th><center>Payment Mode</center></th>
         @if($voucherscount!=0)
         <th align="center"><center>Voucher</center></th>
          @endif
         </tr>
       </thead>
         <tbody style="font-family:Times New Roman;font-size: 1.7rem;">
         @php $i=1;
            $dateformat=session('dateformat');
            $voucherscount=count($voucherpath);
         @endphp
         @foreach($userexpenses as $expense)
         <tr style="background-color:white;text-align:justify">
           @php $paymentdate=date($dateformat,strtotime($expense->payment_date));
           $billpath=$expense->vouchers;
           @endphp
         <td>{{$i++}}</td>
         <td>{{$expense->user_id}}</td>
         <td>{{$expense->expense_name}}</td>
         <td>{{$expense->paid_amount}}</td>
         <td>{{$paymentdate}}</td>
         <td>{{$expense->paid_towards}}</td>
         <td>{{$expense->payment_mode}}</td>
         @if($voucherscount!=0)
         <td>
           @if($billpath!='[]')
           <button type="button" class="btn btn-primary btn-xs showbill" value="{{$expense->id}}">View</button>
           @endif
        </td>
        @endif
         </tr>
         @endforeach

         </tbody>
         </table>
         <center>{{ $userexpenses->links() }}</center>
         @endif
         <!-- </div> -->
       </div>
     </div>

</div>
<div class="col-md-1"></div>
</div>

@include('partials.vouchermodal')
<script src="{{asset('assets/js/voucher.js')}}"></script>

<script>

$('.bodyheader').html('Expenses');
</script>
@endsection
