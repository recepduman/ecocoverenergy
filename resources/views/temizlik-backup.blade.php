@extends('layouts.master')
@section('title')
    Temizlik
@endsection

@section('pagetitle')
    Temizlik
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
                    <h3>Temizlik</h3>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" {{-- data-url="data/bs-table.json" --}} data-search="true" data-show-refresh="true"
                        data-show-toggle="true" data-show-columns="true" data-sort-name="date" data-page-list="[5, 10, 20]"
                        data-page-size="10" data-pagination="true" data-show-pagination-switch="true" class="table-vcenter">
                        <thead>
                            <tr>
                                <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Temizleme Tarihi
                                </th>
                                <th data-field="name" data-sortable="true">Operasyon Sorumlusu</th>
                                <th data-field="detay" data-align="center" data-sortable="true"
                                    data-formatter="detayFormatter">
                                    Aksiyon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-12-01 15:00</td>
                                <td>Serkan Arslan</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2023-11-06 12:30</td>
                                <td>Ahmet Açıkalın</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2023-10-15 10:40</td>
                                <td>Selim Orta</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2023-08-21 11:00</td>
                                <td>Cem Saray</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2023-07-10 13:45</td>
                                <td>Meltem Aras</td>
                                <td></td>
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
    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="detaylar-modal" role="dialog" tabindex="-1" aria-labelledby="detaylar-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Personeller</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <table data-toggle="table" {{-- data-url="data/bs-table.json"  --}} data-search="true" data-show-refresh="true"
                        data-show-toggle="true" data-show-columns="true" data-sort-name="date" data-page-list="[5, 10, 20]"
                        data-page-size="5" data-pagination="true" data-show-pagination-switch="true" class="table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center">Personel</th>
                                <th class="text-center">Personel Adı</th>
                                <th class="text-center" data-sortable="true">Teçhizat</th>
                                <th data-sortable="true">Yıkama Öncesi Görüntüler</th>
                                <th data-sortable="true">Yıkama Sonrası Görüntüler</th>
                                <th data-sortable="true">Kabul Yapan Personel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="img/profile-photos/2.png" class="img-circle img-lg" />
                                    <p class="mar-top"><button href="#" class="btn btn-primary text-semibold"
                                            data-target="#dokumanlar-modal" data-toggle="modal">Dokümanlar</button>
                                    </p>

                                </td>
                                <td class="text-center">Ahmet Er</td>
                                <td>
                                    <p class="label label-table label-purple" style="max-width:500px">Yıkama Robotu
                                        (Rob-Sys)
                                    </p>
                                    <p class="label label-table label-pink" style="max-width:500px">Solüsyon (Chimitek)</p>
                                    <p class="label label-table label-danger" style="max-width:500px">Arıtma Sistemi
                                        (EuroTech)</p>
                                    <p class="label label-table label-mint" style="max-width:500px">Manuel Fırça
                                        (Qleentek)</p>
                                </td>
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
                                <td class="text-center">Mehmet Aydemir</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/profile-photos/4.png" class="img-circle img-lg" />
                                    <p class="mar-top"><button href="#" class="btn btn-primary text-semibold"
                                            data-target="#dokumanlar-modal" data-toggle="modal">Dokümanlar</button>
                                    </p>

                                </td>
                                <td class="text-center">Deniz Çetin</td>
                                <td>
                                    <p class="label label-table label-pink" style="max-width:500px">Solüsyon (Chimitek)
                                    </p>
                                    <p class="label label-table label-mint" style="max-width:500px">Manuel Fırça
                                        (Qleentek)</p>
                                </td>
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
                                <td class="text-center">Selçuk Kara</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger text-semibold btn-labeled" type="button"><i
                            class="btn-label psi-cross"></i>
                        Close</button>
                </div>
            </div>
        </div>
    </div>


    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="dokumanlar-modal" role="dialog" tabindex="-1" aria-labelledby="dokumanlar-modal"
        aria-hidden="true">
        <div class="modal-dialog bord-all">
            <div class="modal-content bg-dark">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Personeller</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <table data-toggle="table" {{-- data-url="data/bs-table.json"  --}} data-search="true" data-show-refresh="true"
                        data-show-toggle="true" data-show-columns="true" data-sort-name="date"
                        data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                        data-show-pagination-switch="true" class="table-vcenter">
                        <thead>
                            <tr>
                                <th data-sortable="true">Doküman Adı</th>
                                <th data-sortable="true" data-formatter="dokumanLinkiFormatter">Doküman Linki</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>İşe Katılış</td>
                                <td>https://www.africau.edu/images/default/sample.pdf</td>
                            </tr>
                            <tr>
                                <td>Gizlilik Sözleşmesi</td>
                                <td>https://www.africau.edu/images/default/sample.pdf</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger text-semibold btn-labeled" type="button"><i
                            class="btn-label psi-cross"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
