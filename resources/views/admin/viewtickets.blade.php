@extends('layouts.userpage')
@section('usercontect')

<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @else
          <div id="usertickets">

          </div>
     @endif
      </div>
      <div class="col-md-1"></div>

  </div>
</div>
  <script>
  dispTickets();
  function dispTickets(){
  $.ajax({
        method:'get',
         url:'dispusertickets',
         dataType: 'json',
         success:function(data){
          // alert(data.html);
          $('#usertickets').html(data.html);
         }
       });
  }

  $('.bodyheader').html('Tickets');

  </script>
@endsection
