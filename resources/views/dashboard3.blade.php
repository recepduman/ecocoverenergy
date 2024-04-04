@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('pagetitle')
    Dashboard
@endsection

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body">
                <div class="panel-heading text-center">
                    <h3>Dashboard</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Saha Adı:</label>
                                    <input type="text" class="form-control text-bold text-lg" value="Saha 1" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Panel Sayısı:</label>
                                    <input type="text" class="form-control text-bold text-lg" value="5260" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Kurulu Güç:</label>
                                    <input type="text" class="form-control text-bold text-lg" value="50 kW" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="col-sm-3">
                            <!--Tile-->
                            <!--===================================================-->
                            <div class="panel panel-success panel-colorful">
                                <div class="pad-all text-center">
                                    <span class="text-3x text-thin">53</span>
                                    <p class="text-semibold">Üretilen Güç (kwH)</p>
                                    <i class="pli-line-chart-4 icon-lg"></i>
                                </div>
                            </div>
                            <!--===================================================-->
                        </div>
                        <div class="col-sm-3">
                            <!--Tile-->
                            <!--===================================================-->
                            <div class="panel panel-danger panel-colorful">
                                <div class="pad-all text-center">
                                    <span class="text-3x text-thin">2</span>
                                    <p class="text-semibold">Aktif Problemler</p>
                                    <i class="pli-close icon-lg"></i>
                                </div>
                            </div>
                            <!--===================================================-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
