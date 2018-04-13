<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	    	
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	$conf['geturl'] 		 = $func->get_url( "page|view|act|id" );
		
	switch ( $conf['geturl']['view'] ) {
	
		case "":
			include_once("404.php");
		break;

		case "contacts":		
			
			switch ( $conf['geturl']['act'] ) {
					
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("contacts/contacts.contacts.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "advancesearch":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("contacts/contacts.contacts.advancesearch.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "edit":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("contacts/contacts.contacts.edit.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "reply":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("contacts/contacts.contacts.reply.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
			}
			
			break;
		
		break;
		
		case "customergroups":
			
			switch ( $conf['geturl']['act'] ) {		
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("customergroups/contacts.customergroups.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("customergroups/contacts.customergroups.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("$com_folder/header/header.html.php");
					//include_once("customergroups/contacts.customergroups.edit.admin.php");
					//include_once("$com_folder/footer/footer.html.php");
				break;						
			}
			
		break;
		
		case "emailsubscription":
			
			switch ( $conf['geturl']['act'] ) {	
			
				case "":
					//include_once("process/content.category.view.models.php");
					//include_once("category/content.category.view.admin.php");
				break;

				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("emailsubscription/contacts.emailsubscription.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					//include_once("$com_folder/header/header.html.php");
					//include_once("emailsubscription/contacts.emailsubscription.add.admin.php");
					//include_once("$com_folder/footer/footer.html.php");
				break;
				
			}
			
		break;
		
		case "customers":
		
			switch ( $conf['geturl']['act'] ) {					
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("customers/contacts.customers.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("customers/contacts.customers.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
			}
		
		break;
		
		default:
			include_once("404.php");
		break;
	
	}
}
?>