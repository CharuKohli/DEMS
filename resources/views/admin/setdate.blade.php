@extends('layouts.userpage')
@section('usercontect')
@php
$dateformat= session('dateformat');
@endphp
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
  <form id="setdateformat">
    {{csrf_field()}}
<div class="expalert" style="font-size:16px">Select Date Format:</div><br>
<select class="form-control" multiple="multiple" id="dateformat" name="dateformat">
  <option value="d-m-Y" >dd-mm-yyyy</option>
    <option value="m-d-Y">mm-dd-yyyy</option>
      <option value="Y-m-d">yyyy-mm-dd</option>
    </select>
      <div class="">

<button value="submit"class="btn btn-primary" id="btndateset">Set Date Format</button>
</div>
</form>
<br>
<div class="expalert" style="font-size:16px">Selected Date Format:<b><span id="selectedformat"></spna></b></div>

</div>

<div class="col-md-4">
</div>
</div>
<script>


$('.bodyheader').html('Set Date Format');

</script>
@endsection
