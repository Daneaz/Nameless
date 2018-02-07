@extends('layouts.master')

@section('content')
<!-- Page Content -->
<script>
function showView(obj) {
  var sign = obj.value.split("-");
  if (sign[0] == 'signed') {
    $("#modalTitle").html("Signed Parents");
  } else {
      $("#modalTitle").html("Unsigned Parents");
  }
    $("#names").html("");
    $.ajax({
        type: "GET",
        url: "teacherconsentForm/" + obj.value,
        data: {
            'form_id': obj.value
        },
        success: function(datas) {
            $.each(datas, function() {
                $.each(this, function(key, value) {
                    $("#names").append("<li> " +
                        this + "</li>"
                    );
                });
            });
        }
    });
};
</script>
<div class="container">

    <div class="row">

        <div class="col-lg-12">

                       <h1 class="my-4">Consent Forms</h1>
                       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                           <tr>
                               <th>Consent Form title</th>
                               <th>Signed</th>
                               <th>Not signed</th>

                           </tr>
                           </thead>
                           <tfoot>
                           <tr>
                               <th>Consent Form title</th>
                               <th>Signed</th>
                               <th>Not signed</th>

                           </tr>
                           </tfoot>
                           <tbody>
                             @if ($forms != null)
                             @foreach ($forms as $form)
                           <tr>
                               <td>{{$form->title}}</td>

                               <td><button type="button" value='signed-{{$form->consentForm_id}}' onclick="showView(this)" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >View</button></td>
                               <td><button type="button" value='unsigned-{{$form->consentForm_id}}' onclick="showView(this)" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">View</button></td>

                           </tr>
                           @endforeach
                           @endif
                           </tbody>
                       </table>
                   </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Signed Parents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id='names'>
                RAWRR
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@endsection
