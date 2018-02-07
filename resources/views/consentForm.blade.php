@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
   alert('Please read the details, terms and condition before signing the electronic form.');
 });
function dynamic() {
    var str = document.getElementById("forms").value.split("|");
    document.getElementById("content").value= str[1];
    document.getElementById('formtitle').innerHTML = str[2];
    document.getElementById("form_id").value =  str[0];
}

function validate() {
  if (document.getElementById("agreed").checked == true) {
      alert('Consent Form Signed Successfully.');
      return true;
  } else {
    alert('Please give your consent by checking the box.');
    event.preventDefault();
    return false;
  }
}


</script>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-4">

            <h1 class="my-4">Consent Form</h1>


                <form class="form-inline"  action="">
                    <label class="mr-sm-2" for="inlineFormCustomSelectPref">Forms</label>

                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="forms" style="width: 70%" onchange="dynamic()">
                      <option value="" disabled selected>Select your forms</option>
                        @if ($forms!=null)
                        @foreach ($forms as $form)
                        <option value="{{ $form->consentForm_id }}|{{$form->form}}|{{$form->title}}">{{ $form->title }}</option>
                        @endforeach
                        @endif
                    </select>

                </form>



        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-8">

            <h1 class="my-4" id='formtitle'>Consent Form Title</h1>

              {{Form::open(array('url'=>'consentForm','method'=>'post' ,'id'=>'form', 'onsubmit'=>'validate();' )) }}

                    <textarea class="form-control" rows="16" id="content" value="" disabled></textarea>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="agreed" /> By checking this checkout box, you have read the consent form and agreed for your child/ward to take part in the event stated above.
                                    @if (Auth::check())
                                    <input type="hidden" value="{{Auth::user()->id }}" name="user_id" /input>
                                    @endif
                                    <input type="hidden" value="" name="form_id" id="form_id" /input>
                                </label>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary" style="float: right;">Sign</button>

              {{Form::close()}}
        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


@endsection
