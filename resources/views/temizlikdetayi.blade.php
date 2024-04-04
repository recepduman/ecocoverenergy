@extends('layouts.master')
@section('title')
    Temizlik Detayı
@endsection

@section('pagetitle')
    Temizlik Detayı
@endsection

@section('styles')
    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="{{ asset('plugins/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">

    <!--Unite Gallery [ OPTIONAL ]-->
    <link href="{{ asset('plugins/unitegallery/css/unitegallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/unitegallery/themes/default/ug-theme-default.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">

        <div class="col-md-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-body">
                        <div class="panel-heading text-center">
                            <h3>Personeller</h3>
                        </div>
                        <div class="panel-body pad-no mar-top">

                            <div id="personnels" class="list-group bg-trans">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-body">
                        <div class="panel-heading text-center">
                            <h3>Kullanılan Teçhizatlar</h3>
                        </div>
                        <div class="panel-body pad-no mar-top">

                            <table class="table table-hover  table-vcenter mar-no">
                                <tbody id="equipments" class="text-light">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-body">
                        <div class="panel-heading text-center">
                            <h3>Yıkama Öncesi Görüntüler</h3>
                        </div>
                        <div class="panel-body pad-no mar-top">
                            <div class="pad-all">
                                <div id="images-before-cleaning" style="display:none;">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-body">
                        <div class="panel-heading text-center">
                            <h3>Yıkama Sonrası Görüntüler</h3>
                        </div>
                        <div class="panel-body pad-no mar-top">
                            <div class="pad-all">
                                <div id="images-after-cleaning" style="display:none;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>











    </div>
@endsection

