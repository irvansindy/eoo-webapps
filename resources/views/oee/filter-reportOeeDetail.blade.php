<div class="modal fade" id="getReportOeeDetail">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Report Oee Detail (pershift)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4 mt-2 mb-2">
                            <label for="">Tanggal</label>
                        </div>
                        <div class="col-4 mt-2 mb-2">
                            <input type="hidden" id="oeeMasterId">
                            <input type="date" id="from" class="form-control" value="{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) )}}">
                        </div>
                        <div class="col-4 mt-2 mb-2">
                            <input type="date" class="form-control" id="to" value="{{date('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-2 mb-2">
                            <label for="">Kapasitas Mesin</label>
                        </div>
                        <div class="col-8 mt-2 mb-2">
                            <select class="select2 form-control" name="" id="machineCapacityType" style="width: 100%">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-2 mb-2">
                            <label for="">Diameter Produk</label>
                        </div>
                        <div class="col-8 mt-2 mb-2">
                            {{-- <input type="number" class="form-control" id="productDiameter"> --}}
                            <select class="select2 form-control" id="productDiameter" style="width: 100%"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-2 mb-2">
                            <label for="">Panjang Produk</label>
                        </div>
                        <div class="col-8 mt-2 mb-2">
                            {{-- <input type="number" class="form-control" id="productLength"> --}}
                            <select class="select2 form-control" id="productLength" style="width: 100%"></select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-2 mb-2">
                            <label for="">Varian Produk</label>
                        </div>
                        <div class="col-8 mt-2 mb-2">
                            <select class="select2 form-control" id="productVariant" style="width: 100%"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnExportOeeDetail" type="button" class="btn btn-success">Export</button>
            </div>
        </div>
    </div>
</div>