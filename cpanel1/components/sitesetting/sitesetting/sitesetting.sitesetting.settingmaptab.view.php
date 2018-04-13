<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
<form class="form-horizontal" id="validateSubmitForm" name="myForm" method="post">
<div id="wrapper">	
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>

        <div class="heading-buttons">
        	<h3 class="glyphicons settings"><i></i> Thiết lập cấu hình website</h3>
            <div class="buttons pull-right">
                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                <button type="submit" class="btn btn-primary btn-icon glyphicons edit"><i></i>Cập nhật</button>
            </div>
        	<div class="clearfix"></div>
        </div>
		<div class="separator bottom"></div>

		<div class="widget widget-2 widget-tabs">
            <div class="widget-head">
                <ul>
                    <li><a href="./sitesetting/sitesetting/view.html" class="glyphicons cogwheel"><i></i>Cấu hình website</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settinginfotab.html" class="glyphicons message_plus"><i></i>Thông tin liên hệ</a></li>
                    <li class="active"><a href="./sitesetting/sitesetting/view_settingmaptab.html" class="glyphicons google_maps"><i></i>Bản đồ</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingviewtab.html" class="glyphicons show_big_thumbnails"><i></i>Cấu hình hiển thị</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingviewinfotab.html" class="glyphicons display"><i></i>Cấu hình tên miền</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingurltab.html" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>
                </ul>
            </div>
            <div class="widget-body" style="padding: 10px;">
                    <!-- Danh mục tin liên quan -->
                    <div class="tab-pane" id="settingmapTab"> <br />
            		<div class="menusearch">
                        <ul><li class="span1"></li>
                            <li>&nbsp;Chọn thành phố:</li>
                            <li>
                            	<select name="map_location" id="map_location" style="width: 200px;" class="input-mini">
                                    <option value="1" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '1') echo ' selected="selected"'; ?>>Bản đồ Hà Nội</option>
                                    <option value="2" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '2') echo ' selected="selected"'; ?>>Bản đồ Hồ Chí Minh</option>
                                    <option value="3" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '3') echo ' selected="selected"'; ?>>Bản đồ Hải Phòng</option>
                                    <option value="4" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '4') echo ' selected="selected"'; ?>>Bản đồ Đà Nẵng</option>
                                    <option value="5" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '5') echo ' selected="selected"'; ?>>Bản đồ Nha Trang</option>
                                    <option value="6" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '6') echo ' selected="selected"'; ?>>Bản đồ Cần Thơ</option>
                                    <option value="7" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '7') echo ' selected="selected"'; ?>>Bản đồ Vĩnh Long</option>
                                    <option value="8" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '8') echo ' selected="selected"'; ?>>Bản đồ Bạc Liêu</option>
                                    <option value="9" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '9') echo ' selected="selected"'; ?>>Bản đồ Sóc Trăng</option>
                                    <option value="10" <?php if ($_APP['sitesetting']['settingmaptab']['map_location'] == '10') echo ' selected="selected"'; ?>>Bản đồ Cà Mau</option>
                                </select>
                            </li>
                            <li><input type="button" value=" Chọn bản đồ " class="btn btn-primary" onclick="changeCityMap()"/></li>
                            <li>Độ rộng bản đồ:</li>
                            <li><select name="map_zoom" id="map_zoom" style="width: 200px;" class="input-mini" onchange="change_map_size(this.value)">
                                                        <option value="1" <?php if ($_APP['sitesetting']['settingmaptab']['map_zoom'] == '1') echo ' selected="selected"'; ?>>600x400</option>
                                                            <option value="2" <?php if ($_APP['sitesetting']['settingmaptab']['map_zoom'] == '2') echo ' selected="selected"'; ?>>800x500</option>
                                                            <option value="3" <?php if ($_APP['sitesetting']['settingmaptab']['map_zoom'] == '3') echo ' selected="selected"'; ?>>1024x600</option>
                                                    </select></li>
                        </ul>
                    </div>
               <div class="row-fluid">
					<div class="span2">
					</div>
					<div class="span9"><div style="position:relative;left: 24px;"><p class="muted" style="float:left;top: 6px;position:relative;"><strong>Nhập địa chỉ:&nbsp;</strong></p>
						<input type="text" name="input_address" class="span6" id="input_address">&nbsp;
                        <input type="submit" onclick="javascript:geocode(document.getElementById('input_address').value); return false;" class="btn btn-primary" value="Tìm kiếm" />&nbsp;
                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Chọn thành phố, sau đó điền địa chỉ bạn muốn hiển thị trên bản đồ Google."></span></div>    
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted"><strong>Danh sách địa điểm</strong> &nbsp;</p>
                        
					</div>
					<div class="span10"><br>
						<div id="map_canvas"  style="width: 600px; height: 400px; float:left"></div>
						<div style="position:relative;left:7px"> 
                            <strong>Cách đánh địa chỉ:</strong> Bạn chọn thành phố và tìm đến vị trí của bạn
                            trên bản đồ hoặc nhập vào ô tìm kiếm địa chỉ của bạn. Sau đó bấm chuột trái vào
                            vị trí này để nhập thông tin địa chỉ của bạn.
                        </div></div>
						<div class="separator"></div>
					</div>
				</div>
                <br />
            </div>
                    <!-- Danh mục tin liên quan END -->
            </div>
		</div>
            
    </div>
				<!-- End Content -->
                <input type="hidden" name="hidden" value="sitesetting.settingmaptab.add" />