@section('scripts')
    <!--Bootstrap Table [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-table/bootstrap-table.min.js') }}"></script>

    <script src="{{ asset('plugins/unitegallery/js/unitegallery.min.js') }}"></script>
    <script src="{{ asset('plugins/unitegallery/themes/default/ug-theme-default.js') }}"></script>

    <script>
        jQuery.ajax({
            url: '/cleaningdetails/' + window.location.pathname.split("/").pop(),
            type: 'get',
            success: function(returnData) {

                returnData.personnels.forEach(personnel => {

                    var personnelHtml =
                        '<div class="list-group-item mar-btm"><div class="media-left pos-rel"><img class="img-circle img-md" src="' +
                        personnel.photoUrl +
                        '"></div><div class="media-body"><p class="text-light text-lg">' + personnel
                        .name +
                        '</p><a href="/personel-dokumanlari/' + personnel.id +
                        '" target="_blank" class="btn btn-sm btn-primary text-semibold btn-labeled"><i class="btn-label pli-file-text-image"></i>Dokümanlar</a></div></div>';

                    $('#personnels').append(personnelHtml);

                });

                var yikamaRobotu =
                    '<tr><td class="text-center"><i class="pli-projector icon-2x"></i></td><td><span class="text-lg">Yıkama Robotu (Rob-Sys)</span></td></tr>';

                var solusyon =
                    '<tr><td class="text-center"><i class="pli-chemical icon-2x"></i></td><td><span class="text-lg">Solüsyon (Chimitek)</span></td></tr>';

                var aritma =
                    '<tr><td class="text-center"><i class="pli-filter-2 icon-2x"></i></td><td><span class="text-lg">Arıtma Sistemi (EuroTech)</span></td></tr>';

                var firca =
                    '<tr><td class="text-center"><i class="pli-paint-brush icon-2x"></i></td><td><span class="text-lg">Manuel Fırça (Qleentek)</span></td></tr>';

                returnData.equipments.forEach(equipment => {
                    if (equipment == "Yıkama Robotu (Rob-Sys)") {
                        $('#equipments').append(yikamaRobotu);
                    } else if (equipment == "Solüsyon (Chimitek)") {
                        $('#equipments').append(solusyon);
                    } else if (equipment == "Arıtma Sistemi (EuroTech)") {
                        $('#equipments').append(aritma);
                    } else if (equipment == "Manuel Fırça (Qleentek)") {
                        $('#equipments').append(firca);
                    }
                });

                returnData.imagesBeforeCleaning.forEach(image => {
                    var imageHtml = '<img src="' + image + '" data-image="' + image +
                        '" style="display:none">';
                    $('#images-before-cleaning').append(imageHtml);
                });

                returnData.imagesAfterCleaning.forEach(image => {
                    var imageHtml = '<img src="' + image + '" data-image="' + image +
                        '" style="display:none">';
                    $('#images-after-cleaning').append(imageHtml);
                });



                $("#images-before-cleaning").unitegallery({
                    theme_enable_text_panel: false,
                    slider_scale_mode: "fit",
                    gallery_width: "100%",
                    gallery_play_interval: 5000,
                    gallery_autoplay: true,
                    slider_enable_fullscreen_button: true,
                    slider_enable_play_button: true,
                });
                $("#images-after-cleaning").unitegallery({
                    theme_enable_text_panel: false,
                    slider_scale_mode: "fit",
                    gallery_width: "100%",
                    gallery_play_interval: 5000,
                    gallery_autoplay: true,
                    slider_enable_fullscreen_button: true,
                    slider_enable_play_button: true,
                });

                console.log(returnData);

            },
            error: function(params) {
                console.log(params);
            },
            timeout: 10000
        });
    </script>

    <script>
        // BOOTSTRAP TABLES USING FONT AWESOME ICONS
        // =================================================================
        // Require Bootstrap Table
        // http://bootstrap-table.wenzhixin.net.cn/
        //
        // =================================================================
        jQuery.fn.bootstrapTable.defaults.icons = {
            paginationSwitchDown: 'pli-arrow-down',
            paginationSwitchUp: 'pli-arrow-up',
            refresh: 'pli-repeat-2',
            toggle: 'pli-layout-grid',
            columns: 'pli-check',
            detailOpen: 'psi-add',
            detailClose: 'psi-remove'
        }

        // FORMAT COLUMN
        // Use "data-formatter" on HTML to format the display of bootstrap table column.
        // =================================================================


        // Sample format for Invoice Column.
        // =================================================================
        function invoiceFormatter(value, row) {
            return '<a href="#" class="btn-link" > Order #' + value + '</a>';
        }




        // Sample Format for User Name Column.
        // =================================================================
        function nameFormatter(value, row) {
            return '<a href="#" class="btn-link" > ' + value + '</a>';
        }




        // Sample Format for Order Date Column.
        // =================================================================
        function dateFormatter(value, row) {
            var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
            return '<span class="text-bold"><i class="psi-clock"></i> ' + value + '</span>';
        }



        // Sample Format for Order Status Column.
        // =================================================================
        function statusFormatter(value, row) {
            var labelColor;
            if (value == "Paid") {
                labelColor = "success";
            } else if (value == "Unpaid") {
                labelColor = "warning";
            } else if (value == "Shipped") {
                labelColor = "info";
            } else if (value == "Refunded") {
                labelColor = "danger";
            }
            var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
            return '<div class="label label-table label-' + labelColor + '"> ' + value + '</div>';
        }

        // Sample Format for Order Status Column.
        // =================================================================
        function bakimOnarimTipiFormatter(value, row) {
            var labelColor;
            if (value == "Genel Bakım") {
                labelColor = "info";
            } else if (value == "Arıza") {
                labelColor = "danger";
            }
            var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-user';
            return '<div class="label label-table label-' + labelColor + '"> ' + value + '</div>';
        }



        // Sample Format for Tracking Number Column.
        // =================================================================
        function trackFormatter(value, row) {
            if (value) return '<i class="fa fa-plane"></i> ' + value;
        }

        // Sample Format for detay Column.
        // =================================================================
        function detayFormatter(value, row) {
            return '<button class="btn btn-labeled btn-purple" value="' + value +
                '" data-loading-text="Loading..." onclick="openAlmRunResult(' + value +
                ', this)"><i class="btn-label pli-file-text-image"></i> Detay</button>';
        }



        // Sort Price Column
        // =================================================================
        function priceSorter(a, b) {
            a = +a.substring(1); // remove $
            b = +b.substring(1);
            if (a > b) return 1;
            if (a < b) return -1;
            return 0;
        }
    </script>
@endsection
