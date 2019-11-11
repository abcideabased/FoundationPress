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

	// Vars
	var cookiesNoticeID = '#cookies-notice';
	var cookiesNoticeStorageName = 'cookies-notice';
	var cookiesNoticeStorageValue = 'dismissed';
	var cookiesNoticeDismissIDs = '#dismiss-cookies, #dismiss-cookies-close';
	var cookiesNoticeAnimateSpeed = 400;

  // check local storage for cookie acceptance on load, if not present show cookies notice
	if ( localStorage.getItem(cookiesNoticeStorageName) != cookiesNoticeStorageValue ) {

		// Display popup
		$(cookiesNoticeID).css('display','block');

		// Animate popup
		$(cookiesNoticeID).animate({
			opacity: 1,
		}, cookiesNoticeAnimateSpeed, function() {
			// Animation complete.
		});
	} else {
		$(cookiesNoticeID).remove();
	}

	// set local storage cookie acceptance
	$(cookiesNoticeDismissIDs).on('click keypress', function(event){
		if(a11yClick(event) === true){
			localStorage.setItem(cookiesNoticeStorageName,cookiesNoticeStorageValue);
			$(cookiesNoticeID).animate({
        opacity: 0,
      }, cookiesNoticeAnimateSpeed, function() {
        // Animation complete.

				// Remove cookie popup
				$(cookiesNoticeID).remove();
      });
		}
	});

});
