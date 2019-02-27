@extends('welcome')
@section('content')

@if(session('loggedinuser'))
@php $count=session('numofalerts');
     $dateformat=session('dateformat');
@endphp
 <div style="background:#006064" style="margin-top:10px;">
  <div class="row"style="padding-left:10px;padding-right:10px;padding-top:10px;color:white"   >
   <div class="col-md-7">
     <h4>Delta Expense Management Software</h4>
     <!-- <img class="img2" src="{{asset('assets/images/logo.png')}}" class="img-responsive" alt="logo" style="margin-bottom:2px;margin-top:6px;margin-left:15px;"> -->

</div>

<div class="col-md-3" align="right" style="color:white;">
  <span class="glyphicon glyphicon-user" ></span> Welcome  {{session('loggedinuser')}}

</div >
<div class="col-md-1" align="right" style="color:white;text-align:right;display:inline-block;padding-top:8px" >
    <a  href="{{url('dashboard')}}" style="display:inline-block;color:white"><i class="fa fa-bell-o fa-lg" style="display:inline-block;color:white">
    </i> <span class="notifycount"><span id="count"></span></span> </a>

  </div>
<div class="col-md-1" align="right">
  <a href="{{url('/')}}" style="display:inline-block;color:white">
      {{ __('Logout') }} <span class="glyphicon glyphicon-log-out" ></span>
</a>
</div>
</div>
</div>
@endif

<nav class="navbar" id="navbar">
 <div class="navbar-header">

 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
	 <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>

    <h4 class="bodyheader"> </h4>
    </div>

	 <div class="navbar-collapse collapse" id="myNavbar" style="margin-right:50px" >
	 <ul class="nav navbar-nav navbar-right" >
	 <li  ><a href="{{url('dashboard')}}"> Dashboard</a></li>
  <li><a href="{{url('profile')}}"  >Profile</a></li>

@if(session('adminsection'))
  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Masters <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('createuser')}}" >Create User</a></li>
            <li><a href="{{url('createfinyear')}}" >Create Financial Year</a></li>
            <li><a href="{{url('createexpname')}}" >Create Expense Name</a></li>
          </ul>
        </li>

        <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transactions <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('allexpenses')}}" >Expenses</a></li>
                  <li><a href="{{url('tickets')}}" >Tickets</a></li>

                </ul>
              </li>
              <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Utilities<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{url('setdate')}}" >Set date format</a></li>

                      </ul>
                    </li>
      @else
        <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transactions <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('userexpenses')}}" >Expenses</a></li>
                  <li><a href="{{url('usertickets')}}" >Tickets</a></li>

                </ul>
              </li>
        @endif
              <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="margin-right:25px;">Reports <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{url('datewise')}}" >Date Wise</a></li>
                        <li><a href="{{url('cardwise')}}" >Payment Mode Wise</a></li>
                        @if(session('adminsection'))
                        <li><a href="{{url('userwise')}}" >User Wise</a></li>
                        @endif
                      </ul>
                    </li>
   </ul>
    </div>
</nav>
<!-- yield {!! session('dateformat1') !!} -->
<div class="container-fluid ">
<p style="font-size:14px;margin-top:10px">Current Date Format: <b><span class="selecteddateformat"></span></b>
<div class="panel panel-primary">
 <div class="panel-body">
   @yield('usercontect')

</div>
</div>
<script>


</script>
<br>
@endsection
