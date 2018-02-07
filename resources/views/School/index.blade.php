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
                          
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Telephone No</th>
                           
                        </tr>
                        </tfoot>
                        <tbody>
				@foreach($School as $key => $data)
                <tr>

                    <td>{{ $data->school_name }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->telephone_no }}</td>
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



@endsection
