@extends('layouts.master')

@section('title', 'Show Data')

@section('margin')
    margin-top: 80px;
@endsection

@section('btn-input')
    <div class="pull-right" style="margin-top: -50px;">
        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <em>{{$user->serial}}</em><br>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <em>{{$user->email}}</em>
    </div>
@endsection

@section('content')
    <div class="row" style="padding-bottom: 30px;">
        <legend>Printer Data</legend>
        <div class="col-md-12" id="printData" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="row" style="padding-bottom: 30px;">
        <legend>Printer Information
            <small>(<em>Crosslinking</em>)</small>
        </legend>
        <div class="col-md-12" id="printCrosslink" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="row" style="padding-bottom: 30px;">
        <legend>Printer Information
            <small>(<em>Pressure</em>)</small>
        </legend>
        <div class="col-md-12" id="pressureChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="row" style="padding-bottom: 30px;">
        <legend>Printer Information
            <small>(<em>Resolution</em>)</small>
        </legend>
        <div class="col-md-12" id="resolutionChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
@endsection

@section('custom_scripts')

    <script>
        var printDataUrl = "{{url('printDataChart',[$id])}}",
                printCrosslinkUrl = "{{url('printCrosslinkChart',[$id])}}",
                pressureUrl = "{{url('printPressureChart',[$id])}}",
                resolutionUrl = "{{url('printResolutionChart',[$id])}}";
    </script>

    {!!Html::script('js/highcharts.js')!!}
    {!!Html::script('js/charts.js')!!}
@endsection