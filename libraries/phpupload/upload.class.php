<?php
	/**
	 * This class allows a user to upload and 
	 * validate their files.
	 *
	 * @author John Ciacia <Sidewinder@extreme-hq.com>
	 * @version 1.0
	 * @copyright Copyright (c) 2007, John Ciacia
	 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
	 */
	class Upload {
		/**
		 *@var string contains the error of the file to be uploaded.
		 */
		var $Error = false;
		/**
		 *@var string contains the name of the file to be uploaded.
		 */
		var $FileName;
		/**
		 *@var string contains the temporary name of the file to be uploaded.
		 */
		var $TempFileName;
		/**
		 *@var string contains directory where the files should be uploaded.
		 */
		var $UploadDirectory;
		/**
		 *@var string contains an array of valid extensions which are allowed to be uploaded.
		 */
		var $ValidExtensions;
		/**
		 *@var string contains a message which can be used for debugging.
		 */
		var $Message;
		/**
		 *@var integer contains maximum size of fiels to be uploaded in bytes.
		 */
		var $MaximumFileSize;
		/**
		 *@var bool contains whether or not the files being uploaded are images.
		 */
		var $IsImage;		
		/**
		 *@var integer contains maximum width of images to be uploaded.
		 */
		var $MaximumWidth;
		/**
		 *@var integer contains maximum height of images to be uploaded.
		 */
		var $MaximumHeight;
		/**
		 *@var string contains the email address of the recipient of upload logs.
		 */
		var $Email;
		/**
		 *@var bool contains whether or not the files being uploaded are images.
		 */
		var $IsResizeImage;
		/**
		 *@var integer contains resize width size of images to be uploaded.
		 */
		var $ResizeImageWidth;
		/**
		 *@var integer contains resize height size of images to be uploaded.
		 */
		var $ResizeImageHeight;
	
		function Upload()
		{
	
		}
	
		/**
		 *@method bool ValidateExtension() returns whether the extension of file to be uploaded
		 *    is allowable or not.
		 *@return true the extension is valid.
		 *@return false the extension is invalid.
		 */
		function ValidateExtension()
		{				
			$FileName = trim($this->FileName);
			$FileParts = pathinfo($FileName);
			$Extension = strtolower($FileParts['extension']);
			$ValidExtensions = $this->ValidExtensions;			
	
			if (!$FileName) {
				$this->SetMessage("LỖI: Không có tệp tin nào được chọn.");
				return false;
			}
	
			if (!$ValidExtensions) {
				$this->SetMessage("Chú ý: Tất cả các phần mở rộng là hợp lệ.");
				return true;
			}
	
			if (in_array($Extension, $ValidExtensions)) {
				$this->SetMessage("THÔNG ĐIỆP: Việc mở rộng '$Extension' dường như là hợp lệ");
				return true;
			} else {
				$this->SetMessage("Lỗi: định dạng file '$Extension' không hợp lệ.");
				return false;  
			}
	
		}
	
		/**
		 *@method bool ValidateSize() returns whether the file size is acceptable.
		 *@return true the size is smaller than the alloted value.
		 *@return false the size is larger than the alloted value.
		 */
		function ValidateSize()
		{
			$MaximumFileSize = $this->MaximumFileSize * 1048576;
			$TempFileName = $this->GetTempName();
			$TempFileSize = @filesize($TempFileName); // 1048576 ~ 1MB
	
			if($MaximumFileSize == "") {
				$this->SetMessage("Chu ý: Không có giới hạn kích thước.");
				return true;
			}
	
			if ($MaximumFileSize <= $TempFileSize) {
				$this->SetMessage("Lỗi: File vượt quá giới hạn. Phải nhỏ hơn $MaximumFileSize MB, dung lượng hiện tại là $TempFileSize.");
				return false;
			}
	
			$this->SetMessage("Thông báo: Kích thước tập tin nhỏ hơn $MaximumFileSize.");
			return true;
		}
	
		/**
		 *@method bool ValidateExistance() determins whether the file already exists. If so, rename $FileName.
		 *@return true can never be returned as all file names must be unique.
		 *@return false the file name does not exist.
		 */
		function ValidateExistance()
		{
			$FileName = $this->FileName;
			$UploadDirectory = $this->UploadDirectory;
			$File = $UploadDirectory . $FileName;
	
			if (file_exists($File)) {
				$this->SetMessage("Message: File '$FileName' đã tồn tại.");
				$UniqueName = rand() . $FileName;
				$this->SetFileName($UniqueName);
				$this->ValidateExistance();
			} else {
				$this->SetMessage("Message: File name '$FileName' không tồn tại.");
				return false;
			}
		}
	
		/**
		 *@method bool ValidateDirectory()
		 *@return true the UploadDirectory exists, writable, and has a traling slash.
		 *@return false the directory was never set, does not exist, or is not writable.
		 */
		function ValidateDirectory()
		{
			$UploadDirectory = $this->UploadDirectory;
	
			if (!$UploadDirectory) {
				$this->SetMessage("LỖI: biến thư mục rỗng.");
				return false;
			}
	
			if (!is_dir($UploadDirectory)) {
				$this->SetMessage("LỖI: thư mục '$UploadDirectory' không tồn tại.");
				return false;
			}
	
			if (!is_writable($UploadDirectory)) {
				$this->SetMessage("LỖI: thư mục '$UploadDirectory' không cho phép ghi.");
				return false;
			}
	
			if (substr($UploadDirectory, -1) != "/") {
				$this->SetMessage("LỖI: dấu gạch chéo không tồn tại.");
				$NewDirectory = $UploadDirectory . "/";
				$this->SetUploadDirectory($NewDirectory);
				$this->ValidateDirectory();
			} else {
				$this->SetMessage("THÔNG ĐIỆP: Các dấu gạch chéo traling tồn tại.");
				return true;
			}
		}
	
		/**
		 *@method bool ValidateImage()
		 *@return true the image is smaller than the alloted dimensions.
		 *@return false the width and/or height is larger then the alloted dimensions.
		 */
		function ValidateImage() {
			$MaximumWidth = $this->MaximumWidth;
			$MaximumHeight = $this->MaximumHeight;
			$TempFileName = $this->TempFileName;
	
			if($Size = @getimagesize($TempFileName)) {
				$Width = $Size[0];   //$Width is the width in pixels of the image uploaded to the server.
				$Height = $Size[1];  //$Height is the height in pixels of the image uploaded to the server.
			}
	
			if ($Width > $MaximumWidth) {
				$this->SetMessage("Chiều rộng của hình ảnh [$Width] vượt quá số tiền tối đa [$MaximumWidth].");
				return false;
			}
	
			if ($Height > $MaximumHeight) {
				$this->SetMessage("Chiều cao của hình ảnh [$Height] vượt quá số tiền tối đa [$MaximumHeight].");
				return false;
			}
	
			$this->SetMessage("Chiều cao hình ảnh [$Height] và chiều rộng [$Width] nằm trong giới hạn của họ.");     
			return true;
		}
		
		/**
		 *@method bool ValidateResizeImage()
		 *@return true the image is smaller than the alloted dimensions.
		 *@return false the width and/or height is larger then the alloted dimensions.
		 */
		function ResizeImage() {		
			$FileName = trim($this->FileName);
			$FileParts = pathinfo($FileName);
			$Extension = strtolower($FileParts['extension']);
			$TempFileName = $this->TempFileName;
			$UploadDirectory = $this->UploadDirectory;
			
			if($Extension=="jpg" || $Extension=="jpeg" ) {
				$ImageSrc = imagecreatefromjpeg($TempFileName);
			}
			else if($Extension=="png") {
				$ImageSrc = imagecreatefrompng($TempFileName);
			} else {
				$ImageSrc = imagecreatefromgif($TempFileName);
			}			
			
			if($Size = @getimagesize($TempFileName)) {
				$Width = $Size[0];   //$Width is the width in pixels of the image uploaded to the server.
				$Height = $Size[1];  //$Height is the height in pixels of the image uploaded to the server.
			}
			
			$TmpImage = imagecreatetruecolor($this->ResizeImageWidth, $this->ResizeImageHeight);
			
			imagecopyresampled($TmpImage, $ImageSrc, 0, 0, 0, 0, $this->ResizeImageWidth, $this->ResizeImageHeight, $Width, $Height);
			
			imagejpeg($TmpImage, $UploadDirectory . $FileName, 100);
			
			imagedestroy($ImageSrc);
			imagedestroy($TmpImage);

			return true;
		}
	
		/**
		 *@method bool SendMail() sends an email log to the administrator
		 *@return true the email was sent.
		 *@return false never.
		 *@todo create a more information-friendly log.
		 */
		function SendMail() {
			$To = $this->Email;
			$Subject = "File Uploaded";
			$From = "From: Uploader";
			$Message = "A file has been uploaded.";
			mail($To, $Subject, $Message, $From);
			return true;
		}
	
	
		/**
		 *@method bool UploadFile() uploads the file to the server after passing all the validations.
		 *@return true the file was uploaded.
		 *@return false the upload failed.
		 */
		function UploadFile()
		{			
			if (!$this->ValidateExtension()) {
				$this->SetFileError(true);
				$_SESSION['msg'] = $this->GetMessage();
			} 
	
			else if (!$this->ValidateSize()) {
				$this->SetFileError(true);
				$_SESSION['msg'] = $this->GetMessage();
			}
	
			//else if ($this->ValidateExistance()) {
				//die($this->GetMessage());
			//}
	
			else if (!$this->ValidateDirectory()) {
				$this->SetFileError(true);
				$_SESSION['msg'] = $this->GetMessage();
			}
	
			else if ($this->IsImage && !$this->ValidateImage()) {
				$_SESSION['msg'] = $this->GetMessage();
			}						
	
			else {
				$this->SetFileName( mktime(date("d/m/Y h:i:s")) . "_" . $this->FileName);
				
				$FileName = $this->FileName;
				$TempFileName = $this->TempFileName;
				$UploadDirectory = $this->UploadDirectory;								
				
				if ($this->IsResizeImage && $this->ResizeImage()) {
					return true;
				} else if (is_uploaded_file($TempFileName)) {
					move_uploaded_file($TempFileName, $UploadDirectory . $FileName);
					return $FileName;
				} else {
					return false;
				}
			}
	
		}
	
		#Accessors and Mutators beyond this point.
		#Siginificant documentation is not needed.
		function SetFileError($argv)
		{
			$this->Error = $argv;
		}
		
		function SetFileName($argv)
		{
			$this->FileName = $argv;
		}
	
		function SetUploadDirectory($argv)
		{
			$this->UploadDirectory = $argv;
		}
	
		function SetTempName($argv)
		{
			$this->TempFileName = $argv;
		}
	
		function SetValidExtensions($argv)
		{
			$this->ValidExtensions = $argv;
		}
	
		function SetMessage($argv)
		{
			$this->Message = $argv;
		}
	
		function SetMaximumFileSize($argv)
		{
			$this->MaximumFileSize = $argv;
		}
	
		function SetEmail($argv)
		{
			$this->Email = $argv;
		}
	   
		function SetIsImage($argv)
		{
			$this->IsImage = $argv;
		}
	
		function SetMaximumWidth($argv)
		{
			$this->MaximumWidth = $argv;
		}
	
		function SetMaximumHeight($argv)
		{
			$this->MaximumHeight = $argv;
		} 
		
		function SetResizeImage($argv)
		{
			$this->IsResizeImage = $argv;
		}
	
		function SetResizeWidth($argv)
		{
			$this->ResizeImageWidth = $argv;
		}
	
		function SetResizeHeight($argv)
		{
			$this->ResizeImageHeight = $argv;
		} 
		 
		/* ----------------------------------*/
		function GetFileError()
		{
			return $this->Error;
		}
		
		function GetFileName()
		{
			return $this->FileName;
		}
	
		function GetUploadDirectory()
		{
			return $this->UploadDirectory;
		}
	
		function GetTempName()
		{
			return $this->TempFileName;
		}
	
		function GetValidExtensions()
		{
			return $this->ValidExtensions;
		}
	
		function GetMessage()
		{
			if (!isset($this->Message)) {
				$this->SetMessage("No Message");
			}
	
			return $this->Message;
		}
	
		function GetMaximumFileSize()
		{
			return $this->MaximumFileSize;
		}
	
		function GetEmail()
		{
			return $this->Email;
		}
	
		function GetIsImage()
		{
			return $this->IsImage;
		}
	
		function GetMaximumWidth()
		{
			return $this->MaximumWidth;
		}				
	
		function GetMaximumHeight()
		{
			return $this->MaximumHeight;
		}
		
		function GetResizeImage()
		{
			return $this->IsResizeImage;
		}
	
		function GetResizeWidth()
		{
			return $this->ResizeWidth;
		}				
	
		function GetResizeHeight()
		{
			return $this->ResizeHeight;
		}
	}
?> 