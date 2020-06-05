@php
use Carbon\Carbon;
$dt = Carbon::now();
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @elseif (session('failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <form action="{{ action('PatientCaseController@update', ['patient_case' => $patient_case]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <label for="suggestions"> Give some suggestions to the patient </label>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" id="suggestions" name="suggestions" rows="3">{{ $patient_case->doctor_suggestions }}</textarea>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">Update suggestions</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card mt-4">

                <div class="card-header">
                    Training history
                </div>
                <div class="card-body">
                    @if (count($training_data) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Device</th>
                                <th scope="col">Time</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach($training_data as $training_dat)
                        <tbody>
                            <tr>
                                <td>{{ $training_dat->device_type }}</td>
                                <td>{{ $training_dat->created_at }}</td>
                                @if($training_dat->finished)
                                <td> {{ $training_dat->duration_time }} </td>
                                @else
                                <td> On going... </td>
                                @endif
                                <td> <a href="{{ action('TrainingDataController@show', ['training_datum' => $training_dat]) }}"> View report </a> </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    This patient has no training data.
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
