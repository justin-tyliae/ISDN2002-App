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
                    <ul class="list-group">
                        <li class="list-group-item"> training  data</li>
                    </ul>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
