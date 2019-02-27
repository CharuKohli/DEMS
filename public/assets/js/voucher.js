$('.showbill').click(function(){
var id=$(this).val();
$.ajax({
  method:'get',
   url:'showuserbill/'+id,
   success:function(data){
       var billname=data.html;
      $('#vouchers').html(billname);
       $('#myModal').modal('show');
     }
});
});
