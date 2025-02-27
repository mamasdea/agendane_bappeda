<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="page-header">
                        <h4>Edit Agenda Kegiatan</h4>
                    </div>
                    <div class="row ">
                        <!--<div class="col ">-->
                        <!--    <h4 class="record-title">Edit  Tb Agenda</h4>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate id="" role="form" enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("tb_agenda/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Acara">Acara <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Acara" value="<?php echo $data['Acara']; ?>" type="text" placeholder="Enter Acara" required="" name="Acara" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Penyelenggara">Penyelenggara <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Penyelenggara" value="<?php echo $data['Penyelenggara']; ?>" type="text" placeholder="Enter Penyelenggara" required="" name="Penyelenggara" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Jam">Jam <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Jam" value="<?php echo $data['Jam']; ?>" type="text" placeholder="Enter Jam" required="" name="Jam" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Tanggal">Tanggal <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-Tanggal" class="form-control datepicker  datepicker" required="" value="<?php echo $data['Tanggal']; ?>" type="datetime" name="Tanggal" placeholder="Enter Tanggal" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Tempat">Tempat <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Tempat" value="<?php echo $data['Tempat']; ?>" type="text" placeholder="Enter Tempat" required="" name="Tempat" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Keterangan">Keterangan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Keterangan" value="<?php echo $data['Keterangan']; ?>" type="text" placeholder="Enter Keterangan" required="" name="Keterangan" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <div class="form-group text-center">
                                <div class="d-flex justify-content-end mr-5">
                                    <button type="button" class="btn btn-secondary mr-2" onclick="window.location.href='<?php print_link("tb_agenda") ?>'">
                                        <i class="fa fa-rotate-left"></i> Kembali
                                    </button>
                                    <button class="btn btn-warning" type="submit">
                                        Update
                                        <i class="fa fa-send"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>