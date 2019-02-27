$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();

  $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
         }
     });

$('#register').submit(function(e){
  e.preventDefault();
  var form=$('#register').validate();
  if(form.valid()==true){
  //alert("in");
     $.ajax({
  method:'post',
  url:'register',
  data:$('#register').serialize(),
  dataType: 'json',
  success:function(data){
  //alert(data.msg);
  $('#register')[0].reset();
  window.location="http://127.0.0.1:8000/signin";
 }
});
}
 });

 $('#userreg').submit(function(e){
  e.preventDefault();
  var form=$('#userreg').validate();
 if(form.valid()==true){
   $.ajax({
   method:'post',
   url:'register',
   data:$('#userreg').serialize(),
   dataType: 'json',
   success:function(data){
   alert(data.msg);
   $('#userreg')[0].reset();
   }
   });
 }

});


 $('#userreg1').submit(function(e){
  e.preventDefault();
  var form=$('#userreg1').validate();
  //alert(form.valid());
 if(form.valid()==true){
 var btnName=$('#btnuser').val();
 //alert(btnName+''+btnName2);
 if(btnName=="Save"){
 $.ajax({
method:'post',
url:'register',
data:$('#userreg1').serialize(),
dataType: 'json',
success:function(data){
alert(data.msg);
$('#userreg1')[0].reset();
}
});
}else if(btnName=="Update"){
//  alert("uu");
  console.log($('#userreg1').serialize());
  $.ajax({
 method:'post',
 url:'updateuser',
 data:$('#userreg1').serialize(),
 dataType: 'json',
 success:function(data){
 alert(data.msg);
 $('#userreg1')[0].reset();
 $('#btnuser').val('Save');
 $('#btnuser').html('Save');
 }
 });
}
}
});



 $('#signin').submit(function(e){
   e.preventDefault();
   var form=$('#signin').validate();
  if(form.valid()==true){
 //alert("in");
 $.ajax({
method:'post',
url:'signin',
data:$('#signin').serialize(),
dataType: 'json',
success:function(data){
//alert(data.msg);
if(data.msg=="admin"){
  window.location="http://127.0.0.1:8000/dashboard";
}else if(data.msg=="user"){
    window.location="http://127.0.0.1:8000/dashboard";
}else if(data.msg=="auth"){
    window.location="http://127.0.0.1:8000/dashboard";
}else if(data.msg==0){
  alert("login failed");
}
}
});
}
});

$('#fyear').submit(function(e){
  e.preventDefault();
  var form=$('#fyear').validate();

 if(form.valid()==true){
   var finyear=$('#fin_year').val();
   //var year=(finyear.fin_year);
   var year1=parseInt(finyear.substr(2,3));
   var year2=parseInt(finyear.substr(5,6));
 	var nextyear=parseInt(year1)+1;
 	if(year1>=year2 || year2!=nextyear){
    $('.errmsg').show();
 		var errmsg="Please enter valid finacial year";
    $('.errmsg').html(errmsg);
    $('.errmsg').css('color','red');
    //alert("invalid");
 	}else{
    $('.errmag').hide();
    //alert('valid');
  $.ajax({
  method:'post',
  url:'finyear',
  data:{'fin_year':finyear},
  dataType: 'json',
  success:function(data){
    if(data.msg=="1"){
      alert("Financial Year created successfully");
    }else if(data.msg=="0"){
      $('.errmsg').show();
      $('.errmsg').html("This Financial Year Already created");
      $('.errmsg').css('color','red');
    }
    $('#fyear')[0].reset();
    getFinyears();
    currentFinYear();

  }
});
}
}
});

$('#expName').submit(function(e){
  e.preventDefault();
  var form=$('#expName').validate();
  //alert(form.valid());
 if(form.valid()==true){
  var expname=$('#expname').val();
  var duedate=$('#datePicker').val();
  var for_whom=null;
  var $radios = $('input[name="category"]');
  var $checked = $radios.filter(function() {
    return $(this).prop('checked');
  }).val();
  if($checked=="user"){
    for_whom=$('#for_whom').val();
  }
  if($checked=="general"){
    for_whom="general";
  }
  var data={'exp_name':expname,'due_date':duedate,'for_whom':for_whom};
var btnName=$('#btnexpname').val();
if(btnName=="Save"){
  $.ajax({
  method:'post',
  url:'expname',
  data:data,
  dataType: 'json',
  success:function(data){
    alert(data.msg);
    $('#expName')[0].reset();
    $('#userloc').hide();
    getAlertCount();
  }
});
}
else if(btnName=="Update"){
  $.ajax({
  method:'post',
  url:'updateexpname',
  data:data,
  dataType: 'json',
  success:function(data){
    alert(data.msg);
    $('#expName')[0].reset();
    $('#btnexpname').html('Save');
    $('#btnexpname').val('Save');
    $('#userloc').hide();
    getAlertCount();
  }
});
}
}
});

