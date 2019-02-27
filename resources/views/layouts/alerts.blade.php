
<!-- <div class="container"> -->
    <!-- <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-10"> -->
      @php
     $count=count($duedate);
    @endphp
    @if($count>0)

    <!-- <div class="table-responsive"> -->
    <h4 class="expalert">Due dates of expenses</h4>
    <table class="table table-bordered" style="text-align:center;border:0">
    <thead class="thead">
    <tr >
    <th><center>Expense Name</center></th>
    <th><center>Due Date</center></th>
    </tr>
</thead>
    @for($i=0;$i<$count;$i++ )
    <tr  align="justify" >
    <td >{{$expname[$i]}}</td>
    <td >{{$duedate[$i]}}</td>
    </tr>
    @endfor
    </table>
    @else
    <div class="alert alert-danger"><center><b>There Are No Notifications</b></center> </div>
    @endif
<!-- </div> -->
<!-- <div class="col-md-1"></div>
</div>
</div> -->