</div>

   <!--scrip map-->
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">

// Variables to hold 
var geocoder;
var map;

function geocode(address) 
{
    geocoder.geocode({'address':address}, onGeocodeResult);
}	

function onGeocodeResult(result, status) 
{
	// Get the lattitude and langgitude of the first result (note: real app should check for no result being returned)
	var myLatitudeAndLangitude=new google.maps.LatLng(
		result[0]['geometry']['location']['lat'](),
		result[0]['geometry']['location']['lng']());

	// Show a marker in the first result.
	// http://code.google.com/apis/maps/documentation/javascript/overlays.html		
	    markerSearh = new google.maps.Marker({
		map:map,
		draggable:true,
		animation:google.maps.Animation.BOUNCE,
		position:myLatitudeAndLangitude
	});
	map.panTo(myLatitudeAndLangitude);
	
	var myOptions = {
		zoom: 16,
	}	
	map.setOptions(myOptions);
	
	var infowindow = new google.maps.InfoWindow({
		content: result[0]['formatted_address']
	});
	infowindow.open(map,markerSearh);	
}
//function loadGoogleMapScript() {
//  var script = document.createElement("script");
//  script.type = "text/javascript";
//  script.src = "http://maps.google.com/maps/api/js?sensor=true&callback=initialize";
//  document.body.appendChild(script);
//}
  
//window.onload = loadGoogleMapScript;
// INITIALIZATION PART ENDS
</script>
<script type="text/javascript">
    
	//function displayMap() {
                    //document.getElementById('map_canvas').style.display="block";
                    jQuery(document).ready(function () {
        					initialize();
    				});
               // }
				
</script>

