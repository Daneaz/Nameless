@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <script>
    </script>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="my-4">Upload Results</h1>

                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif

                {{ Form::open(array('url'=>'importExcel', 'files' => true)) }}
                    <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            {{ Form::label('name', 'Please select a CSV file.') }}
                            <input id="csv_file" type="file" class="form-control" name="import_file" required>
                            @if ($errors->has('csv_file'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                               Upload
                            </button>
                        </div>
                    </div>
               {{ Form::close() }}


            </div>
        </div>
    </div>
@endsection
