<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row d-flex justify-content-center ">
                    <div class="">
                        <h4 class="record-title">Form Tambah Pemakaian Ruang Rapat</h4>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form id="tb_rr-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("tb_rr/add?csrf_token=$csrf_token") ?>" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="acara_rr">Acara<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <input id="ctrl-acara_rr" value="<?php echo $this->set_field_value('acara_rr', ""); ?>" type="text" placeholder="Enter Acara" required="" name="acara_rr" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="bidang_rr">Bidang<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <select id="ctrl-bidang_rr_select" name="bidang_rr_select" required="" class="form-control" onchange="showLainnyaInput(this)">
                                                <option value="">Select Bidang</option>
                                                <option value="Sekretariat">Sekretariat</option>
                                                <option value="Randalevalitbang">Randalevalitbang</option>
                                                <option value="Ekonomi">Ekonomi</option>
                                                <option value="Pemsosbud">Pemsosbud</option>
                                                <option value="IPW">IPW</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                            <input id="ctrl-lainnya" type="text" placeholder="Enter Lainnya" class="form-control mt-2" style="display: none;" />
                                            <input type="hidden" id="ctrl-bidang_rr" name="bidang_rr" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="jam_rr">Jam<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <input id="ctrl-jam_rr" value="<?php echo $this->set_field_value('jam_rr', ""); ?>" type="text" placeholder="Enter Jam" required="" name="jam_rr" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="hari_tgl_rr">Hari, Tanggal<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <input id="ctrl-hari_tgl_rr" value="<?php echo $this->set_field_value('hari_tgl_rr', ""); ?>" type="text" placeholder="Enter Hari, Tanggal" required="" name="hari_tgl_rr" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="tanggal_rr">Tanggal<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input id="ctrl-tanggal_rr" class="form-control datepicker" required="" value="<?php echo $this->set_field_value('tanggal_rr', ""); ?>" type="datetime" name="tanggal_rr" placeholder="Enter Tanggal" data-enable-time="false" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="tempat_rr">Tempat<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <select id="ctrl-tempat_rr" value="<?php echo $this->set_field_value('tempat_rr', ""); ?>" required="" name="tempat_rr" class="form-control">
                                                <option value="RR Utama">RR Utama</option>
                                                <option value="RR Atas">RR Atas</option>
                                                <option value="RR Pojok">RR Pojok</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="ket_rr">Ket<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <input id="ctrl-ket_rr" value="<?php echo $this->set_field_value('ket_rr', ""); ?>" type="text" placeholder="Enter Jumlah Peserta" required="" name="ket_rr" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <div class="form-ajax-status"></div>
                                <div class="d-flex justify-content-end mr-5">
                                    <button type="button" class="btn btn-secondary mr-2" onclick="window.location.href='<?php print_link("tb_agenda") ?>'">
                                        <i class="fa fa-rotate-left"></i> Kembali
                                    </button>
                                    <button class="btn btn-warning" type="submit">
                                        Simpan
                                        <i class="fa fa-send"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <script>
                            function showLainnyaInput(select) {
                                var input = document.getElementById('ctrl-lainnya');
                                if (select.value === 'Lainnya') {
                                    select.style.display = 'none';
                                    input.style.display = 'block';
                                    input.required = true;
                                } else {
                                    select.style.display = 'block';
                                    input.style.display = 'none';
                                    input.required = false;
                                }
                            }
                        </script>


                        <script>
                            function showLainnyaInput(select) {
                                var lainnyaInput = document.getElementById('lainnya_input');
                                if (select.value === 'Lainnya') {
                                    lainnyaInput.style.display = 'block';
                                } else {
                                    lainnyaInput.style.display = 'none';
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showLainnyaInput(select) {
            var lainnyaInput = document.getElementById('ctrl-lainnya');
            var hiddenInput = document.getElementById('ctrl-bidang_rr');
            if (select.value === 'Lainnya') {
                select.style.display = 'none';
                lainnyaInput.style.display = 'block';
                lainnyaInput.required = true;
                hiddenInput.value = ''; // Clear the hidden input value
            } else {
                select.style.display = 'block';
                lainnyaInput.style.display = 'none';
                lainnyaInput.required = false;
                hiddenInput.value = select.value; // Set the hidden input value to the selected option
            }
        }

        document.getElementById('ctrl-lainnya').addEventListener('input', function() {
            var hiddenInput = document.getElementById('ctrl-bidang_rr');
            hiddenInput.value = this.value; // Update the hidden input value to the custom input
        });
    </script>
</section>