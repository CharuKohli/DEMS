<div class="table-responsive">
<table class="table table-bordered" id="tblMain">
  <thead class="thead">
<tr>
<th align="center"><center>Sl.No.</center></th>
<th align="center"><center>Ticket No.</center></th>
<th align="center"><center>User Id</center></th>
<th align="center"><center>Expense Name</center></th>
<th align="center"><center>Location</center></th>
<th align="center"><center>Description</center></th>
<th align="center"><center>Date</center></th>
<th align="center"><center>Status</center></th>
@if(null==session('authuser'))
<th align="center"><center>Remark</center></th>
@endif
<!-- @if(null !==session('viewticketsbyauthuser'))
 <th align="center">Actions</th>
@endif -->
</tr>
</thead>
<tbody style="font-family:Times New Roman;font-size: 1.7rem;">
@php $i=1;
$dateformat=session('dateformat');
@endphp
@foreach($tickets as $ticket)
@php $remark=$ticket->remark;
 $ticketdate=date($dateformat,strtotime($ticket->date));
@endphp
<tr style="background-color:white;text-align:justify" id="ticketrow{{$i-1}}" onclick="getRowIndex(this)">
<td>{{$i++}}</td>
<td>{{$ticket->ticket_no}}</td>
<td>{{$ticket->user_id}}</td>
<td>{{$ticket->expense_name}}</td>
<td>{{$ticket->location}}</td>
<td>{{$ticket->description}}</td>
<td>{{$ticketdate}}</td>
<td>
@if(null !==session('authuser'))
<!-- <div class="row"><div class="col-md-8"> -->


<div class="dummyInline">
<select name="ticketstatus" class="form-control" onchange="updateStatus({{$i-1}})" id="ticketstatus{{$i-1}}">
</select>
</span>
</div>
<div class="dummyInline">
  @if($remark)
  <button type="button" class="badge badge-info btnsh{{$i-1}}" onclick="showremarkvalue({{$i-1}})">Show Remark</button>

<!-- <button class="badge badge-info" data-toggle="modal" data-target="#modalLoginForm">Add remark</button> -->
@else
<button type="button" class="badge badge-info btn{{$i-1}}" onclick="showremark({{$i-1}})">Add Remark</button>

@endif
</div>

<div class="form-popup" id="addRemarkForm{{$i-1}}">
  <form  class="form-container">
    {{csrf_field()}}
    <textarea class="form-control" name="remark" value="{{$ticket->remark}}" id="remval{{$i-1}}" placeholder="Enter remark"></textarea>
    <button type="button" class="badge badge-info" id="savebtn{{$i-1}}"onclick="saveRemark({{$ticket->id}},{{$i-1}})">Add</button>
  </form>
</div>

<div class="form-popup" id="showRemarkForm{{$i-1}}">
  <form  class="form-container">
    {{$ticket->remark}}
  </form>
</div>


<!-- <form id="remark{{$i-1}}" >
  <br>
  	{{csrf_field()}}
<textarea class="form-control" name="remark" id="remval{{$i-1}}" placeholder="Enter remark"></textarea>
<button  class="badge badge-info" onclick="saveRemark({{$ticket->id}},{{$i-1}})">save</button>
</form> -->
@else
{{$ticket->status}}
@endif
</td>
@if(null==session('authuser'))
<td>{{$ticket->remark}}</td>
@endif

</tr>
@endforeach
</tbody>
</table>
</div>
<script>

function showremark(x){
  $("#addRemarkForm"+(x)).slideToggle();
  $('#savebtn'+x).show();

}
function showremarkvalue(x){
  $("#showRemarkForm"+x).slideToggle();
}
function saveRemark(id,num){
  var remark=$('#remval'+num).val();
  //alert(remark);
  $.ajax({
    method:'get',
    url:'saveticketremark',
    data:{'id':id,'remark':remark},
    dataType:'json',
    success:function(data){
      //alert(data.msg);
      // $('.btn'+num).html('show remark');
      // $('#savebtn'+num).hide();
      //   $("#addRemarkForm"+(num)).slideUp();
      //   $('#remval'+num).val(data.msg);
      dispTickets();

    }
  });

}

var tickets={!! $tickets !!};
var rowIndex;
function getRowIndex(x){
  rowIndex=x.rowIndex;
}
function updateStatus(index){

  var id=null,userid=null;
  for(var i=0;i<tickets.length;i++){
     id=tickets[rowIndex-1].id;
     userid=tickets[rowIndex-1].user_id;
  }
  var status=$('#ticketstatus'+index).val();
  //alert("up"+status);
  $.ajax({
    method:'get',
    url:'changeticketstatus',
    data:{'status':status,'id':id,'userid':userid},
    dataType: 'json',
    success:function(data){
     $('#usertickets').html(data.html);
     colorChange(status);
      // window.location.href="http://127.0.0.1:8000/usertickets";
     }
  })
// });
}
selectStatus();
function selectStatus(){

for(var i=0;i<tickets.length;i++){
//  alert("dd"+tickets[i].status);
  $('#ticketstatus'+(i+1)).append('<option value="Pending"  >'+'Pending' +'</option>');
  $('#ticketstatus'+(i+1)).append('<option value="Approved"  >'+'Approved' +'</option>');
  $('#ticketstatus'+(i+1)).append('<option value="Not Approved"  >'+'Not Approved' +'</option>');
  $('#ticketstatus'+(i+1)).append('<option value="Not Understood"  >'+'Not Understood' +'</option>');
   var status=tickets[i].status;
  $('#ticketstatus'+(i+1)).val(status);
  var tbl = document.getElementById("tblMain");
    if(status=="Pending"){
      tbl.rows[i+1].style.color = "Orange";
    }
  else if(status=="Approved"){
    tbl.rows[i+1].style.color = "green";
    //$('#ticketrow'+(i+1)).prop('disabled', true);
  }else if(status=="Not Approved"){
    tbl.rows[i+1].style.color = "red";
  }
  else if(status=="Not Understood"){
    tbl.rows[i+1].style.color = "blue";
  }
  $("#addRemarkForm"+(i+1)).slideUp();
  $("#showRemarkForm"+(i+1)).slideUp();
}

}

function colorChange(status){

 var tbl = document.getElementById("tblMain");
   if(status=="Pending"){
     tbl.rows[rowIndex].style.color = "Orange";
   }
 else if(status=="Approved"){
   tbl.rows[rowIndex].style.color = "green";
   //$('#ticketrow'+(i+1)).prop('disabled', true);
 }else if(status=="Not Approved"){
   tbl.rows[rowIndex].style.color = "red";
 }
 else if(status=="Not Understood"){
   tbl.rows[rowIndex].style.color = "blue";
 }
}

// function showremark(index) {
//   document.getElementById("addRemarkForm"+index).style.display = "block";
// }

function closeForm(index) {
  document.getElementById("addRemarkForm"+index).style.display = "none";
}


</script>
<style>


/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: absolute;
  /* //bottom: 20px; */
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

  </style>
