@extends('layouts.master')

@section('content')

    <form action="{{ route('contactPost') }}" method="post" enctype="multipart/form-data" >

        @csrf
        <div class="form-group">
            <input name="name" class="form-control" type="text" placeholder="Name" >
        </div>

        <div class="form-group">
            <input name="email[]" class="form-control" type="email" placeholder="Work Email" >
        </div>

        <div class="form-group">
            <input name="email[]" class="form-control" type="email" placeholder="Personal Email" >
        </div>

        <div class="form-group">
            <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Message..."></textarea>
        </div>

        <div class="form-group">
            <input type="file" name="attachment" class="form-control" >
        </div>

        <div class="form-group">
            <button class="form-control" type="submit">Send</button>
        </div>
    </form>

@endsection