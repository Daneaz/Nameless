@extends('layouts.two')

@section('content')
<!-- Page Content -->


<div class="container">

    <div class="row" style="padding-top:30px">

        <div class="col-lg-4">

            <h1 class="my-4">Search School</h1>
            <!--<div class="list-group">-->
            <!--<a href="#" class="list-group-item">Category 1</a>-->
            <!--<a href="#" class="list-group-item">Category 2</a>-->
            <!--<a href="#" class="list-group-item">Category 3</a>-->
            <!--</div>-->
             {{ Form::open(array('method' =>'post','url'=>'/School/finder')) }}


                <div class="row">

                        <div class="col-md-4 mb-3">
                            <label  for="ccaselect" style="   margin-bottom: 0px;    margin-top: 8px;">Filter by CCA</label>
                        </div>

                        <div class="col-md-8 mb-3" >
 {!! Form::select('cca',$cca , null, ['class' => 'form-control','style' =>'width: 100%']) !!}



                        </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label  for="subject" style="   margin-bottom: 0px;    margin-top: 8px;">Filter by subject</label>
                    </div>

                    <div class="col-md-8 mb-3" >
 {!! Form::select('subject',$Subjects, null, ['class' => 'form-control','style' =>'width: 100%']) !!}


                    </div>

                </div>
  <div class="row">

                    <div class="col-md-4 mb-3">
                        <label  for="subject" style="   margin-bottom: 0px;    margin-top: 8px;">Filter by Level</label>
                    </div>

                    <div class="col-md-8 mb-3" >
{{ Form::radio('Level', 'PRIMARY', true) }} PRIMARY<br>
{{ Form::radio('Level', 'SECONDARY') }} SECONDARY<br>
{{ Form::radio('Level', 'JUNIOR COLLEGE') }} JUNIOR COLLEGE
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 mb-3" >
                        <button class="btn btn-success"  type="submit" style="float: right;" >Search</button>
                    </div>

                </div>


             {{ Form::close() }}

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-8">


                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                             <th>Address</th>
                            <th>Telephone No</th>
                            <th>Directions</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Telephone No</th>
                           <th>Directions</th>

                        </tr>
                        </tfoot>
                        <tbody>
				@foreach($School as $key => $data)
                <tr>

                    <td>{{ $data->school_name }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->telephone_no }}</td>
                <td><button value='{{$data->schoolId}}'  class="btn btn-success" onclick="showView(this)" data-id ="1" type="gothere" data-toggle="modal" data-target="#myModal">Go There</button></td>
                </tr>
				@endforeach
                </tbody>
            </table>



        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<!-- <div id="myModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
         <h3>Order</h3>

    </div>
    <div id="orderDetails" class="modal-body"></div>
    <div id="orderItems" class="modal-body"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div> -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Please Input Your Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="http://maps.google.com/maps" method="get" target="_blank">
       <input id='names' type="text" name="saddr" />
       <input id='names1' type="text" name="daddr" readonly/>
       <input type="submit" value="Get directions" />
    </form>
      <div class="--modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>



<script>
function showView(obj) {

  $("#names").html("");
  $.ajax({
      type: "GET",
      url: "School/index/" + obj.value,
      data: {
          'school_id': obj.value
      },
      success: function(datas) {
          $.each(datas, function() {
              $.each(this, function(key, value) {
               $("#names1").val(this);
              });
          });
      }
  })

};
</script>







@endsection
