<div class="table-responsive">
<table class="table table-bordered">
<thead class="thead">
<tr >
<th align="center"><center>Sl.No.</center></th>
<th align="center"><center>Expense Name</center></th>
<th align="center"><center>Due Date</center></th>
<th align="center"><center>Created For</center></th>
<th align="center"><center>Actions</center></th>

</tr>
</thead>
<tbody style="font-family:Times New Roman;font-size: 1.7rem;">
@php $i=1;
     $dateformat=session('dateformat');
@endphp
@foreach($expnames as $names)

@php
$duedate=null;
if($names->due_date!=null){
$duedate=date($dateformat,strtotime($names->due_date));
}
@endphp
<tr style="background-color:white;text-align:justify">
<td>{{$i++}}</td>
<td>{{$names->exp_name}}</td>
<td>{{$duedate}}</td>
<td>{{$names->for_whom}}</td>
<td>
<button type="button"  class="btn btn-warning btn-xs editexpname" value="{{$names->id}}"><span class="glyphicon glyphicon-pencil"></span> </button>
<button type="button"  class="btn btn-danger btn-xs deletexpname" value="{{$names->id}}"><span class="glyphicon glyphicon-trash"></span> </button>
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
<script>
$('.deletexpname').click(function(){
  var res=confirm("Are you sure to delete this record?");
	if(res==true){
var id=$(this).val();
//alert(id);
$.ajax({
  method:'get',
   url:'deleteexpname/'+id,
   success:function(data){
       alert("Expense Name deleted successfully");
       $('#expensenames').html(data.html);
     }
});
}
});
$('.editexpname').click(function(){
  var res=confirm("Are you sure to edit this record?");
	if(res==true){
var id=$(this).val();
//alert(id);
$.ajax({
  method:'get',
   url:'editexpname/'+id,
   success:function(data){
      $('#Section2').hide();
      $('#Section1').show();
      var due_date=null;
      var date1=data.expname.due_date;
      if(date1!=null){
      var tmp=date1.split('-');
      due_date=(tmp[2]+"-"+tmp[1]+"-"+tmp[0]);
    }
      $('input[name=due_date]').val(due_date);
      $('input[name=exp_name]').val(data.expname.exp_name);
      //alert(data.expname.for_whom);
      if(data.expname.for_whom == "general"){
        $('input:radio[name=category]')[0].checked = true;
      }else{
        $('input:radio[name=category]')[1].checked = true;
      }

      var $checked = $radios.filter(function() {
        return $(this).prop('checked');
      }).val();
      if($checked=="user"){
        $('#userloc').show();
        $('select[name=for_whom]').val(data.expname.for_whom);
      }
      if($checked=="general"){
        $('#userloc').hide();
      }
      $('#btnexpname').html('Update');
      $('#btnexpname').val('Update');
    }
  });
}
});
</script>
