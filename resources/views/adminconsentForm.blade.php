@extends('layouts.master')

@section('content')
<script>
function showCreate() {
   document.getElementById('create').style.display = "block";
   document.getElementById('delete').style.display = "none";
}
function showDelete() {
  alert('Form Created Successfully.')
  document.getElementById('create').style.display = "none";
  document.getElementById('delete').style.display = "block";
}
</script>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="my-4">Consent Form</h1>
                <div style="    padding-bottom: 10px; ">
                    <button type="button" class="btn btn-success" style='width:150px;' onclick='showCreate()'>Create Form</button>
                </div>
        </div>


      <div class="col-lg-8" id="create" style='display:none'>
            <h1 class="my-4">Create Form</h1>
            {{ Form::open(array('url' => 'adminconsentForm')) }}
                <input type="text" class="form-control" name="title" placeholder="Enter form title here">
            <textarea class="form-control" rows="16" name="content"></textarea>
            {{ Form::hidden('action' , 'create') }}
            <button type="submit" class="btn btn-primary" style="float: right;" onclick="showDelete()">Create</button>
            {{ Form::close() }}
        </div>

        <div class="col-lg-8" id="delete" style='display:block'>
              <h1 class="my-4">Delete Form</h1>
              <table id="case" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>Form Title</th>
                      <th>Delete</th>
                  </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>Form Title</th>
                      <th>Delete</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    @if ($forms!=null)
                    @foreach ($forms as $form)
                  <tr>
                      <td style='width:150px'>{{$form->title}}</td>
                      <td style='width:50px'>
                        {{ Form::open(array('url' => 'adminconsentForm')) }}
                          {{ Form::hidden('action' , 'delete') }}
                        <input type='hidden' value="{{$form->consentForm_id}}" name='form_id' />
                      <button type="submit" class="btn btn-danger" onclick="alert('Form Deleted.')" >Delete</button>
                      {{Form::close()}}
                      </td>
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
              </table>

          </div>

        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection
