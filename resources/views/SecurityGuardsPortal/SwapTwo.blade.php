@extends('SecurityGuardsPortal.master4')

@section('Title') Swap Module @endsection


@section('mtitle') Select Establishment @endsection

@section('content')


<div class="row">

  <div class="col-md-12">
    <div class="white-box"  style="border: 2px solid black;">

    <div class="row  el-element-overlay">
         <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                 <thead>
                   <tr>
                     <th width="10%">Image</th>
                     <th width="40%">Name</th>
                     <th>Shift </th>
                     <th width="20%" data-sort-ignore="true" >Actions</th>
                   </tr>
                 </thead>
                 <div class="form-inline padding-bottom-15">
                   <div class="row">
                     <div class="col-sm-6"></div>
                     <div class="col-sm-6 text-right m-b-20">
                       <div class="form-group">
                         <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                      autocomplete="off">
                       </div>
                     </div>
                   </div>
                 </div>

                 <tbody>
                    @foreach($emp as $e)
                        <tr>
                            <td><img src='{{asset("uploads/$e->image")}}' height="100" alt="Systemlogo" /></td>
                            <td>{{$e->fname}} {{$e->mname}} {{$e->lname}}</td>
                            <td>{{$e->shiftfrom}} - {{$e->shiftto}}</td>
                            <td class="text-center"><button onclick="swap('{{$e->eid}}','{{$e->esid}}')" type="button" class="btn btn-success">Swap with this Guard</button></td>
                        </tr>
                    @endforeach
                 </tbody>
                 <tfoot>
                  <tr>
                    <td colspan="4"></td>
                  </tr>
                </tfoot>
        </table> 
    </div>

    <div class="white-box">
      
    </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<script>
    function swap(emp,est){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         }); 

         $.ajax({
         type: 'post',
         url: '/RequestSwap',
         data: {
           emp: emp,
           est: est,
         },
         success: function(data){
            if(data==="true"){
                alert("Request has been sent")
                window.location="/SecurityGuardsPortalRequest";
            }
            else{
                alert("error");
            }
         }
  });

    }
</script>

 @endsection
