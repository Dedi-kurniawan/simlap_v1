<div class="modal fade" id="formGenerateReport" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Laporan tenaga kependidikan {{ $bcrum['report']['bulan'] }} {{ $bcrum['report']['tahun'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-report">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="content-generate" style="display: none">
                    <i class="fa fa-file-alt fa-5x text-warning mb-2"></i>
                    <h6>Pastikan semua data tenaga kependidikan sudah benar sebelum generate laporan</h6>
                </div>
                <div class="loading-report" style="display: none">
                    <i class="fab fa-hornbill fa-5x text-primary fa-spin mb-2"></i>
                    <div class="title-holder-loading">
                        <span class="title-loading text-primary">
                            Harap tunggu hingga selesai...
                        </span>
                    </div>
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" id="cancel-report" data-dismiss="modal">
                    <i class="fas fa-window-close"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary font-weight-bold" id="generateReport">
                    <i class="fa fa-file"></i> Generate Laporan
                </button>
            </div>
        </div>
    </div>
</div>
