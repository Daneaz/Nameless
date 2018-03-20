@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <script>
        $(function () {
            $('.button-checkbox').each(function () {
                var $widget = $(this),
                    $button = $widget.find('button'),
                    $checkbox = $widget.find('input:checkbox'),
                    color = $button.data('color'),
                    settings = {
                        on: {
                            icon: 'glyphicon glyphicon-check'
                        },
                        off: {
                            icon: 'glyphicon glyphicon-unchecked'
                        }
                    };
                $button.on('click', function () {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                });
                $checkbox.on('change', function () {
                    updateDisplay();
                });

                function updateDisplay() {
                    var isChecked = $checkbox.is(':checked');
                    $button.data('state', (isChecked) ? "on" : "off");
                    $button.find('.state-icon')
                        .removeClass()
                        .addClass('state-icon ' + settings[$button.data('state')].icon);
                    if (isChecked) {
                        $button
                            .removeClass('btn-default')
                            .addClass('btn-' + color + ' active');
                    }
                    else {
                        $button
                            .removeClass('btn-' + color + ' active')
                            .addClass('btn-default');
                    }
                }

                function init() {
                    updateDisplay();
                    if ($button.find('.state-icon').length == 0) {
                        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"> </i> ');
                    }
                }

                init();
            });
        });

        var arr = [];

        function appendList(phone) {
            arr.push(phone);
        }

        function mark() {

            var request;
            request = $.ajax({
                type: "GET",
                url: "publishStud/send",
                data: {'names': arr},
            });
            arr = [];
            alert('Attendance Published Successfully.');
            location.reload();
        }

        function checkall() {
            $("#example").find(".btn").trigger("click");
        }
    </script>
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">Publish Attendance</h1>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Student Names</th>
                        <th>Present</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Student Names</th>
                        <th>Present</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if ($students != null)
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>

                                <td>
                                 <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="success"
                                          onclick="appendList({{$student->phone}})">Present</button>
                                  <input type="checkbox" class="hidden" style="display:none" value="{{$student->phone}}"
                                         id="{{$student->phone}}"/>
                              </span>
                                </td>
                                <!-- <button type="button" value='' onclick="showView(this)" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >View</button></td> -->

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                </br>
                <div style='display:block; float: right; margin-right:37.5%'>
                    {{ Form::button('All Present', array('class' => 'btn btn-success',  'onclick' => 'checkall()', 'style'=>'width:120px')) }}
                    &nbsp;&nbsp;
                    {{ Form::button('Submit', array('class' => 'btn btn-success',  'onclick' => 'mark()' , 'style'=>'width:120px')) }}
                </div>
            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
