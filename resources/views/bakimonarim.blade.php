@extends('layouts.master')
@section('title')
    Bakım & Onarım
@endsection

@section('pagetitle')
    Bakım & Onarım
@endsection

@section('styles')
    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="{{ asset('plugins/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body">
                <div class="panel-heading text-center">
                    <h3>Bakım & Onarım</h3>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" {{-- data-url="data/bs-table.json"  --}} data-search="true" data-show-refresh="true"
                        data-show-toggle="true" data-show-columns="true" data-sort-name="date" data-page-list="[5, 10, 20]"
                        data-page-size="10" data-pagination="true" data-show-pagination-switch="true" class="table-vcenter">
                        <thead>
                            <tr>
                                <th data-sortable="true" data-formatter="dateFormatter">Tarih
                                </th>
                                <th data-sortable="true" data-formatter="bakimOnarimTipiFormatter" class="text-center">Bakım
                                    &
                                    Onarım
                                    Tipi</th>
                                <th data-sortable="true">Kısa Açıklama</th>
                                <th data-sortable="true">Detay Açıklama</th>
                                <th data-sortable="false">Görüntüler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-10-15 10:40</td>
                                <td>Genel Bakım</td>
                                <td>Bakım tamamlandı.</td>
                                <td>Genel bakım işlemi uygulandı.</td>
                                <td class="text-center"><a href="img/gallery/big/panels/cleanpanel1.jpg"
                                        target="_blank"><img src="img/gallery/big/panels/cleanpanel1.jpg"
                                            class="img-sm mar-all w-full" /></a>
                                    <a href="img/gallery/big/panels/cleanpanel2.jpg" target="_blank"><img
                                            src="img/gallery/big/panels/cleanpanel2.jpg" class="img-sm mar-all" /></a><a
                                        href="img/gallery/big/panels/cleanpanel3.png" target="_blank"><img
                                            src="img/gallery/big/panels/cleanpanel3.png" class="img-sm mar-all" /></a><a
                                        href="img/gallery/big/panels/cleanpanel4.png" target="_blank"><img
                                            src="img/gallery/big/panels/cleanpanel4.png" class="img-sm mar-all" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-07-10 13:45</td>
                                <td>Arıza</td>
                                <td>Kablo problemi giderildi.</td>
                                <td>Kabloların aşınmasından kaynaklı yaşanan kesinti için kablo değişimi yapıldı.</td>
                                <td class="text-center">
                                    <a href="img/gallery/big/panels/dirtypanel1.png" target="_blank"><img
                                            src="img/gallery/big/panels/dirtypanel1.png"
                                            class="img-sm mar-all w-full" /></a>
                                    <a href="img/gallery/big/panels/dirtypanel2.png" target="_blank"><img
                                            src="img/gallery/big/panels/dirtypanel2.png" class="img-sm mar-all" /></a><a
                                        href="img/gallery/big/panels/dirtypanel3.jpg" target="_blank"><img
                                            src="img/gallery/big/panels/dirtypanel3.jpg" class="img-sm mar-all" /></a><a
                                        href="img/gallery/big/panels/dirtypanel4.jpg" target="_blank"><img
                                            src="img/gallery/big/panels/dirtypanel4.jpg" class="img-sm mar-all" /></a>
                                </td>
                            </tr>
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
