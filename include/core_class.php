<?php defined( '_VALID_MOS' ) or die( include("404.php") );

class core_class {

    function json_encode_unicode($data){
        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function get_include_contents( $file_name, $pages_html = "", $moduleid = 0, $pages_key = "" ) {

        global $conf;

        if ( $this->_routers( $file_name ) ){
            // Get modules
            ob_start();
            include $file_name;
            $contents = ob_get_contents();
            ob_end_clean();

            return $contents;
        } else {
            //return "Đường dẫn module không hợp lệ!";
            include "404.php";
        }

    }

    function get_file_contents( $file_name ) {

        if ( $this->_routers( $file_name ) ){
            // Get modules
            ob_start();
            include $file_name;
            $contents = ob_get_contents();
            ob_end_clean();

            return $contents;
        } else {
            //return "Đường dẫn module không hợp lệ!";
            include "404.php";
        }

    }

    function get_url( $keys = null, $values = null ){
        $values = explode( '/', @$_GET['params']);
        $keys   = explode( '|', $keys);
        $arr_url = array(); $i = 0;
        foreach ($keys as $key) {
            @$arr_url[@$key] = @$values[@$i++];
        }
        return $arr_url;
    }

    function strip_filter_tags( $text )
    {
        $text = preg_replace(
            array(
                // Remove invisible content
                '#(<module.*?>).*?(</module>)#',
                '@<style[^>]*?>.*?</style>@siu',
                '@<script[^>]*?.*?</script>@siu',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu',
                // Add line breaks before and after blocks
                '@</?((address)|(blockquote)|(center)|(del))@iu',
                '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                '@</?((table)|(th)|(td)|(caption))@iu',
                '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                '@</?((frameset)|(frame)|(iframe))@iu',
            ),
            array(
                '$1$2', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                "\n\$0", "\n\$0",
            ),
            $text );

        return  $text;
    }

    function black_list_tags( $text )
    {
        $text = preg_replace(array('/<(\?|\%)\=?(php)?/', '/(\%|\?)>/'), array('invalid','invalid'), $text);
		
		$text 	  = str_replace( "\\", ""  , $text );

        $text = str_replace(
            array(
                "<?php",
                "?>",
                "eval",
                "require",
                "require_once",
                //"include",
                "include_once",
                "vb script",
                "vbscript"
            ),
            array(
                "invalid",
                "invalid",
                "invalid",
                "invalid",
                "invalid",
                "invalid",
                "invalid",
                "invalid",
                "invalid"
            ), $text);

        $text = preg_replace(
            array(
                // Remove invisible content
                '#(<module.*?>).*?(</module>)#',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu'
            ),
            array(
                '$1$2', ' ', ' ', ' ', ' ', ' ', ' ', "\n\$0",
            ),
            $text );

        return $text;

    }

    // ham kiem tra su hop le cua file(kiem tra file co ton tai)
    function _routers( $file_path )
    {
        if( file_exists( $file_path ) ){
            return true;
        } else {
            return false;
        }
    }

    // ham nay tra ve tap hop mang la cac gia tri trong tung cap the / cua URL
    function _extract_url( $uri, $split )
    {
        $url = strip_tags( $uri );
        $url_array = explode($split, $url);
        // loai bo 1 gia tri dau trong URI
        //array_shift($url_array);
        return $url_array;
    }

    /* ham chuyen trang */
    function _redirect( $url )
    {
        /*kiem tra neu header already by send thi chuyen trang = script nguoc lai chuyen trang = code server*/
        if (headers_sent()) {
            echo "<script>document.location.href='$url';</script>\n";
        } else {
            ob_end_clean(); // clear output buffer
            header( 'HTTP/1.1 301 Moved Permanently' );
            header( "Location: $url" );
        }
        exit();
    }
    // ham dinh dang kieu ngay thang
    function _formatdatetime( $date )
    {
        return substr($date, -4) ."/". substr($date, 3, 2) ."/". substr($date, 0, 2) . " ".  date('h:i:s');
    }

    // ham dinh dang kieu nagy thang theo Unix timestamp
    function _formatdate( $date )
    {
        $month = intval(substr($date, 3, 2)); $day = intval(substr($date, 0, 2)); $year = intval(substr($date, -4));
        return mktime(date('H'), date('i'), date('s'),$month, $day, $year);
    }

    // ham loai bo ky tu dac biet trong chuoi khi lay ra
    function txt_htmlspecialchars($t="")
    {
        // Use forward look up to only convert & not &#123;
        //$t = str_replace( "<", "&lt;"  , $t );
        //$t = str_replace( ">", "&gt;"  , $t );
        $t = str_replace( "\\", ""  , $t );
        //$t = str_replace( '"', "", $t );

        return $t; // A nice cup of?
    }

    // ham go bo dau cua 1 chuoi
    function _removesigns($text, $remove_space = true)
    {
        //global $ibforums;<BR>//Charachters must be in ASCII and certain ones aint allowed
        $text = html_entity_decode ($text);
        $text = preg_replace('/(ä|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $text);
        $text = str_replace('ç','c',$text);
        $text = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $text);
        $text = preg_replace('/(ì|í|î|ị|ỉ|ĩ)/', 'i', $text);
        $text = preg_replace('/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $text);
        $text = preg_replace('/(ü|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $text);
        $text = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $text);
        $text = preg_replace('/(đ)/', 'd', $text);
        //CHU HOA
        $text = preg_replace('/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $text);
        $text = str_replace('Ç','C',$text);
        $text = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $text);
        $text = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $text);
        $text = preg_replace('/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $text);
        $text = preg_replace('/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $text);
        $text = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $text);
        $text = preg_replace('/(Đ)/', 'D', $text);
        //Special string
        /*
        $text = preg_replace('/( |!|”|#|$|%|’)/', ', $text);
        $text = preg_replace('/(̀|́|̉|$|&gt;)/', ', $text);
        $text = preg_replace (''&lt;[\/\!]*?[^&lt;&gt;]*?&gt;'si', '', $text);
        */

        $text = str_replace(' / ','-',$text);
        $text = str_replace('/','-',$text);
        $text = str_replace(' - ','-',$text);
        $text = str_replace('_','-',$text);

        if ($remove_space) {
            $text = str_replace(' ','-',$text);
        }

        $text = str_replace( 'ß', 'ss', $text);
        $text = str_replace( '&amp;', '', $text);
        $text = str_replace( '%', '', $text);
        $text = preg_replace('[^A-Za-z0-9-]', '', $text);

        /*$text = str_replace('—-','-',$text);
        $text = str_replace('—','-',$text);
        $text = str_replace('–','-',$text);*/
        return strtolower($text);
    }

    // cắt chuỗi theo chiều dài số ký tự cho trước
    function SmartContent( $text, $length=200 )
    {
        // strips tags won't remove the actual jscript
        $text = preg_replace( "'<script[^>]*>.*?</script>'si", "", $text );
        $text = preg_replace( '/{.+?}/', '', $text);

        $text = preg_replace( '/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is','\2', $text );

        // replace line breaking tags with whitespace
        $text = preg_replace( "'<(br[^/>]*?/|hr[^/>]*?/|/(div|h[1-6]|li|p|td))>'si", ' ', $text );

        $text = core_class::SmartSubstr( strip_tags( $text ), $length );

        return $text;
    }

    function SmartSubstr($text, $length=200)
    {
        $strlength = strlen($text);
        if ($strlength > $length) {
            $str = substr($text, 0, $length);
            $text = substr( $str, 0, strrpos($str, " ") );
            return $text . " ...";
        } else {
            return $text;
        }
    }

    function convertIntToMoney($y)
    {
        $y = strrev($y);
        $x = str_split($y, 3);
        $len = count($x);
        $pos = 0;
        $y = "";
        while($pos+1 != $len)
        {
            $y = $y.$x[$pos].',';
            $pos++;
        }
        $y = $y.$x[$pos];
        $y = strrev($y);
        return $y;
    }

    // ma hoa password
    function enscriptPass( $pass )
    {
        return md5(sha1(md5($pass)));
    }

    public function md10( $pass )
    {
        $pass = md5( $pass );
        $pass = base64_encode( $pass );
        $pass = md5( $pass );
        return $pass;
    }

    function convertXmlObjToArr($obj, &$arr)
    {
        $children = $obj->children();
        foreach ($children as $elementName => $node)
        {
            $nextIdx = count($arr);
            $arr[$nextIdx] = array();
            $arr[$nextIdx]['@name'] = strtolower((string)$elementName);
            $arr[$nextIdx]['@attributes'] = array();
            $attributes = $node->attributes();
            foreach ($attributes as $attributeName => $attributeValue)
            {
                $attribName = strtolower(trim((string)$attributeName));
                $attribVal = trim((string)$attributeValue);
                $arr[$nextIdx]['@attributes'][$attribName] = $attribVal;
            }
            $text = (string)$node;
            $text = trim($text);
            if (strlen($text) > 0)
            {
                $arr[$nextIdx]['@text'] = $text;
            }
            $arr[$nextIdx]['@children'] = array();
            core_class::convertXmlObjToArr($node, $arr[$nextIdx]['@children']);
        }
        return;
    }

    // convert string to array
    function convertStrToArr( $str, $split )
    {
        $array = explode( $split, $str );
        return $array;
    }

    function match_url($input)
    {
        preg_match('@^(?:http://)?([^/]+)@i', $input, $matches);
        return $matches[1];
    }

    function isValidEmail($email)
    {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email);
    }
	
	function folderdir($start_dir='.') {

	  $files = array();
	  if (is_dir($start_dir)) {
		$fh = opendir($start_dir);
		while (($file = readdir($fh)) !== false) {
		  # loop through the files, skipping . and .., and recursing if necessary
		  if (strcmp($file, '.')==0 || strcmp($file, '..')==0) continue;
		  //$filepath = $start_dir . '/' . $file;
		  $filepath = $file;
		  if ( is_dir($filepath) )
			$files = array_merge($files, $this->folderdir($filepath));
		  else
			array_push($files, $filepath);
		}
		closedir($fh);
	  } else {
		# false if the function was called with an invalid non-directory argument
		$files = false;
	  }
	
	  return $files;
	
	}

    // func send email SMTP
    public function doSendMail( $mailto, $subject, $message, $mailfrom, $file_attach = "" )
    {
        global $DB;
        global $input;
        global $conf;
        global $vnT;
        $vnT->mailer->FromName = $vnT->conf['form_name'] ? $vnT->conf['form_name'] : $_SERVER['HTTP_HOST'];
        $vnT->mailer->Host = $vnT->conf['smtp_host'];
        $vnT->mailer->Port = $vnT->conf['smtp_port'];
        if ( $vnT->conf['method_email'] == "smtp" )
        {
            $vnT->mailer->Mailer = "smtp";
        }
        else
        {
            $vnT->mailer->Mailer = "mail";
        }
        $vnT->mailer->CharSet = "utf-8";
        $vnT->mailer->SMTPAuth = true;
        $vnT->mailer->Username = $vnT->conf['smtp_username'];
        $vnT->mailer->Password = $vnT->conf['smtp_password'];
        $vnT->mailer->IsHTML( true );
        $vnT->mailer->to = array( );
        $vnT->mailer->cc = array( );
        $eol = "\n";
        $xheaders = "Message-ID: <".time( )." TheSystem@".$_SERVER['SERVER_NAME'].">".$eol;
        $xheaders .= "X-Mailer: PHP v".phpversion( ).$eol;
        $vnT->mailer->AddCustomHeader( $xheaders );
        $arrFrom = explode( ",", $mailfrom );
        $vnT->mailer->From = $arrFrom[0];
        $vnT->mailer->Subject = $subject;
        $vnT->mailer->Body = $message;
        $arrTo = explode( ",", $mailto );
        $i = 0;
        for ( ; $i < count( $arrTo ); ++$i )
        {
            if ( $i == 0 )
            {
                $_SERVER( $arrTo[$i], $_SERVER['HTTP_HOST'] );
            }
            else
            {
                $_SERVER( $arrTo[$i], $_SERVER['HTTP_HOST'] );
            }
        }
        if ( !empty( $file_attach ) )
        {
            $vnT->mailer->AddAttachment( $file_attach, "{$file_attach}" );
        }
        $sent = $vnT->mailer->Send( );
        return $sent;
    }

    // ham php send mail SMTP cho ung vien
    public function smtpSendMailCandidate($EmailSubject, $MailContent, $EmailSendToAddress, $EmailSendToName) {

        date_default_timezone_set('Asia/Krasnoyarsk');

        require_once('libraries/mailler/class.phpmailer.php');
        require_once('libraries/mailler/class.smtp.php');

        $mail             = new PHPMailer();
        $body             = $MailContent;
        $body             = eregi_replace("[\]",'',$body);

        $mail->IsSMTP();
        $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication

        /*
        $mail->SMTPSecure = "ssl";               // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";        // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = $MailAccount;  			// GMAIL username
        $mail->Password   = $MailPass;            // GMAIL password
        */

        $mail->Host       = $GLOBALS['APP']['config']['smtp']['host'];             // "221.133.1.59"; sets GMAIL as the SMTP server
        $mail->Port       = $GLOBALS['APP']['config']['smtp']['port']; //465;                             // 25; set the SMTP port for the GMAIL server
        $mail->Username   = $GLOBALS['APP']['config']['smtp']['username'];    // GMAIL username
        $mail->Password   = $GLOBALS['APP']['config']['smtp']['password']; // GMAIL password

        $mail->SetFrom($GLOBALS['APP']['config']['smtp']['username'], $GLOBALS['APP']['config']['smtp']['display_name']);        // Định danh người gửi

        $mail->AddReplyTo($GLOBALS['APP']['config']['smtp']['username'], $GLOBALS['APP']['config']['smtp']['display_name']); //Định danh người sẽ nhận trả lời

        $mail->Subject    = $EmailSubject; //Tiêu đề Mail

        $mail->AltBody    = "Để xem tin này, vui lòng bật tương thích chế độ hiển thị mã HTML!"; // optional, comment out and test

        $mail->MsgHTML($MailContent);

        $address = $EmailSendToAddress; //Địa chỉ mail cần gửi tới
        $mail->AddAddress($address, $EmailSendToName); //Gửi tới ai ?

        //$mail->AddAttachment("dinhkem/02.jpg");      // Đính kèm
        //$mail->AddAttachment("dinhkem/200_100.jpg"); // Đính kèm

        if(!$mail->Send()) {
            return false;
            //echo "Lỗi gửi mail: " . $mail->ErrorInfo;
        } else {
            return true;
            //echo "moi thu ok ma: " . $mail->ErrorInfo;
        }

    }

    public function smtpSendMailContact($EmailSubject, $MailContent, $EmailSendToAddress, $EmailSendToName) {

        date_default_timezone_set('Asia/Krasnoyarsk');

        require_once('libraries/mailler/class.phpmailer.php');
        require_once('libraries/mailler/class.smtp.php');

        $mail             = new PHPMailer();
        $body             = $MailContent;
        $body             = eregi_replace("[\]",'',$body);

        $mail->IsSMTP();
        $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication

        /*
        $mail->SMTPSecure = "ssl";               // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";        // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = $MailAccount;  			// GMAIL username
        $mail->Password   = $MailPass;            // GMAIL password
        */

        $mail->Host       = $GLOBALS['APP']['config']['smtp']['host'];             // "221.133.1.59"; sets GMAIL as the SMTP server
        $mail->Port       = $GLOBALS['APP']['config']['smtp']['port']; //465;                             // 25; set the SMTP port for the GMAIL server
        $mail->Username   = $GLOBALS['APP']['config']['smtp']['username'];    // GMAIL username
        $mail->Password   = $GLOBALS['APP']['config']['smtp']['password']; // GMAIL password

        $mail->SetFrom($EmailSendToAddress, $EmailSendToName);        // Định danh người gửi

        $mail->AddReplyTo($EmailSendToAddress, $EmailSendToName); //Định danh người sẽ nhận trả lời

        $mail->Subject    = $EmailSubject; //Tiêu đề Mail

        $mail->AltBody    = "Để xem tin này, vui lòng bật tương thích chế độ hiển thị mã HTML!"; // optional, comment out and test

        $mail->MsgHTML($MailContent);

        $address = $EmailSendToAddress; //Địa chỉ mail cần gửi tới
        $mail->AddAddress($address, $EmailSendToName); //Gửi tới ai ?

        //$mail->AddAttachment("dinhkem/02.jpg");      // Đính kèm
        //$mail->AddAttachment("dinhkem/200_100.jpg"); // Đính kèm

        if(!$mail->Send()) {
            return false;
            //echo "Lỗi gửi mail: " . $mail->ErrorInfo;
        } else {
            return true;
            //echo "moi thu ok ma: " . $mail->ErrorInfo;
        }

    }

    // ham php send mail SMTP cho ung vien
    public function smtpSendMailEmployer($MailAccount, $MailPass, $EmailSubject, $MailContent, $EmailSendToAddress, $EmailSendToName) {
        date_default_timezone_set('Asia/Krasnoyarsk');
        require_once('../mailler/class.phpmailer.php');
        //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
        $mail             = new PHPMailer();
        $body             = $MailContent;
        $body             = eregi_replace("[\]",'',$body);

        $mail->IsSMTP();
        $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";               // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";        // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = $MailAccount;  			// GMAIL username
        $mail->Password   = $MailPass;            // GMAIL password

        $mail->SetFrom($MailAccount, 'www.teacher24h.vn'); //Định danh người gửi

        $mail->AddReplyTo($MailAccount,"www.teacher24h.vn"); //Định danh người sẽ nhận trả lời

        $mail->Subject    = $EmailSubject; //Tiêu đề Mail

        $mail->AltBody    = "Để xem tin này, vui lòng bật tương thích chế độ hiển thị mã HTML!"; // optional, comment out and test

        $mail->MsgHTML($body);

        $address = $EmailSendToAddress; //Địa chỉ mail cần gửi tới
        $mail->AddAddress($address, $EmailSendToName); //Gửi tới ai ?

        //$mail->AddAttachment("dinhkem/02.jpg");      // Đính kèm
        //$mail->AddAttachment("dinhkem/200_100.jpg"); // Đính kèm

        if(!$mail->Send()) {
            return false;
            //echo "Lỗi gửi mail: " . $mail->ErrorInfo;
        } else {
            return true;
            //echo "moi thu ok ma: " . $mail->ErrorInfo;
        }

    }

    function genRandomString($length) {
        $length = $length;// chieu dai chuoi ky tu random
        $characters = '0123456789';
        $string = null;
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters) -1)];
        }
        return $string;
    }

    //Phương thức chống SQL Injection
    public function sqlQuote( $value )
    {
        //Kiểm tra xem version PHP bạn sử dụng có hiểu hàm mysql_real_escape_string() hay ko

        if ($this->real_escape_string_exists) {
            //Trường hợp sử dụng PHP v4.3.0 trở lên
            //PHP hiểu hàm mysql_real_escape_string()

            if( $this->magic_quotes_active ) {
                //Trong trường hợp PHP đã hỗ trợ hàm get_magic_quotes_gpc()
                //Ta sử dụng hàm stripslashes để bỏ qua các dấu slashes
                $value = stripslashes( $value );
            }
            $value = mysql_real_escape_string( $value );
        }
        else {
            //Trường hợp dùng cho các version PHP dưới 4.3.0
            //PHP không hiểu hàm mysql_real_escape_string()

            if( !$this->magic_quotes_active ){
                //Trong trường hợp PHP không hỗ trợ hàm get_magic_quotes_gpc()
                //Ta sử dụng hàm addslashes để thêm các dấu slashes vào giá trị
                $value = addslashes( $value );
            }
            // Nếu hàm get_magic_quotes_gpc() đã active có nghĩa là các dấu slashes đã tồn tại rồi
        }
        return $value;
    }

    function xss_clean($var)
    {
        static
        $preg_find    = array('#^javascript#i', '#^vbscript#i'),
        $preg_replace = array('java script',   'vb script');

        return preg_replace($preg_find, $preg_replace, htmlspecialchars(trim($var)));
    }

    function htmlsql_cleans($s)
    {
        $s = preg_replace("#&(?!\#[0-9]+;)#si", "&amp;", $s); // Fix & but allow unicode
        $s = str_replace('<javascript>', 'java script', $s);
        $s = str_replace('<vbscript>',   'vb script', $s);
        $s = str_replace("<","&lt;",$s);
        $s = str_replace(">","&gt;",$s);
        $s = str_replace('"','\"',$s);
        $s = str_replace("  ", "&nbsp;&nbsp;", $s);
        $s = str_replace("'","\'",$s);
        return strip_tags($s);
    }


    // #############################################################################
    /**
     * Unicode-safe version of htmlspecialchars()
     *
     * @param	string	Text to be made html-safe
     *
     * @return	string
     */
    function htmlspecialchars_uni($text, $entities = true)
    {
        return str_replace(
        // replace special html characters
            array('<', '>', '"'),
            array('&lt;', '&gt;', '&quot;'),
            preg_replace(
            // translates all non-unicode entities
                '/&(?!' . ($entities ? '#[0-9]+|shy' : '(#[0-9]+|[a-z]+)') . ';)/si',
                '&amp;',
                $text
            )
        );
    }

    // #############################################################################
    /**
     * so sanh gia tri id trong 1 mang gia tri id _checkIdinArray()()
     *
     * @param	id , array id
     *
     * @return	true/false
     */
    function _checkIdinArray( $id, $array )
    {
        $arrayId = explode(",", $array);
        for($i = 0; $i < count($arrayId); $i++){
            if( $id == $arrayId[$i]) return true;
        }
    }

    // #############################################################################
    /**
     * lay gia tri cot so thu tu lon nhat trong ban dc chi dinh
     *
     * @param	colum , table
     *
     * @return	max id
     */
    function process_getmaxid($table, $column)
    {
        $sql = "select MAX(`$column`)+1 As `MaxId` from `$table`;";

        $dbObj = new classDb();

        $result = $dbObj->SqlQueryOutputResult($sql, array(0));

        if ($row = $result->fetch()) {
            if ($row['MaxId'] == 0) {
                return 1;
            }
            else {
                return $row['MaxId'];
            }
        }
    }

    public function reload()
    {
        $this->_redirect('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
    }

    function micro_time ($time)
    {
        $temp = explode(" ", $time);
        return bcadd($temp[0], $temp[1], 6);
    }

    public function getBrowser( $browser )
    {
        if ( $browser )
        {
            if ( strpos( $browser, "Mozilla/5.0" ) )
            {
                $browsertyp = "Mozilla";
            }
            if ( strpos( $browser, "Mozilla/4" ) )
            {
                $browsertyp = "Netscape";
            }
            if ( strpos( $browser, "Mozilla/3" ) )
            {
                $browsertyp = "Netscape";
            }
            if ( strpos( $browser, "Firefox" ) || strpos( $browser, "Firebird" ) )
            {
                $browsertyp = "Firefox";
            }
            if ( strpos( $browser, "MSIE" ) )
            {
                $browsertyp = "Internet Explorer";
            }
            if ( strpos( $browser, "pera" ) )
            {
                $browsertyp = "Opera";
            }
            if ( strpos( $browser, "Netscape" ) )
            {
                $browsertyp = "Netscape";
            }
            if ( strpos( $browser, "Camino" ) )
            {
                $browsertyp = "Camino";
            }
            if ( strpos( $browser, "Galeon" ) )
            {
                $browsertyp = "Galeon";
            }
            if ( strpos( $browser, "Konqueror" ) )
            {
                $browsertyp = "Konqueror";
            }
            if ( strpos( $browser, "Safari" ) )
            {
                $browsertyp = "Safari";
            }
            if ( strpos( $browser, "OmniWeb" ) )
            {
                $browsertyp = "OmniWeb";
            }
            if ( strpos( $browser, "OmniWeb" ) )
            {
                $browsertyp = "OmniWeb";
            }
            if ( strpos( $browser, "Flock" ) )
            {
                $browsertyp = "Firefox Flock";
            }
            if ( strpos( $browser, "Lynx" ) )
            {
                $browsertyp = "Lynx";
            }
            if ( strpos( $browser, "Mosaic" ) )
            {
                $browsertyp = "Mosaic";
            }
            if ( strpos( $browser, "Googlebot" ) || strpos( $browser, "www.google.com" ) )
            {
                $browsertyp = "Google Bot";
            }
            if ( !isset( $browsertyp ) )
            {
                $browsertyp = "UnKnown";
            }
        }
        return $browsertyp;
    }

    public function getOs( $os )
    {
        if ( $os )
        {
            if ( strpos( $os, "Win95" ) || strpos( $os, "Windows 95" ) )
            {
                $ostyp = "Windows 95";
            }
            if ( strpos( $os, "Win98" ) || strpos( $os, "Windows 98" ) )
            {
                $ostyp = "Windows 98";
            }
            if ( strpos( $os, "WinNT" ) || strpos( $os, "Windows NT" ) )
            {
                $ostyps = "Windows NT";
            }
            if ( strpos( $os, "WinNT 5.0" ) || strpos( $os, "Windows NT 5.0" ) )
            {
                $ostyp = "Windows 2000";
            }
            if ( strpos( $os, "WinNT 5.1" ) || strpos( $os, "Windows NT 5.1" ) )
            {
                $ostyp = "Windows XP";
            }
            if ( strpos( $os, "WinNT 6.0" ) || strpos( $os, "Windows NT 6.0" ) )
            {
                $ostyp = "Windows Vista";
            }
            if ( strpos( $os, "Linux" ) )
            {
                $ostyp = "Linux";
            }
            if ( strpos( $os, "OS/2" ) )
            {
                $ostyp = "OS/2";
            }
            if ( strpos( $os, "Sun" ) )
            {
                $ostyp = "Sun OS";
            }
            if ( strpos( $os, "Macintosh" ) || strpos( $os, "Mac_PowerPC" ) )
            {
                $ostyp = "Mac OS";
            }
            if ( strpos( $os, "Googlebot" ) || strpos( $os, "www.google.com" ) )
            {
                $ostyp = "Google Bot";
            }
            if ( !isset( $ostyp ) )
            {
                $ostyp = "UnKnown";
            }
        }
        return $ostyp;
    }

    public function doGetFile( $data )
    {
        $path = $data['path'].$data['dir'];
        $url = chop( $data['url']( $data['url'] ) );
        $dir1 = date( "m_Y", time( ) );
        if ( $data['newdir'] )
        {
            if ( !is_dir( $path."/".$dir1 ) )
            {
                mkdir( $path."/".$dir1, 511 );
                if ( $data['thum'] )
                {
                    @mkdir( @$path."/".$dir1."/thumbs", 511 );
                    $ndir_thumb = $path."/".$dir1."/thumbs";
                    @exec( @"chmod 777 {$ndir_thumb}" );
                }
                $ndir = $path."/".$dir1;
                @exec( @"chmod 777 {$ndir}" );
            }
            $path = $path."/".$dir1;
        }
        $fext = strtolower( substr( $url, strrpos( $url, "." ) + 1 ) );
        $lastx = strrpos( $url, "/" );
        $fname = $path."/".substr( $url, $lastx + 1 );
        $fname = str_replace( "%20", "_", $fname );
        $fname = str_replace( " ", "_", $fname );
        $fname = str_replace( "&amp;", "_", $fname );
        $fname = str_replace( "&", "_", $fname );
        $fname = str_replace( ";", "_", $fname );
        $file_name = $data['pic_name']."_".time( ).".{$fext}";
        $fname = $path."/".$file_name;
        $file = @fopen( $fname, "w" );
        if ( $f = @fopen( $url, "r" ) )
        {
            while ( @!feof( $f ) )
            {
                @fwrite( $file, @fread( $f, 1024 ) );
            }
            @fclose( $f );
            @fclose( $file );
            if ( $data['type'] == "hinh" && ( $fext == "jpg" || $fext == "jpeg" ) )
            {
                $path_desc = $path."/".$file_name;
                $data['w']( $fname, $path_desc, $data['w'] );
                $picture = $file_name;
                if ( $data['thum'] )
                {
                    $path_thumb = $path."/thumbs/".$file_name;
                    $data['w_thum']( $fname, $path_thumb, $data['w_thum'] );
                }
            }
            $re['link'] = $dir1."/".$picture;
            $re['type'] = $fext;
        }
        else
        {
            $re['err'] = "Cannot Read from this File ! Plz save to your Computer and Upload It";
        }
        return $re;
    }

    public function thum( $imgfile = "", $path, $max )
    {
        $info = getimagesize( $imgfile );
        $mime = $info[2];
        $fext = $mime == 1 ? "image/gif" : $mime == 2 ? "image/jpeg" : $mime == 3 ? "image/png" : NULL;

        switch ( $fext )
        {
            case "image/jpeg" :
                if ( !function_exists( "imagecreatefromjpeg" ) )
                {
                    exit( "No create from JPEG support" );
                    break;
                }
                else
                {
                    $img['src'] = imagecreatefromjpeg( $imgfile );
                    break;
                }
            case "image/png" :
                if ( !function_exists( "imagecreatefrompng" ) )
                {
                    exit( "No create from PNG support" );
                    break;
                }
                else
                {
                    $img['src'] = imagecreatefrompng( $imgfile );
                    break;
                }
            case "image/gif" :
                if ( !function_exists( "imagecreatefromgif" ) )
                {
                    exit( "No create from GIF support" );
                    break;
                }
                else
                {
                    $img['src'] = imagecreatefromgif( $imgfile );
                    break;
                }
            default :
                exit( "Định dang file không hợp lệ" );
        }
        $img['old_w'] = imagesx( $img['src'] );
        $img['old_h'] = imagesy( $img['src'] );
        $new_h = $img['old_h'];
        $new_w = $img['old_w'];
        if ( $max < $img['old_w'] )
        {
            $new_w = $max;
            $new_h = $max / $img['old_w'] * $img['old_h'];
        }
        $img['des'] = imagecreatetruecolor( $new_w, $new_h );
        $balck = imagecolorallocate( $img['des'], 0, 0, 0 );
        imagefill( $img['des'], 1, 1, $balck );
        imagecopyresampled( $img['des'], $img['src'], 0, 0, 0, 0, $new_w, $new_h, $img['old_w'], $img['old_h'] );
        touch( $path );
        switch ( $fext )
        {
            case "image/pjpeg" :
            case "image/jpeg" :
            case "image/jpg" :
                imagejpeg( $img['des'], $path, 90 );
                break;
            case "image/png" :
                imagepng( $img['des'], $path, 90 );
                break;
            case "image/gif" :
                imagegif( $img['des'], $path, 90 );
                break;
            default :
                exit( "Định dang file không hợp lệ" );
                imagedestroy( $img['des'] );
        }
    }

    public function Save( $imgfile = "", $path, $w )
    {
        $gd_version = 2;
        $info = getimagesize( $imgfile );
        $mime = $info[2];
        $fext = $mime == 1 ? "image/gif" : $mime == 2 ? "image/jpeg" : $mime == 3 ? "image/png" : NULL;
        switch ( $fext )
        {
            case "image/pjpeg" :
            case "image/jpeg" :
            case "image/jpg" :
                if ( !function_exists( "imagecreatefromjpeg" ) )
                {
                    exit( "No create from JPEG support" );
                    break;
                }
                else
                {
                    $img['src'] = imagecreatefromjpeg( $imgfile );
                    break;
                }
            case "image/png" :
                if ( !function_exists( "imagecreatefrompng" ) )
                {
                    exit( "No create from PNG support" );
                    break;
                }
                else
                {
                    $img['src'] = imagecreatefrompng( $imgfile );
                    break;
                }
            case "image/gif" :
                if ( !function_exists( "imagecreatefromgif" ) )
                {
                    exit( "No create from GIF support" );
                    break;
                }
                else
                {
                    $img['src'] = imagecreatefromgif( $imgfile );
                    break;
                }
            default :
                exit( "Định dang file không hợp lệ" );
        }
        $img['old_w'] = imagesx( $img['src'] );
        $img['olh_h'] = imagesy( $img['src'] );
        if ( $w != 0 )
        {
            if ( $w < $img['old_w'] )
            {
                $h = $w / $img['old_w'] * $img['olh_h'];
            }
            else
            {
                $w = $img['old_w'];
                $h = $img['olh_h'];
            }
            if ( $w * 2 < $h )
            {
                $w *= $w * 2 / $h;
                $h = $w * 2;
            }
        }
        else
        {
            $w = $img['old_w'];
            $h = $img['olh_h'];
        }
        if ( $w < 96 )
        {
            $space = ( 96 - $w ) / 2;
            $w = 96;
        }
        else
        {
            $space = 0;
        }
        if ( $gd_version == 2 )
        {
            $img['des'] = imagecreatetruecolor( $w, $h );
            $balck = imagecolorallocate( $img['des'], 0, 0, 0 );
            imagefill( $img['des'], 1, 1, $balck );
            imagecopyresampled( $img['des'], $img['src'], $space, 0, 0, 0, $w - $space * 2, $h, $img['old_w'], $img['olh_h'] );
        }
        if ( $gd_version == 1 )
        {
            $img['des'] = imagecreatetruecolor( $w, $h );
            $white = imagecolorallocate( $img['des'], 255, 255, 255 );
            imagefill( $img['des'], 1, 1, $white );
            imagecopyresized( $img['des'], $img['src'], $space, 0, 0, 0, $w - $space * 2, $h, $img['old_w'], $img['olh_h'] );
        }
        touch( $path );
        switch ( $fext )
        {
            case "image/pjpeg" :
            case "image/jpeg" :
            case "image/jpg" :
                imagejpeg( $img['des'], $path, 90 );
                break;
            case "image/png" :
                imagepng( $img['des'], $path, 90 );
                break;
            case "image/gif" :
                imagegif( $img['des'], $path, 90 );
                break;
            default :
                exit( "Định dang file không hợp lệ" );
                imagedestroy( $img['des'] );
        }
    }

    public function Upload_Pic( $data )
    {
        $path = $data['path'].$data['dir'];
        $dir1 = date( "m_Y", time( ) );
        if ( !is_dir( $path.$dir1 ) )
        {
            mkdir( $path.$dir1, 511 );
            if ( $data['thum'] )
            {
                @mkdir( @$path.$dir1."/thumbs", 511 );
                $ndir_thumb = $path.$dir1."/thumbs";
                @exec( @"chmod 777 {$ndir_thumb}" );
            }
            $ndir = $path.$dir1;
            @exec( @"chmod 777 {$ndir}" );
        }
        $path .= $dir1;
        $max_size = 10000000;
        $err = "";
        $image = $data['file'];
        $image['name'] = str_replace( "%20", "_", $image['name'] );
        $image['name'] = str_replace( " ", "_", $image['name'] );
        $image['name'] = str_replace( "&amp;", "_", $image['name'] );
        $image['name'] = str_replace( "&", "_", $image['name'] );
        $image['name'] = str_replace( ";", "_", $image['name'] );
        $type = strtolower( substr( $image['name'], strrpos( $image['name'], "." ) + 1 ) );
        $src_name = substr( $image['name'], 0, strrpos( $image['name'], "." ) );
        if ( $data['resize'] )
        {
            $w = $data['w'];
        }
        if ( 0 < $image['size'] )
        {
            if ( $max_size < $image['size'] )
            {
                $err .= "File hình quá lớn :(";
            }
            if ( $data['type'] == "hinh" )
            {
                if ( $image['type'] == "image/gif" || $image['type'] == "image/pjpeg" || $image['type'] == "image/jpeg" || $image['type'] == "image/jpg" || $image['type'] == "image/png" || $image['type'] == "application/x-shockwave-flash" )
                {
                    if ( $data['pic_name'] )
                    {
                        $des_name = $data['pic_name'];
                        $fname = $path."/".$des_name.".".$type;
                    }
                    else
                    {
                        $des_name = $src_name;
                        $fname = $path."/".$image['name'];
                    }
                    if ( $data['overwrite'] != 1 && file_exists( $fname ) )
                    {
                        $des_name = $des_name."_".time( );
                    }
                }
                else
                {
                    $err .= "- Định dang file hình không hợp lệ !";
                }
            }
            if ( empty( $err ) )
            {
                $image_name = $des_name.".".$type;
                $link_file = $path."/".$image_name;
                if ( $data['type'] == "hinh" && $image['type'] != "application/x-shockwave-flash" )
                {
                    if ( $data['thum'] == 1 )
                    {
                        $link_file1 = $path."/thumbs/".$image_name;
                        $data['w_thum']( $image['tmp_name'], $link_file1, $data['w_thum'] );
                    }
                    $image['tmp_name']( $image['tmp_name'], $link_file, $w );
                }
                else
                {
                    if ( $data['thum'] == 1 )
                    {
                        $link_file1 = $path."/thumbs/".$image_name;
                        $res1 = copy( $image['tmp_name'], $link_file1 );
                    }
                    $res = copy( $image['tmp_name'], $link_file );
                }
                $re['link'] = $dir1."/".$image_name;
                $re['type'] = $type;
            }
        }
        $re['err'] = $err;
        return $re;
    }
    function getTimeInterval($timestamp){
        $date = new DateTime ();
        $date->setTimestamp($timestamp);
        $now = date ('Y-m-d H:i:s', time());
        $now = new DateTime ($now);

        if ($now >= $date) {
            $timeDifference = date_diff ($date , $now);
            $tense = " Trước";
        } else {
            $timeDifference = date_diff ($now, $date);
            $tense = " Sắp tới";
        }
        $period = array (" Giây", " Phút", " Giờ", " Ngày", " Tháng", " Năm");

        $periodValue= array ($timeDifference->format('%s'), $timeDifference->format('%i'), $timeDifference->format('%h'), $timeDifference->format('%d'), $timeDifference->format('%m'), $timeDifference->format('%y'));

        for ($i = 0; $i < count($periodValue); $i++) {
            if ($periodValue[$i] != 1) {
                $period[$i];
            }
            if ($periodValue[$i] > 0) {
                $interval = $periodValue[$i].$period[$i].$tense; // ie.: 3 months ago
            }
        }

        if (isset($interval)) {
            return $interval;
        } else {
            return "0 seconds" . $tense;
        }
    }

    public function getTwig(){
        global $conf;
        $twig = new Twig_Environment(new Twig_Loader_Filesystem($conf['template_user']), array(
            'cache' => './cache',
            'debug'=>true
        ));

        $filterSrcTemplate = new Twig_SimpleFilter('src_template', function ($string) use ($conf){
            return 'resource/'.mapping('template').'/'.$string;
        });
        $filterSrcUpload = new Twig_SimpleFilter('src_upload', function ($string) use ($conf){
            return 'files/'.$string;
        });
        $filterSmartSubstr = new Twig_SimpleFilter('SmartSubstr', function ($string,$length=200) use ($conf){
            return  $this->SmartContent($string,$length);
        });
        $filterUnserialize = new Twig_SimpleFilter('unserialize', function ($string) use ($conf){
            return unserialize($string);
        });
        $function = new Twig_Function_Function(function ($module_php, $param=[],$module_html='',$content_type='html') use ($conf){
            $module_html = empty($module_html)?$module_php:$module_html;
            if(file_exists(REAL_PATH."/".$conf['modules_path']."/$module_php/$module_php.frontend.php")){
                include  REAL_PATH."/".$conf['modules_path']."/$module_php/$module_php.frontend.php";
            }elseif (file_exists($conf['template_user']."/".$conf['modules_path']."/$module_html".$conf['ext'])){
                $this->view($module_html,['param'=>$param]);
            }
            else{
                echo "Module $module_html Not Found!";
            }

        });
        /*Function Extending */
        $twig->addFunction('include_module',$function);
        $twig->addFunction('csrf_token',new Twig_Function_Function(function (){
           echo md5( @$_POST['_token'] . time() );
        }));
        /*Filter Extending */
        $twig->addFilter($filterSrcUpload);
        $twig->addFilter($filterSrcTemplate);
        $twig->addFilter($filterUnserialize);
        $twig->addFilter($filterSmartSubstr);
        /*Setting*/
        $twig->getExtension('Twig_Extension_Core')->setNumberFormat(0, ',', '.');
        /*Global Variable*/
        $twig->addGlobal('config', $conf['data'] );
        $twig->addGlobal('query',$_GET);
        $twig->addGlobal('templates','resource/'.mapping('template'));
        return $twig;
    }
    function view($modulesName,$param=[]){
        global $conf;
        $twigModules = $this->getTwig();
        try{
            echo $twigModules->render($conf['modules_path'].'/'.$modulesName.$conf['ext'],$param);
        }catch (Exception $e) {
            echo 'Lỗi: ',  $e->getMessage(), "<br>";
            echo 'File: ', end(explode('\\',$e->getFile())), "<br>";
            echo 'Line: ', $e->getLine(), "<br>";
        }
    }

    function Load_Template($page){
        global $conf;
        $twigTemplate = $this->getTwig();
        try{
            echo $Template = $twigTemplate->render("pages/$page".$conf['ext']);
        }catch (Exception $e) {
            echo 'Lỗi: ',  $e->getMessage(), "<br>";
            echo 'File: ', end(explode('\\',$e->getFile())), "<br>";
            echo 'Line: ', $e->getLine(), "<br>";
            echo '<a href',$e->getPrevious(),'> Quay Lại</a>';
        }
    }
}
