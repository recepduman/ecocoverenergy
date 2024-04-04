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
    <style>
        .widget-header {
            min-height: 100px !important;
        }

        .widget-body {
            padding: 50px 0px 0px 0px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body">
                <div class="panel-heading text-center">
                    <h3>Temizlik</h3>
                </div>
            </div>
        </div>
        <div id="cleanings">
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


    <script>
        jQuery.ajax({
            url: '/cleanings-data/' + getCookie('selectedArea'),
            type: 'get',
            success: function(returnData) {

                returnData.forEach(element => {
                    var id = element.id;
                    var status = element.status;
                    var date = element.date;
                    var responsible = element.responsible;

                    var bgColor = status == "Tamamlandı" ? "success" : "warning";
                    var widgetIcon = status == "Tamamlandı" ? "clean.png" : "clean2.png";

                    var widget =
                        '<div class="col-md-2"><div class="panel widget"><div class="widget-header bg-' +
                        bgColor + ' text-center"><h4 class="text-light mar-no pad-top">' +
                        status +
                        '</h4></div><div class="widget-body"><img alt="Profile Picture" class="widget-img img-circle img-border-light" src="img/' +
                        widgetIcon +
                        '"><table class="table table-hover  table-vcenter mar-no"><tbody class="text-light"><tr><td class="text-center"><i class="pli-calendar-4 icon-lg"></i></td><td><span class="text-semibold">Tarih</span></td><td class="text-center"><span id="power"class="text-warning text-semibold">' +
                        date +
                        '</span></td></tr><tr><td class="text-center"><i class="pli-user icon-lg"></i></td><td><span class="text-semibold">Sorumlu</span></td><td class="text-center"><span id="power" class="text-warning text-semibold">' +
                        responsible +
                        '</span></td></tr><tr><td colspan="3" class="pad-lft-no"><a href="/temizlik-detayi/' +
                        id +
                        '" class="btn btn-labeled btn-purple btn-block text-center text-semibold"value="\' + value +\'" ><i class="btn-label pli-file-text-image"></i> Detaylı Bilgi</a></td></tr></tbody></table></div></div></div>';

                    $('#cleanings').append(widget);


                    console.log(returnData);
                });
            },
            error: function(params) {
                console.log(params);
            },
            timeout: 10000
        });
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
                                    <p class="label label-table label-pink" style="max-width:500px">Solüsyon (Chimitek)
                                    </p>
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
