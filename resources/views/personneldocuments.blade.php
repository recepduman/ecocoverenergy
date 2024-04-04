@extends('layouts.master')
@section('title')
    Personel Dokümanları
@endsection

@section('pagetitle')
    Personel Dokümanları
@endsection

@section('styles')
    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="{{ asset('plugins/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-body">
                <div class="panel-heading text-center">
                    <h3>Personel</h3>
                </div>
                <div class="panel-body text-center">
                    <img id="personnelPhoto" class="img-lg img-circle mar-btm" src="/img/profile-photos/5.png">
                    <p id="personnelName" class="text-lg text-semibold mar-no text-main">Donald Brown</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="panel panel-body">
                <div class="panel-heading text-center">
                    <h3>Personel Dokümanları</h3>
                </div>
                <div class="panel-body">

                    <table class="table table-hover table-striped table-vcenter mar-no">
                        <tbody id="documents" class="text-light">

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--Bootstrap Table [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-table/bootstrap-table.min.js') }}"></script>

    <script>
        jQuery.ajax({
            url: '/personneldocuments/' + window.location.pathname.split("/").pop(),
            type: 'get',
            success: function(returnData) {

                returnData.documents.forEach(element => {
                    var document =
                        '<tr><td class="text-center"><i class="pli-file-text-image icon-2x"></i></td><td><span class="text-lg">' +
                        element.fileName + '</span></td><td><span class="text-lg"><a href="' + element
                        .filePath +
                        '" target="_blank"class="btn btn-primary text-semibold btn-labeled"><i class="btn-label pli-file-text-image"></i>Dokümanı Aç</a></span></td></tr>';

                    $('#documents').append(document);
                });

                $('#personnelName').text(returnData.personnelName);
                $('#personnelPhoto').attr('src', returnData.photoUrl);

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



        // Sample Format for Tracking Number Column.
        // =================================================================
        function trackFormatter(value, row) {
            if (value) return '<i class="fa fa-plane"></i> ' + value;
        }

        // Sample Format for detay Column.
        // =================================================================
        function detayFormatter(value, row) {
            return '<button class="btn btn-labeled btn-purple" value="' + value +
                '" data-target="#detaylar-modal" data-toggle="modal"><i class="btn-label pli-file-text-image"></i> Detaylı Bilgi</button>';
        }

        function dokumanLinkiFormatter(value, row) {
            return '<a target="_blank" class="btn btn-labeled btn-info" href="' + value +
                '" ><i class="btn-label pli-file-text-image"></i> Dokümana Git</a>';
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

@section('modals')
@endsection
