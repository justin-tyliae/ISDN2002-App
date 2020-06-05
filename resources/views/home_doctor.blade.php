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
                <div class="card-header">
                    @if (!Auth::guest())
                    @if ($dt->hour >= 6 AND $dt->hour < 12) Good morning, {{Auth::user()->name}}! @elseif ($dt->hour >= 12 AND $dt->hour < 18) Good afternoon, {{Auth::user()->name}}! @else Good evening, {{Auth::user()->name}}! @endif @endif </div>

                            <div class="card-body">
                                Start to greet your patients!
                            </div>
                </div>
            </div>

            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header">My patients</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <a href="{{ action('PatientCaseController@create') }}" class="btn btn-primary">Add a patient</a>
                        </div>

                        <div class="row pt-4">
                            @if (count($patient_cases) > 0)
                            @foreach($patient_cases as $patient_case)
                            <div class="col-xl-4 pb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        {{ $patient_case->patient_name }}
                                    </div>
                                    <div class="card-body">
                                        {{ $patient_case->alias }}
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-around">
                                            <a href="{{ action('PatientCaseController@show', ['patient_case' => $patient_case]) }}" class="btn btn-primary col-md-5"> View </a>
                                            <form method="POST" action="{{ action( 'PatientCaseController@destroy', ['patient_case' => $patient_case] ) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Are you sure you want to remove this patient?") }}') ? this.parentElement.submit() : ''">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="card-body">
                                <p class="text-center"> No devices available! </p>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