$("#exp_bill").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var imagesize=file.size;
        var inkb=Math.round((imagesize / 1024)) ;
        if(inkb<200){
        var match= ["image/png","image/jpeg","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
            $("#exp_bill").val('');
            $('#invalidfile').html('Please select valid image file (JPEG/JPG/PNG)... ');
            $('#invalidfile').css('color','red');
            $('#exp_bill').val(null);
            return false;
        }
      }else{
        $("#exp_bill").val('');
        $('#invalidfile').html('Image size should be max. 200 kB');
        $('#invalidfile').css('color','red');
        $('#exp_bill').val(null);
        return false;
      }
    });

$('#expensetrans').submit(function(e){
e.preventDefault();
var form=$('#expensetrans').validate();
//alert(form.valid());
if(form.valid()==true){
var btnName=$('#btnexpense').val();
var mode="";
      $('#invalidfile').html(null);
       var file_data = $('#exp_bill').prop('files')[0];
var trans_num=$('select[name="transnumexplist"]').val();
var year=$('select[name="fiscalyearlist"]').val();
//alert(year);
var expense_name=$('select[name="expensenamelist"]').val();
var person_name=$('input[name=person_name]').val();
var paid_towards=$('input[name=paid_towards]').val();
var payment_date=$('input[name=payment_date]').val();
var paid_amt=$('input[name=paid_amt]').val();
var remarks=$('input[name=remarks]').val();
var bank_name=$('input[name=bank_name]').val();
var ifsc=$('input[name=ifsc]').val();
var credit_no=$('input[name=credit_no]').val();
var debit_no=$('input[name=debit_no]').val();
var cheq_num=$('input[name=cheq_num]').val();
var cheq_date=$('input[name=cheq_date]').val();
var account_no=$('input[name=account_no]').val();
for(var i=0;i<5;i++){
if($('input:radio[name=optradio]')[i].checked==true){
  var inputValue = $('input:radio[name=optradio]:checked').val();
  mode=inputValue;
}
}
// var data={'trans_num':trans_num,'fiscal_year':year,'expense_name':expense_name,'paid_towards':paid_towards,
// 'payment_date':payment_date,'paid_amt':paid_amt,'remarks':remarks,'mode':mode,'bank_name':bank_name,
// 'ifsc':ifsc,'credit_no':credit_no,'debit_no':debit_no,'cheq_num':cheq_num,'cheq_date':cheq_date,'account_no':account_no};
//console.log(new FormData(data));
//console.log(data);
var finaldata=new FormData(this);
finaldata.append('fiscal_year',year);
finaldata.append('expense_name',expense_name);
finaldata.append('trans_num',trans_num);
finaldata.append('file', file_data);
finaldata.append('mode',mode);

if(btnName=="Save"){
$.ajax({
        type: "POST",
        url:'saveexpform',
        data:finaldata,
        dataType : "json",
			  contentType: false,
			  cache: false,
			  processData:false,
        success:function(data){
          console.log(data.msg);
            alert(data.msg);
            $('#expensetrans')[0].reset();
            exp_transaction_num();
            $('#chequesec').hide();
              $('#debitsec').hide();
              $('#creditsec').hide();
              $('#onlinesec').hide();
              $('#bank').hide();
          }
});
}
else if(btnName=="Update"){
  //alert("uuu");
  $.ajax({
         method:'post',
          url:'updateexpform',
          data:{'fin_year':year,'transaction_no':trans_num,'expense_name':expense_name,'paid_towards':paid_towards,
        'paid_amount':paid_amt,'payment_date':payment_date,'remarks':remarks,'payment_mode':mode,'bank_name':bank_name,
      'ifsc_code':ifsc,'acc_no':account_no,'credit_no':credit_no,'debit_no':debit_no,'cheque_no':cheq_num,'cheque_date':cheq_date},
          async: true,
          dataType: 'json',
          success:function(data){
              alert(data.msg);
              $('#expensetrans')[0].reset();
              $('#chequesec').hide();
                $('#debitsec').hide();
                $('#creditsec').hide();
                $('#onlinesec').hide();
                $('#bank').hide();
                exp_transaction_num();

            }
  });
}
}
// }
});

