<?php 
/**
 * V_agenda Page Controller
 * @category  Controller
 */
class V_agendaController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "v_agenda";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("Acara", 
			"Penyelenggara", 
			"Jam", 
			"Tempat", 
			"Keterangan");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				v_agenda.Acara LIKE ? OR 
				v_agenda.Penyelenggara LIKE ? OR 
				v_agenda.Jam LIKE ? OR 
				v_agenda.Tanggal LIKE ? OR 
				v_agenda.Tempat LIKE ? OR 
				v_agenda.Keterangan LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "v_agenda/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("v_agenda.Jam", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue, $tgl); //filter by a single field name
		}
		if(!empty($request->v_agenda_Tanggal)){
			$val = $request->v_agenda_Tanggal;
			$db->where("DATE(v_agenda.Tanggal)", $val  , "=");
		}
	
		$tgl    =date("Y-m-d");
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields , $tgl);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Agenda Bappeda";
		$this->render_view("v_agenda/list.php", $data); //render the full page
	}
// No View Function Generated Because No Field is Defined as the Primary Key on the Database Table
}
