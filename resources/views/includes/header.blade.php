<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Delta EMS</title>
  <meta charset="utf-8">
 <meta name="csrf_token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="{{URL::asset('assets/js/jquery-1.9.1.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="{{asset('assets/js/formvalidation.js')}}"></script>
<script src="{{asset('assets/js/data.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @php
    $dateformat=session('dateformat');
    $dateformat1=null;
    if($dateformat=='m-d-Y'){
      session(['dateformat1'=>"MM-DD-YYYY"]);
    }else if($dateformat=='d-m-Y'){
      session(['dateformat1'=>"DD-MM-YYYY"]);
    }else if($dateformat=='Y-m-d'){
    session(['dateformat1'=>"YYYY-MM-DD"]);
    }

    @endphp

    <script>
    function getTodayDate(){
      var todaydate=null;
    var today=new Date();
    //alert(today);
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if("{!! session('dateformat1') !!}"=='DD-MM-YYYY'){
    todaydate= dd+"-"+mm+"-"+yyyy;
  }
    else if("{!! session('dateformat1') !!}"=='MM-DD-YYYY'){
    todaydate= mm+"-"+dd+"-"+yyyy;
    }
    else if("{!! session('dateformat1') !!}"=='YYYY-MM-DD'){
    todaydate= yyyy+"-"+mm+"-"+dd;
    }
    //alert(todaydate);
    return todaydate;
    }


    getAlertCount();
    function getAlertCount(){
    $.ajax({
     method:'get',
     url:'notificationcount',
     success:function(data){
     //alert("c="+data.count);
     $('#count').html(data.count);
    }
    });
    }



    </script>

</head>
<body >
