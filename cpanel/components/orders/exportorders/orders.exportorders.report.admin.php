<?php defined( '_VALID_MOS' ) or die( include("404.php") );
class report extends core_class
{
    public $datebegin;
    public $dateend;
    public $status;
    public $kind;
    public $dbObj;
    function __construct($ngay1,$ngay2,$choose,$choose2)
    {
        $this->dbObj = new classDb();
        $this->datebegin=$ngay1;
        $this->dateend=$ngay2;
        $this->status= $choose;
        $this->kind=$choose2;
    }
    public function get_data_orders()
    {
        $query="SELECT `id`,`bill_name`, `bill_email`, `bill_address`, `bill_phone`, `total`,
        `order_status`   FROM `donhang` where order_status=? and date_create between ? and ?";
        $data=$this->dbObj->SqlQueryOutPutResult($query,array($this->status,$this->_formatdate($this->datebegin),$this->_formatdate($this->dateend)))->fetchAll();
        return $data;
    }
    public function get_data_product($id){
        $query="
        SELECT  sum(`quantity`) as soluong,`tensanpham`,`product_id`,`giaban`,`donvitinh` FROM `donhang_chitiet` 
        inner join sanpham on donhang_chitiet.product_id=sanpham.sanpham_id  left join sanpham_phienban on 		
        sanpham.sanpham_id=sanpham_phienban.sanpham_id
        where order_id=?
        GROUP by product_id";
        $data=$this->dbObj->SqlQueryOutPutResult($query,array($id))->fetchAll();
        return $data;
    }
    public function status()
    {
        switch($this->status){
            case "1": 
                $re="Chờ xử lý";
            break;
            case "2": 
                $re="Chờ Thanh toán";
            break;
            case "3": 
                $re="Chờ hoàn thành";
            break;
            case "4": 
                $re="Chờ xuất hàng";
            break;
            case "5": 
                $re="Chờ nhận hàng";
            break;
            case "6": 
                $re="Chuyển một phần";
            break;
            case "7": 
                $re="Hoàn thành";
            break;
            case "9": 
                $re="Đã chuyển hết";
            break;
            case "10": 
                $re="Hủy đơn hàng";
            break;
            case "11": 
                $re="Từ chối đơn hàng";
            break;
            case "12": 
                $re="Hoàn trả đơn hàng";
            break;
            case "13": 
                $re="Đã tiếp nhận";
            break;
            case "14": 
                $re="Đề nghỉ hủy";
            break;
            default:
                $re="";
            break;
        }
        return $re;
    }
    public function report_data()
    {
        if($this->kind=="orders")
        {        
            $data=$this->get_data_orders();   
            require "../libraries/ClassesExcel/PHPExcel.php";
            $excel = new PHPExcel();

            $excel->setActiveSheetIndex(0);

            $excel->getActiveSheet()->setTitle('Danh sách hóa đơn');


            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);

            $excel->getActiveSheet()->setCellValue('C1', 'Danh sách hóa đơn');
            $excel->getActiveSheet()->setCellValue('B2', '       Từ ngày '.$this->datebegin.' Đến ngày '.$this->dateend.'');
            $excel->getActiveSheet()->setCellValue('A4', 'Tên hóa đơn');
            $excel->getActiveSheet()->setCellValue('B4', 'Địa chỉ');
            $excel->getActiveSheet()->setCellValue('C4', 'Email');
            $excel->getActiveSheet()->setCellValue('D4', 'Số điện thoại');
            $excel->getActiveSheet()->setCellValue('E4', 'Tổng số tiền');
            $excel->getActiveSheet()->setCellValue('F4', 'Trạng thái');
            $excel->getActiveSheet()->getStyle("C1")->getFont()->setSize(30);
            $excel->getActiveSheet()->getStyle("B2")->getFont()->setSize(20);
            $excel->getActiveSheet()->getStyle("B2")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("A4")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("B4")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("C4")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("D4")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("E4")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("F4")->getFont()->setBold(true);
            
            // $excel->getActiveSheet()->setCellValue('B1', 'Giới Tính');
            // $excel->getActiveSheet()->setCellValue('C1', 'Đơn giá(/shoot)');

            $numRow = 4;
            foreach($data as $row){
                $numRow++;
                $excel->getActiveSheet()->setCellValue('A'.$numRow, $row['bill_name']); 
                $excel->getActiveSheet()->setCellValue('B'.$numRow, $row['bill_address']);
                $excel->getActiveSheet()->setCellValue('C'.$numRow, $row['bill_email']);
                $excel->getActiveSheet()->setCellValue('D'.$numRow, $row['bill_phone']);
                $excel->getActiveSheet()->setCellValue('E'.$numRow, number_format($row['total']));
                $excel->getActiveSheet()->setCellValue('F'.$numRow, $this->status());
                
            }
                
            $excel->getActiveSheet()->getStyle('A4:F'.$numRow.'')->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
            );
            $excel->getActiveSheet()->getStyle('A1:F'.$numRow.'')->getFont()->setName('Times New Roman');
                
            // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
            // ở đây mình lưu file dưới dạng excel2007
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="data.xls"');
                PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
        }
        else if($this->kind=="product"){
            $data=$this->get_data_orders();
            $bossdata=[];
            foreach($data as $value)
            {
                $bossdata[$value['id']]=$this->get_data_product($value['id']);
            }   
            // echo "<pre>";
            // print_r($bossdata['3']);
            require "../libraries/ClassesExcel/PHPExcel.php";
            $excel = new PHPExcel();

            $excel->setActiveSheetIndex(0);

            $excel->getActiveSheet()->setTitle('Danh sách sản phẩm');


            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);

            $excel->getActiveSheet()->setCellValue('A1', '     Danh sách sản phẩm');
            $excel->getActiveSheet()->setCellValue('A2', '            Từ ngày: '.$this->datebegin.' Đến ngày: '.$this->dateend.'');
            $excel->getActiveSheet()->getStyle("A1")->getFont()->setSize(30);
            $excel->getActiveSheet()->getStyle("A2")->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle("A2")->getFont()->setSize(15);

             $begin=4;      
            
             foreach ($data as $value)
             {
                 $title=$begin+2;
                 $num=$begin+2;
                 $excel->getActiveSheet()->setCellValue('A'.$begin.'', 'Mã hóa đơn: '.$value['id'].'');
                 $excel->getActiveSheet()->getStyle('A'.$begin.'')->getFont()->setBold(true);
                 $begin++;
                $excel->getActiveSheet()->setCellValue('A'.$begin.'', 'Tên hóa đơn: '.$value['bill_name'].'');
                $excel->getActiveSheet()->getStyle('A'.$begin.'')->getFont()->setBold(true);
                $excel->getActiveSheet()->setCellValue('A'.$title.'', 'Mã sản phẩm');
                $excel->getActiveSheet()->setCellValue('B'.$title.'', 'Tên sản phẩm');
                $excel->getActiveSheet()->setCellValue('C'.$title.'', 'Số lượng');
                $excel->getActiveSheet()->setCellValue('D'.$title.'','Đơn giá');
                $excel->getActiveSheet()->setCellValue('E'.$title.'','Thành tiền');
                $excel->getActiveSheet()->setCellValue('F'.$title.'','Đơn vị tính');
                $excel->getActiveSheet()->getStyle('A'.$title.'')->getFont()->setBold(true);
                $excel->getActiveSheet()->getStyle('B'.$title.'')->getFont()->setBold(true);
                $excel->getActiveSheet()->getStyle('C'.$title.'')->getFont()->setBold(true);
                $excel->getActiveSheet()->getStyle('D'.$title.'')->getFont()->setBold(true);
                $excel->getActiveSheet()->getStyle('E'.$title.'')->getFont()->setBold(true);
                $excel->getActiveSheet()->getStyle('F'.$title.'')->getFont()->setBold(true);
                foreach($bossdata[$value['id']] as $key)
                 { 
                     $thanhtien=$key['soluong']*$key['giaban'];
                    $num++;         
                   $excel->getActiveSheet()->setCellValue('A'.$num.'', $key['product_id']);
                   $excel->getActiveSheet()->setCellValue('B'.$num.'', $key['tensanpham']);
                   $excel->getActiveSheet()->setCellValue('C'.$num.'', $key['soluong']);
                   $excel->getActiveSheet()->setCellValue('D'.$num.'', $key['giaban']);
                   $excel->getActiveSheet()->setCellValue('E'.$num.'',$thanhtien);
                   $excel->getActiveSheet()->setCellValue('F'.$num.'',$key['donvitinh']);
                                                  
                }
            
                $excel->getActiveSheet()->getStyle('A'.$title.':F'.$num.'')->applyFromArray(
                    array(
                        'borders' => array(
                            'allborders' => array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN,
                                'color' => array('rgb' => '000000')
                            )
                        )
                    )
                );
                $excel->getActiveSheet()->getStyle('A'.$title.':F'.$num.'')->applyFromArray(array(
                        'alignment' => array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        )
                    )
                );
                $begin=$num+2;
            }

            $excel->getActiveSheet()->getStyle('A1:F'.$num.'')->getFont()->setName('Times New Roman');
              
            // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
            // ở đây mình lưu file dưới dạng excel2007
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="data.xls"');
                PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');

        }
        else
        {
            $this->_redirect("orders/exportorders/view.html");
        }
    }

}
switch($_GET['action']){
    case "report":
         $myprocess= new report($_GET['ngay1'],$_GET['ngay2'],$_GET['status'],$_GET['kind']);
         $myprocess->report_data();
     
    break;
    case "":

    break;
    default:
        $func->_redirect("orders/exportorders/view.html");
    break;
}
?>