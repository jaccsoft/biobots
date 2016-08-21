@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center" style="margin-bottom: 10px; margin-top:-80px">
            <iframe width="915" height="515" 
           			 src="https://www.youtube.com/embed/erBt--NsUjE?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen>
            </iframe>
        </div>
        <div class="col-md-12 text-center">
            <a href="{!!URL::to('dashboard')!!}" class="btn btn-danger" style="text-decoration: none;"> Analyze Data Now
            </a>
        </div>
    </div>
@endsection
