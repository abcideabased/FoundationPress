$(function() {

  // Apply keyboard interaction to buttons
	function a11yClick(event){
    if(event.type === 'click'){
        return true;
    }
    else if(event.type === 'keypress'){
        var code = event.charCode || event.keyCode;
        if((code === 32)|| (code === 13)){
            return true;
        }
    }
    else{
        return false;
    }
	}

  // check local storage for cookie acceptance on load, if not present show cookies notice
	if ( localStorage.getItem('cookies-notice') != 'dismissed' ) {
		$('#cookies-notice').show();
	}

	// set local storage cookie acceptance
	$('#dismiss-cookies, #dismiss-cookies-close').on('click keypress', function(event){
		if(a11yClick(event) === true){
			localStorage.setItem('cookies-notice','dismissed');
			$('#cookies-notice').animate({
        opacity: 0,
      }, 400, function() {
        // Animation complete.
      });
		}
	});

});
