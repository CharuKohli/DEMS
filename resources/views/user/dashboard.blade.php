@extends('layouts.userpage')
@section('usercontect')
<!-- <div class="alert alert3" id="expduedates" style="background:#ffb3b3;color:black;display:none"> -->
 <!-- <center style="font-size:13pt"><b>Expense Due Date</b></center> -->
@php $date=date('d-m-Y');
@endphp
 <div class="row">
    <div class="col-md-2"></div>
   <div class="col-md-8">
 <div id="expenseduedates"></div>
</div>
<div class="col-md-2"></div>


</div>
<!-- </div> -->
<script>

$('.bodyheader').html('Dashboard');
</script>
@endsection