<script language="javascript" type="text/javascript">

    var map;
    var clickmarker;
    var infowindow;
    var marker_placed = false;
    var marker = new Array();
    var old_id = 0;
    var infoWindowArray = new Array();
    var infowindow_array = new Array();
    var city_location = new Array();

    function initialize() {


        var defaultLatLng = new google.maps.LatLng(21.02777771911, 105.85237033331);
        var myOptions = { zoom: 16,
            center: defaultLatLng,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        map.setCenter(defaultLatLng);
        geocoder = new google.maps.Geocoder();

        //-----------------------------------------------------------
	
	
		//-----------------------------------------------------------
        google.maps.event.addListener(map, 'click', function(event) {
            //N?u dã d?t icon r?i thì ph?i cancel
            if (marker_placed) {
                Cancel();
            }
            placeMarker(event.latLng);
            marker_placed = true;
        });

        city_location[1] = new google.maps.LatLng(21.027521, 105.852449);
        city_location[2] = new google.maps.LatLng(10.759579, 106.668661);
        city_location[3] = new google.maps.LatLng(20.860221, 106.680783);
        city_location[4] = new google.maps.LatLng(16.050528, 108.213351);
        city_location[5] = new google.maps.LatLng(12.247155, 109.189210);
        city_location[6] = new google.maps.LatLng(10.033829, 105.780144);
		city_location[7] = new google.maps.LatLng(10.246350, 105.961552);
		city_location[8] = new google.maps.LatLng(9.286216, 105.723669);
		city_location[9] = new google.maps.LatLng(9.602682, 105.974207);
		city_location[10] = new google.maps.LatLng(9.183668, 105.153183);
    }

    function placeMarker(location) {
        var clickedLocation = new google.maps.LatLng(location);
        clickmarker = new google.maps.Marker({
            position: location,
            clickable: false,
            map: map
        });
        //map.setCenter(location);


        var contentString = '<form method="post"><table width="350" style="border-spacing:5px;"><tr><td colspan="2" class="content_title">Nhập địa chỉ</td></tr><tr><td nowrap="nowrap" class="form_name"><font color="red">*</font>Địa chỉ:</td><td><input type="text" name="gmap_address" id="gmap_address_0" class="form_control" style="width:230px" maxlength="200" /></td></tr><tr><td class="form_name">Điện thoại:</td><td><input type="text" name="gmap_phone" class="form_control" style="width:230px" maxlength="200" /></td></tr><tr><td class="form_name">Thứ tự:</td><td><input type="text" name="gmap_order" class="form_control" style="width:50px" maxlength="5" /></td></tr><tr><td class="form_name">Trụ sở chính:</td><td><input type="checkbox" name="gmap_default" class="form_control" /></td></tr><tr><td colspan="2" align="center"><input type="submit" value="Lưu lại" class="form_button" onclick="return checkForm(0)" />&nbsp;&nbsp;&nbsp;<input type="button" value="Hủy bỏ" onclick="Cancel();" class="form_button"/></td></tr></table><input type="hidden" name="lat" value="' + location.lat() + '" /><input type="hidden" name="lng" value="' + location.lng() + '" /><input type="hidden" name="action" value="insert" /></form>';

        infowindow = new google.maps.InfoWindow({ content: contentString });
        infowindow.open(map, clickmarker);

        google.maps.event.addListener(infowindow, 'closeclick', function() { clickmarker.setVisible(false); clickable = true; });
    }

    function Cancel() {
        clickmarker.setVisible(false);
        infowindow.close();
        marker_placed = false;
    }

    function loadMarker(myLocation, myInfoWindow, id) {
        marker[id] = new google.maps.Marker({
            position: myLocation,
            map: map,
            visible: true
        });

        var popup = myInfoWindow;

        infowindow_array[id] = new google.maps.InfoWindow({ content: popup });

        google.maps.event.addListener(marker[id], 'click', function() {
            infowindow_array[id].open(map, marker[id]);
        });
    }

    //Di chuy?n d?n d?a ch? click
    function moveToMaker(id) {
        //Thi?t l?p v? trí center
        var location = marker[id].position;
        map.setCenter(location);

        //Close old info
        if (old_id > 0) infowindow_array[old_id].close();
        //Show info
        infowindow_array[id].open(map, marker[id]);
        //Gán old_id vào d? sau còn close infowindow
        old_id = id;
    }

    function changeCityMap() {
	
        map.setCenter(city_location[document.getElementById("map_location").value]);
    }

    function checkForm(id) {
        if (document.getElementById("gmap_address_" + id).value == "") {
            alert('Bạn hãy nhập vào địa chỉ');
            document.getElementById("gmap_address_" + id).focus();
            return false;
        }
        return true;
    }

    //Ð?i d? r?ng b?n d?
    function change_map_size(value) {
        switch (value) {
            case "1":
                document.getElementById("map_canvas").style.width = "600px";
                document.getElementById("map_canvas").style.height = "400px";
                break;
            case "2":
                document.getElementById("map_canvas").style.width = "800px";
                document.getElementById("map_canvas").style.height = "500px";
                break;
            case "3":
                document.getElementById("map_canvas").style.width = "1024px";
                document.getElementById("map_canvas").style.height = "600px";
                break;
        }
    }
</script>     
</form>