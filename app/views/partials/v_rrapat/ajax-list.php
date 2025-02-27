<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['']) ? urlencode($data['']) : null);
$counter++;
?>
<div class="col-sm-2">
    <div class="bg-light p-2 mb-3 animated bounceIn">
        <div class="mb-2">  
            <span class="font-weight-light text-muted ">
                Acara Utama1:  
            </span>
        <?php echo $data['acara_utama1']; ?></div>
        <div class="mb-2">  
            <span class="font-weight-light text-muted ">
                Jam Utama1:  
            </span>
        <?php echo $data['jam_utama1']; ?></div>
        <div class="mb-2">  
            <span class="font-weight-light text-muted ">
                Acara Utama2:  
            </span>
        <?php echo $data['acara_utama2']; ?></div>
        <div class="mb-2">  
            <span class="font-weight-light text-muted ">
                Jam Utama2:  
            </span>
        <?php echo $data['jam_utama2']; ?></div>
    </div>
</div>
<?php 
}
?>
<?php
} else {
?>
<td class="no-record-found col-12" colspan="100">
    <h4 class="text-muted text-center ">
        No Record Found
    </h4>
</td>
<?php
}
?>
