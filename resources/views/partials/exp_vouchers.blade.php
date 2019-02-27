
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10" style="height:500px;">
    <!-- <img src="" id="uservoucherimg" class="img-responsive"> -->
    @if(session('adminsection')==null && session('report')==null)
      <form class="form-horizontal" id="billupload">
      {{csrf_field()}}
     <div class="form-group">
        <label class="col-md-3 control-label" for="exampleInputFirstName2">Upload Voucher</label>
        <div class="col-md-5">
          <input type="file" class="form-control" autocomplete="off"name="exp_bill" id="expbill">
         <span id="invalidfile"></span>
        </div>
        <div class="col-md-2" style="bottom:20px">
          <button class="btn btn-primary" type="submit">Upload</button>
        </div>
    </div>
  </form>
  @else
<br><br>
  @endif
  <div class="row" style="border:solid 1px black;overflow:scroll;overflow-x: auto;height:450px">
  <div style="margin:10px;font-weight:600">
   <p  class="dummyInline">User Id :<span style="color:blue"> {{session('userid')}}</span></p>
   <p  class="dummyInline"> Expense Name :<span style="color:blue">{{$exp_name}}</span></p>
 </div>
    @php
    $len=count($voucherid);
    @endphp
    @for($i=0;$i<$len;$i++)
    @php
         $path=$voucherpath[$i];
         $imageid=$voucherid[$i];
    @endphp
<div class="voucher-pic" >


<img src="{{$path}}" class="img-thumbnail" align="center"alt="no image">
@if(!session('adminsection') && session('report')==null)
<li class="delete" value="{{$imageid}}"><i class="fa fa-trash fa-lg"></i></li>
@endif

</div>

<hr>
@endfor
</div>
  </div>
  </div>
<script>

$('#billupload').submit(function(e){
  e.preventDefault();
  var billimage = $('#expbill').prop('files')[0];
  var id='{!! $expid !!}';
  var expname='{!! $exp_name !!}';
  var finaldata=new FormData();
  finaldata.append('file',billimage);
  finaldata.append('expname',expname);
  finaldata.append('id',id);
if(billimage!=undefined){
  $('#invalidfile').html(null);
  $.ajax({
      type:'post',
      url:'uploadbill',
      data:finaldata,
      dataType : "json",
      contentType: false,
      cache: false,
      processData:false,
      success:function(data){
      alert(data.msg);
      showAllVouchers(id);
      }

  });
}else{
  $('#invalidfile').html('Please select image before uploading');
  $('#invalidfile').css('color','red');
}
});

$('.delete').click(function(){

  var imgid=$(this).val();
//  alert(imgid);
  var res=confirm("Are you sure to delete this voucher?");
  	if(res==true){
  $.ajax({
    type:'get',
    url:'deletevoucher/'+imgid,
    success:function(data){
      var id='{!! $expid !!}';
      showAllVouchers(id);
    }
  });
}
});

function showAllVouchers(id){
  $.ajax({
    method:'get',
     url:'showuserbill/'+id,
     success:function(data){
         var billname=data.html;
        $('#vouchers').html(billname);
       }
  });
}

</script>
@if(!session('adminsection') && session('report')==null)
<style>
.voucher-pic {
	position: relative;
	display: inline-block;
}

.voucher-pic:hover .delete {
	display: block;
  opacity: 1;
}
.voucher-pic:hover img {
  opacity: 0.3;
}


.delete {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  cursor: pointer;
}

.delete a {
	color: #000;
}

</style>
@endif
