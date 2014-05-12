<?php
//filename: Excel_model.php
class Excel_model extends CI_Model {
	var $excel_path;
	var $excel_path_url;
	var $file_data;
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();		
		
		$this->excel_path = realpath(APPPATH . '../uploads');
		$this->excel_path_url = base_url().'uploads/'; 
		
    }
	
	function do_upload(){
		$config = array(
			'allowed_types' => 'xls|xlsx',
			'upload_path' => $this->excel_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload()) {
			 $this->upload->display_errors();
			 return FALSE;
		}
		$this->file_data = $this->upload->data();
				
		return TRUE;
		
	}
	
	function get_excels() {
		
		$files = scandir($this->excel_path);
		$files = array_diff($files, array('.', '..', 'uploads'));
		
		$excel = array();
		
		foreach ($files as $file) {
			$excel []= array (
				'filename' => $file,
				'url' => $this->excel_path_url . $file,
				'excel_url' => $this->excel_path_url . 'uploads/' . $file
			);
		}
		
		return $excel;
	}
	
	function read_excel_($filename='') {
		define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
		$this->load->library('excel');
		
		/**  Identify the type of $inputFileName  **/
		$inputFileType = PHPExcel_IOFactory::identify($filename);
		/**  Create a new Reader of the type that has been identified  **/
		
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		//$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objReader->setLoadSheetsOnly( array("Sheet1") );
		$objReader->setReadDataOnly(true);
		/**  Load $inputFileName to a PHPExcel Object  **/
		$objPHPExcel = $objReader->load($filename);		

		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		
		foreach ($sheetData as $row){
			$data[] = $row['B'];
			
		}
		
		return $sheetData;
		
	}
	
	public function read_excel(){
		//var_dump($sheetData);
		
		/*$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();//PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
		
		echo "Sheet : ".$sheet->getTitle()." Row max : $highestRow - Col max : $highestColumn </br>";
		
		$rowData = $sheet->rangeToArray('A1:' . $highestColumn . $highestRow,
											NULL,
											TRUE,
											FALSE);
			//  Insert row data array into your database of choice here
		//}
		
		print_r($rowData);*/
		
		/* foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			//echo 'Worksheet - ' , $worksheet->getTitle() , EOL;

				foreach ($worksheet->getRowIterator() as $row) {
					//echo '    Row number - ' , $row->getRowIndex() , EOL;

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
					foreach ($cellIterator as $cell) {
						if (!is_null($cell)) {
							echo '        Cell - ' , $cell->getCoordinate() , ' - ' , $cell->getCalculatedValue() , EOL;
						}
					}
				}
			} */

		//var_dump($objPHPExcel);
		
	
		
	}

}
