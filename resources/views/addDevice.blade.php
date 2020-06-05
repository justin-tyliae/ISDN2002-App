@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add your device</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <form action="{{ action('DevicesController@store') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="device-name">Device name</label>
                        <input class="form-control" id="device-name" name="device-name" placeholder="Give it a name.">
                    </div>
                    <div class="form-group">
                        <label for="device-id">Device ID</label>
                        <input class="form-control" id="device-id" name="device-id" placeholder="Please find your ID on your device.">
                    </div>
                    <div class="form-group">
                        <label for="device-type">Device type</label>
                        <select class="form-control" id="device-type" name="device-type">
                        <option>Glove</option>
                        <option>Ball</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="device-alias">Alias</label>
                        <textarea class="form-control" id="device-alias" name="device-alias" rows="3" placeholder="Try to give your device a nick name?"> </textarea>
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