$('#userticket').submit(function(e){
 e.preventDefault();
 var form=$('#userticket').validate();
 //alert(form.valid());
 if(form.valid()==true){
//alert("in");
console.log($('#userticket').serialize());
var btnName=$('#btnticket').val();
if(btnName=="Save"){
$.ajax({
       method:'post',
        url:'saveticket',
      data:$('#userticket').serialize(),
      async: true,
      dataType: 'json',
      success:function(data){
        alert(data.msg);
        $('#userticket')[0].reset();
      }
    });
  }else if(btnName=="Update"){

  }
}
});


$('#expdate').click(function(){
  var from_date=$('#from_date').val();
  var to_date=$('#to_date').val();

  $.ajax({
    method:'get',
    url:'expdatereport',
    data:{'from_date':from_date,'to_date':to_date},
    dataType:'json',
    success:function(data){
      $('#Section1').show();
      $('#expdatereport').html(data.html);


    }
  });
});

  $('#expcard').click(function(){
    var from_date=$('#from_date').val();
    var to_date=$('#to_date').val();
  var cardtype=$('#cardtype').val();
    $.ajax({
      method:'get',
      url:'expcardreport',
      data:{'from_date':from_date,'to_date':to_date,'cardtype':cardtype},
      dataType:'json',
      success:function(data){
        $('#Section1').show();
        $('#expcardreport').html(data.html);


      }
    });
});

$('#expuser').click(function(){
  var from_date=$('#from_date').val();
  var to_date=$('#to_date').val();
var userid=$('#userid').val();
  $.ajax({
    method:'get',
    url:'expuserreport',
    data:{'from_date':from_date,'to_date':to_date,'userid':userid},
    dataType:'json',
    success:function(data){
      $('#Section1').show();
      $('#expuserreport').html(data.html);
  }
  });
});
getDueDateAlerts();
function getDueDateAlerts(){
	$.ajax({
		method:'get',
		url:'duedatealert',
		success:function(data){
    //  alert(data.html);
      if(data.html!=''){
      $('#expenseduedates').html(data.html);
    }
      // getnotificationcount();

    }
  });
}


$('#setdateformat').submit(function(e){
  e.preventDefault();
  var dateformat=$('select[name=dateformat]').val();
  //alert(dateformat);
  var res=confirm("Are you sure to change date format?");
  if(res==true){
  $.ajax({
    method:'post',
    url:'setdateformat',
    data:{'dateformat':dateformat},
    dataType:'json',
    success:function(data){
      //alert(data.msg);
      $('select[name=dateformat]').val(data.msg);
      $('#selectedformat').html(data.msg);
      sessionStorage.setItem("dateformat",dateformat);
      $("#dateformat option[value="+dateformat+"]").attr('selected','selected');
       setDateFormat(dateformat);

    }
  })
}
});

//setDateFormat("{!!$dateformat!!}");
function setDateFormat(dateformat){
  var dateformat1=null;
  if(dateformat=='d-m-Y'){
    dateformat1="dd-mm-yyyy";
  }else if(dateformat=='m-d-Y'){
    dateformat1="mm-dd-yyyy";
  }else if(dateformat=='Y-m-d'){
    dateformat1="yyyy-mm-dd";
  }
  $("#dateformat option[value="+dateformat+"]").attr('selected','selected');
  $('#selectedformat').html(dateformat1);
  $('.selecteddateformat').html(dateformat1);
//sessionStorage.setItem("dateformat",'"'+{!!$dateformat!!}+'"');
}
getDateFormat();
function getDateFormat(){
  $.ajax({
    method:'get',
    url:'getdateformat',
    success:function(data){
      var date_format=data.msg;
      //alert("disp="+date_format);
      if(date_format!=null){
      $('select[name=dateformat]').val(date_format);
      $('#selectedformat').html(date_format);
      sessionStorage.setItem("dateformat",date_format);
      $("#dateformat option[value="+date_format+"]").attr('selected','selected');
      //sessionStorage.setItem('date_format',date_format);
       setDateFormat(date_format);
     }

    }
  })
}
});
