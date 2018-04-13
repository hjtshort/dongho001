function func_notyfy(layout, type, message){
		
	var notification = []; notification[type] = message;							
							
	var self = $(this);	
	var data_layout = layout;
	var data_type 	= type;	// success | alert | error | warning | information | confirm

	notyfy({
		text: notification[data_type],
		type: data_type,
		dismissQueue: true,
		layout: data_layout,
		buttons: (data_type != 'confirm') ? false : [{
			addClass: 'btn btn-success btn-small btn-icon glyphicons ok_2',
			text: '<i></i> Ok',
			onClick: function ($notyfy) {
				$notyfy.close();
				notyfy({
					force: true,
					text: 'You clicked "<strong>Ok</strong>" button',
					type: 'success',
					layout: data_layout
				});
			}
		}, {
			addClass: 'btn btn-danger btn-small btn-icon glyphicons remove_2',
			text: '<i></i> Cancel',
			onClick: function ($notyfy) {
				$notyfy.close();
				notyfy({
					force: true,
					text: '<strong>You clicked "Cancel" button<strong>',
					type: 'error',
					layout: data_layout
				});
			}
		}]
	});
	return false;
}