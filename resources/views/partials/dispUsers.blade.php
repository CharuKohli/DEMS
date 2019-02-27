<div class="table-responsive">
<table class="table table-bordered">
<thead class="thead">
<tr >
<th ><center>Sl.No.</center></th>
<th ><center>User Id</center></th>
<th ><center>User Name</center></th>
<th ><center>Location</center></th>
<th ><center>Designation</center></th>
<th ><center>Mobile</center></th>
<th ><center>Email</center></th>
<th ><center>Password</center></th>
<th ><center>Authorized User</center></th>
<th ><center>Actions</center></th>

</tr>
</thead>
@if($users)
<tbody style="font-family:Times New Roman;font-size: 1.7rem;">
@php $i=1;@endphp
@foreach($users as $user)
<tr style="background-color:white;text-align:justify">
<td>{{$i++}}</td>
<td>{{$user->user_id}}</td>
<td>{{$user->name}}</td>
<td>{{$user->location}}</td>
<td>{{$user->designation}}</td>
<td>{{$user->mobile}}</td>
<td>{{$user->email}}</td>
<td>{{$user->password}}</td>
<td>@php echo $user->authorized == 1 ? 'Yes' : 'No' @endphp</td>
<td>
<button type="button"  class="btn btn-warning btn-xs edituser" value="{{$user->id}}"><span class="glyphicon glyphicon-pencil"></span> </button>
<button type="button"  class="btn btn-danger btn-xs deletuser" value="{{$user->id}}"><span class="glyphicon glyphicon-trash"></span> </button>
</td>
</tr>
@endforeach

</tbody>
@endif
</table>
</div>

<script>

$('.deletuser').click(function(){
  var res=confirm("Are you sure to delete this record?");
	if(res==true){
var id=$(this).val();
//alert(id);
$.ajax({
  method:'get',
   url:'deleteuser/'+id,
   success:function(data){
       alert("Expense deleted successfully");
       $('#users').html(data.html);
     }
});
}
});

$('.edituser').click(function(){
  var res=confirm("Are you sure to edit this record?");
	if(res==true){
var id=$(this).val();
//alert(id);
$.ajax({
  method:'get',
   url:'edituser/'+id,
   success:function(data){
      $('#Section2').hide();
      $('#Section1').show();
      //alert(data.user);
      $('input[name=name]').val(data.user.name);
      $('input[name=designation]').val(data.user.designation);
      $('input[name=location]').val(data.user.location);
      $('input[name=mobile]').val(data.user.mobile);
      $('input[name=email]').val(data.user.email);
      $('input[name=password]').val(data.user.password);
      $('input[name=id]').val(data.user.id);

      //alert(data.user.authorized);
      if(data.user.authorized == 1){
        $('input:radio[name=authorized]')[1].checked = true;
      }
      else if(data.user.authorized == 0){
        $('input:radio[name=authorized]')[0].checked = true;
      }

      $('#btnuser').html('Update');
      $('#btnuser').val('Update');
    }
  });
}
});
</script>
