@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <script>
    </script>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="my-4">View Result</h1>

                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Grade</th>
                        <th>Pass/Fail</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Grade</th>
                        <th>Pass/Fail</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if ($student != null)

                            @foreach ($student as $student)
                                <tr>
                            <td>{{$student->subject}}</td>
                            <td>{{$student->marks}}</td>
                            <td>{{$student->grade}}</td>
                            <td>{{$student->pass}}</td>
                                </tr>
                            @endforeach

                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
