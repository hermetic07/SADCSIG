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
                     <th width="40%">Establishment Name</th>
                     <th width="40%">Address </th>
                     <th width="30%" data-sort-ignore="true" >Actions</th>
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
                    @foreach($es as $e)
                        <tr>
                            <td>{{$e->name}}</td>
                            <td>{{$e->address}} {{$e->aname}} City</td>
                            <td><a href="{{URL('/SwapRequestStepTwo',$e->id)}}" type="button" class="btn btn-success">Choose this Establishment</a></td>
                        </tr>
                    @endforeach
                 </tbody>
                 <tfoot>
                  <tr>
                    <td colspan="3"></td>
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


 @endsection
