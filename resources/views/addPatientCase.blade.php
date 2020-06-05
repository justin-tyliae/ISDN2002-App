@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add your patient</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <form action="{{ action('PatientCaseController@store') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="elderly-name">Choose an elderly</label>
                        <select class="form-control" id="elderly-name" name="elderly-name">
                        @if (count($patients) > 0)
                            @foreach($patients as $patient)
                                <option>{{ $patient->name }}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="patient-alias">Alias</label>
                        <textarea class="form-control" id="patient-alias" name="patient-alias" rows="3" placeholder="Try to give your patient a nick name?"> </textarea>
                    </div>
                    <div class="container">
                        <div class="row justify-content-around">
                            <button type="submit" class="btn btn-success col-md-5 mt-2">Submit</button>
                            <a href="/home" class="btn btn-danger col-md-5 mt-2">Cancel</a>
                        </div>
                    </div>
                </form>        

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
