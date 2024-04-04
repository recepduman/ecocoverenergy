@extends('layouts.master')
@section('title')
    Ana Sayfa
@endsection

@section('pagetitle')
    Ana Sayfa
@endsection

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body">

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-5">
                            <h4 class="text-main">Hoşgeldiniz, Cengizhan Günaydın.</h4>
                        </div>
                        <div class="col-md-4">
                            <img id="firm-logo" src="" alt="" style="width: 185px; margin-top:60px">
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-semibold text-center text-light">Panel Bilgisi</h3>
                </div>

                <!--Hover Rows-->
                <!--===================================================-->
                <div class="panel-body">
                    <table class="table table-hover table-striped table-bordered table-vcenter" style="margin-bottom:5px">
                        <tbody class="text-light">
                            <tr>
                                <td class="text-center"><i class="pli-information icon-2x"></i></td>
                                <td>
                                    <span class="text-semibold">Kurulu Güç (kWp)</span>
                                </td>
                                <td class="text-center"><span id="power" class="text-success text-semibold"></span></td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="pli-windows-microsoft icon-2x"></i></td>
                                <td>
                                    <span class="text-semibold">PV Modül Sayısı</span>
                                </td>
                                <td class="text-center"><span id="module-count" class="text-success text-semibold"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="pli-cpu icon-2x"></i></td>
                                <td>
                                    <span class="text-semibold"> PV Modül Teknolojisi - Gücü ve
                                        Markası</span>
                                </td>
                                <td class="text-center"><span id="module-tech" class="text-success text-semibold"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--===================================================-->
                <!--End Hover Rows-->

            </div>
        </div>
        <div class="col-md-7">
            <div class="panel">
                <div class="panel-heading mar-btm">
                    <h3 class="panel-title text-semibold text-center text-light">Paket Bilgisi</h3>
                </div>

                {{-- Toplam Yıkama Sayısı --}}
                <div class="col-md-4">
                    <div class="panel panel-purple panel-colorful">
                        <div class="pad-all media">
                            <div class="media-left">
                                <i class="pli-information icon-3x icon-fw"></i>
                            </div>
                            <div class="media-body">
                                <p id="total-cleaning-count" class="text-2x mar-no media-heading"></p>
                                <span class="text-semibold">Toplam Yıkama Sayısı</span>
                            </div>
                        </div>
                        <div class="progress progress-xs progress-success mar-no">
                            <div role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"
                                class="progress-bar progress-bar-light" style="width: 15%"></div>
                        </div>
                        <div class="pad-all">
                            <i class="pli-calendar-4 icon-lg icon-fw"></i><span class="text-semibold">Geçerlilik Tarihi:
                            </span> &nbsp; <span id="expiryDate">-</span>
                        </div>
                    </div>
                </div>
                {{-- Toplam Yıkama Sayısı --}}

                {{-- Tamamlanan Yıkama Sayısı --}}
                <div class="col-md-4">
                    <div class="panel panel-success panel-colorful">
                        <div class="pad-all media">
                            <div class="media-left">
                                <i class="pli-yes icon-3x icon-fw"></i>
                            </div>
                            <div class="media-body">
                                <p id="total-performed-cleaning-count" class="text-2x mar-no media-heading"></p>
                                <span class="text-semibold">Tamamlanan Yıkama Sayısı</span>
                            </div>
                        </div>
                        <div class="progress progress-xs progress-success mar-no">
                            <div id="total-performed-cleaning-percentage" role="progressbar" aria-valuenow="3.33"
                                aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-light"
                                style="width: 3.33%"></div>
                        </div>
                        <div class="pad-all text-lg text-center">
                            <span id="total-performed-cleaning-percentage2" class="text-semibold">0%</span>
                        </div>
                    </div>
                </div>
                {{-- Tamamlanan Yıkama Sayısı --}}

                {{-- Kalan Yıkama Sayısı --}}
                <div class="col-md-4">
                    <div class="panel panel-pink panel-colorful">
                        <div class="pad-all media">
                            <div class="media-left">
                                <i class="pli-refresh icon-3x icon-fw"></i>
                            </div>
                            <div class="media-body">
                                <p id="total-remaining-cleaning-count" class="text-2x mar-no media-heading"></p>
                                <span class="text-semibold">Kalan Yıkama Sayısı</span>
                            </div>
                        </div>
                        <div class="progress progress-xs progress-success mar-no">
                            <div id="total-remaining-cleaning-percentage" role="progressbar" aria-valuenow="96.67"
                                aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-light"
                                style="width: 96.67%"></div>
                        </div>
                        <div class="pad-all text-lg text-center">
                            <span id="total-remaining-cleaning-percentage2" class="text-semibold">0%</span>
                        </div>
                    </div>
                </div>
                {{-- Kalan Yıkama Sayısı --}}

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        jQuery.ajax({
            url: '/dashboard-data/' + getCookie('selectedArea'),
            type: 'get',
            success: function(returnData) {

                $('#firm-logo').attr('src', window.location.protocol + '//' + window.location.hostname +
                    returnData
                    .logoUrl);

                $('#power').text(returnData.power);
                $('#module-count').text(returnData.moduleCount);
                $('#module-tech').text(returnData.moduleTech);
                $('#total-cleaning-count').text(returnData.totalCleaningCount);
                $('#total-performed-cleaning-count').text(returnData.totalPerformedCleaningCount);
                $('#total-remaining-cleaning-count').text(returnData.totalRemainingCleaningCount);
                $('#expiryDate').text(returnData.expiryDate);

                var totalPerformedCleaningPercentage = (returnData.totalPerformedCleaningCount / returnData
                    .totalCleaningCount) * 100;

                var totalRemainingCleaningPercentage = (returnData.totalRemainingCleaningCount / returnData
                    .totalCleaningCount) * 100;

                $('#total-performed-cleaning-percentage').attr('aria-valuenow',
                    Number(totalPerformedCleaningPercentage).toFixed(2));
                $('#total-performed-cleaning-percentage').css('width', Number(
                    totalPerformedCleaningPercentage).toFixed(2) + '%');
                $('#total-remaining-cleaning-percentage').attr('aria-valuenow',
                    Number(totalRemainingCleaningPercentage).toFixed(2));
                $('#total-remaining-cleaning-percentage').css('width', Number(
                    totalRemainingCleaningPercentage).toFixed(2) + '%');

                $('#total-performed-cleaning-percentage2').text(Number(
                    totalPerformedCleaningPercentage).toFixed(2) + '%')

                $('#total-remaining-cleaning-percentage2').text(Number(
                    totalRemainingCleaningPercentage).toFixed(2) + '%')


                console.log(returnData);

            },
            error: function(params) {
                console.log(params);
            },
            timeout: 10000
        });
    </script>
@endsection
