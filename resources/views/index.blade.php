@extends('layouts.master')

@section('title', 'Dashboard')

@section('btn-input')
    <div class="pull-right" style="margin-top: -40px;">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importModal">Import</button>
    </div>
@endsection

@section('search-input')
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="contact-list-filter">Filter</label>
                <input type="text" class="form-control" id="contact-list-search">
                <span id="helpBlock" class="help-block">by user email or serial number</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <ul class="list-group" id="contact-list">
            @foreach($users as $user)
                <li class="list-group-item col-md-2">
                    <a href="{!!URL::to('show',[$user->id] )!!}">
                        <div class="col-md-12 search">
                            <img class="profile-img social" src="{{ asset('icon-user-default.png') }}" alt="">
                            <p style="" class="name text-center">
                                {{$user->email}}<br>{{$user->serial}}
                            </p>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModal"
         data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Import File</h4>
                </div>
                {!! Form::open(array('url'=>'importFile','files'=>true, 'method'=>'POST')) !!}

                <div class="modal-body">
                    <input type="file" name="filefield">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    {!!Html::script('js/jquery.searchable-1.0.0.min.js')!!}
    {!!Html::script('js/app.js')!!}
@endsection