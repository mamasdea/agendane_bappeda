<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container-fluid">
                <div class="d-flex justify-content-center mb-3">
                    <h4 class="record-title">Daftar Agenda Bappeda</h4>
                </div>
                <div class="row ">
                    <div class="col-sm-2 comp-grid">
                        <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                            <div class="">
                                <!-- Page bread crumbs components-->
                                <?php
                                if (!empty($field_name) || !empty($_GET['search'])) {
                                ?>
                                    <hr class="sm d-block d-sm-none" />
                                    <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                        <ul class="breadcrumb m-0 p-1">
                                            <?php
                                            if (!empty($field_name)) {
                                            ?>
                                                <li class="breadcrumb-item">
                                                    <a class="text-decoration-none" href="<?php print_link('tb_agenda'); ?>">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                                </li>
                                                <li class="breadcrumb-item active text-capitalize font-weight-bold">
                                                    <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if (get_value("search")) {
                                            ?>
                                                <li class="breadcrumb-item">
                                                    <a class="text-decoration-none" href="<?php print_link('tb_agenda'); ?>">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item text-capitalize">
                                                    Search
                                                </li>
                                                <li class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                    <!--End of Page bread crumbs components-->
                                <?php
                                }
                                ?>
                            </div>
                            <!--    <form  class="search" action="<?php print_link('tb_agenda/List'); ?>" method="get">-->
                            <!--        <div class="input-group">-->
                            <!--            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />-->
                            <!--                <div class="input-group-append">-->
                            <!--                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!-- </form>-->
                            <!--        <hr />-->
                            <!--        <div class="form-group text-center">-->
                            <!--            <button class="btn btn-primary">Filter</button>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div> -->
                            <div class="col-md-4 comp-grid">
                            </div>
                    </div>
                </div>
            </div>
        <?php
    }
        ?>
        </div>
        <div class="">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col d-flex justify-content-start align-items-center">
                        <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                            <div class="p-2 d-flex align-items-center">
                                <input placeholder="Filter by Tanggal" class="form-control datepicker form-control-sm mr-2" value="<?php echo $this->set_field_value('tb_agenda_Tanggal') ?>" type="datetime" name="tb_agenda_Tanggal" placeholder="" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="single" style="width: auto;" />
                                <button class="btn btn-primary btn-sm">Filter</button>
                            </div>
                        </form>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <a class="btn btn-primary btn-sm" href="<?php print_link("tb_agenda/add") ?>">
                            <i class="fa fa-plus"></i> Tambah Agenda
                        </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this::display_page_errors(); ?>
                        <div class="filter-tags mb-2">
                            <?php
                            if (!empty($_GET['tb_agenda_Tanggal'])) {
                            ?>
                                <div class="filter-chip card bg-light">
                                    <b>Agenda Bappeda Tanggal :</b>
                                    <?php
                                    $date_val = get_value('tb_agenda_Tanggal');
                                    $formated_date = "";
                                    if (str_contains('-to-', $date_val)) {
                                        //if value is a range date
                                        $vals = explode('-to-', str_replace(' ', '', $date_val));
                                        $startdate = $vals[0];
                                        $enddate = $vals[1];
                                        $formated_date = format_date($startdate, 'jS F, Y') . ' <span class="text-muted">&#10148;</span> ' . format_date($enddate, 'jS F, Y');
                                    } elseif (str_contains(',', $date_val)) {
                                        //multi date values
                                        $vals = explode(',', str_replace(' ', '', $date_val));
                                        $formated_arrs = array_map(function ($date) {
                                            return format_date($date, 'jS F, Y');
                                        }, $vals);
                                        $formated_date = implode(' <span class="text-info">&#11161;</span> ', $formated_arrs);
                                    } else {
                                        $formated_date = format_date($date_val, 'jS F, Y');
                                    }
                                    echo  $formated_date;
                                    $remove_link = unset_get_value('tb_agenda_Tanggal', $this->route->page_url);
                                    ?>
                                    <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                        &times;
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class=" animated fadeIn page-content">
                            <div id="tb_agenda-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">No</th>
                                                <th class="td-Acara"> Acara</th>
                                                <th class="td-Penyelenggara"> Penyelenggara</th>
                                                <th class="td-Jam"> Jam</th>
                                                <th class="td-Tanggal"> Tanggal</th>
                                                <th class="td-Tempat"> Tempat</th>
                                                <th class="td-Keterangan"> Keterangan</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if (!empty($records)) {
                                        ?>
                                            <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                <!--record-->
                                                <?php
                                                $counter = 0;
                                                foreach ($records as $data) {
                                                    $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                                    $counter++;
                                                ?>
                                                    <tr>
                                                        <th class=" td-checkbox">
                                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                                <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                                <span class="custom-control-label"></span>
                                                            </label>
                                                        </th>
                                                        <th class="td-sno"><?php echo $counter; ?></th>
                                                        <td class="td-Acara">
                                                            <span data-value="<?php echo $data['Acara']; ?>" data-pk="<?php echo $data['id'] ?>" data-url="<?php print_link("tb_agenda/editfield/" . urlencode($data['id'])); ?>" data-name="Acara" data-title="Enter Acara" data-placement="left" data-toggle="click" data-type="text" data-mode="popover" data-showbuttons="left" class="is-editable">
                                                                <?php echo $data['Acara']; ?>
                                                            </span>
                                                        </td>
                                                        <td class="td-Penyelenggara">
                                                            <span data-value="<?php echo $data['Penyelenggara']; ?>" data-pk="<?php echo $data['id'] ?>" data-url="<?php print_link("tb_agenda/editfield/" . urlencode($data['id'])); ?>" data-name="Penyelenggara" data-title="Enter Penyelenggara" data-placement="left" data-toggle="click" data-type="text" data-mode="popover" data-showbuttons="left" class="is-editable">
                                                                <?php echo $data['Penyelenggara']; ?>
                                                            </span>
                                                        </td>
                                                        <td class="td-Jam">
                                                            <span data-value="<?php echo $data['Jam']; ?>" data-pk="<?php echo $data['id'] ?>" data-url="<?php print_link("tb_agenda/editfield/" . urlencode($data['id'])); ?>" data-name="Jam" data-title="Enter Jam" data-placement="left" data-toggle="click" data-type="text" data-mode="popover" data-showbuttons="left" class="is-editable">
                                                                <?php echo $data['Jam']; ?>
                                                            </span>
                                                        </td>
                                                        <td class="td-Tanggal">
                                                            <span data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" data-value="<?php echo $data['Tanggal']; ?>" data-pk="<?php echo $data['id'] ?>" data-url="<?php print_link("tb_agenda/editfield/" . urlencode($data['id'])); ?>" data-name="Tanggal" data-title="Enter Tanggal" data-placement="left" data-toggle="click" data-type="flatdatetimepicker" data-mode="popover" data-showbuttons="left" class="is-editable">
                                                                <?php echo $data['Tanggal']; ?>
                                                            </span>
                                                        </td>
                                                        <td class="td-Tempat">
                                                            <span data-value="<?php echo $data['Tempat']; ?>" data-pk="<?php echo $data['id'] ?>" data-url="<?php print_link("tb_agenda/editfield/" . urlencode($data['id'])); ?>" data-name="Tempat" data-title="Enter Tempat" data-placement="left" data-toggle="click" data-type="text" data-mode="popover" data-showbuttons="left" class="is-editable">
                                                                <?php echo $data['Tempat']; ?>
                                                            </span>
                                                        </td>
                                                        <td class="td-Keterangan">
                                                            <span data-value="<?php echo $data['Keterangan']; ?>" data-pk="<?php echo $data['id'] ?>" data-url="<?php print_link("tb_agenda/editfield/" . urlencode($data['id'])); ?>" data-name="Keterangan" data-title="Enter Keterangan" data-placement="left" data-toggle="click" data-type="text" data-mode="popover" data-showbuttons="left" class="is-editable">
                                                                <?php echo $data['Keterangan']; ?>
                                                            </span>
                                                        </td>
                                                        <th class="td-btn">
                                                            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("tb_agenda/view/$rec_id"); ?>">
                                                                <i class="fa fa-eye"></i> View
                                                            </a>
                                                            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("tb_agenda/edit/$rec_id"); ?>">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("tb_agenda/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                <i class="fa fa-times"></i>
                                                                Delete
                                                            </a>
                                                        </th>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    if (empty($records)) {
                                    ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if ($show_footer && !empty($records)) {
                                ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">
                                            <div class="col-md-auto justify-content-center">
                                                <div class="p-3 d-flex justify-content-between">
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("tb_rr/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                            </a>
                                                            <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                            </a>
                                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                            </a>
                                                            <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                            </a>
                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <?php
                                                if ($show_pagination == true) {
                                                    $pager = new Pagination($total_records, $record_count);
                                                    $pager->route = $this->route;
                                                    $pager->show_page_count = true;
                                                    $pager->show_record_count = true;
                                                    $pager->show_page_limit = true;
                                                    $pager->limit_count = $this->limit_count;
                                                    $pager->show_page_number_list = true;
                                                    $pager->pager_link_range = 15;
                                                    $pager->render();
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>