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
                    Training report
                </div>

                <div class="card-body text-center">
                    <img src="https://lh3.googleusercontent.com/proxy/r-drq1ajDjZifzcbo1OSr6ezAl6FWT_mVpDIivQ8jOT_hQhyZJyuNeCwKXbI2JVgE2T4SNCcSVCGEmu47RqfyTmdIivtoJbMaz_vbHd1MdfzYXX3rWjfHF7mlzM_7bJy36R7">
                </div>
            </div>
        </div>
    </div>
    @endsection
