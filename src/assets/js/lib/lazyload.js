// Polyfill for older browser support
import 'intersection-observer';
IntersectionObserver.prototype.POLL_INTERVAL = 100;

import lozad from 'lozad';

lozad(".lazy", {
		rootMargin: "300px 0px",
		loaded: function (el) {

			// It's an interchange
			if(el.getAttribute('data-lazy-interchange')) {
				// Get this element's ID
				var $photoFrameID = el.id;

				if($photoFrameID != '') {

					// Add # for ID
					$photoFrameID = '#' + $photoFrameID;

					// Get data-lazy-interchange attribute
					var $photoAttributes = el.getAttribute('data-lazy-interchange');

					// Add to array
					$photoAttributes = $photoAttributes.replace(/\[/g,"'[");
					$photoAttributes = $photoAttributes.replace(/\]/g,"]'");
					//var $photoAttributesArray = $photoAttributes.split('],');
					//el.setAttribute('data-interchange',el.getAttribute('data-lazy-interchange'));
					//$(el).foundation('interchange', 'replace');

					// Photo frame
					var $photoFrame = $($photoFrameID);
					new Foundation.Interchange($photoFrame, {
						rules: [
							eval($photoAttributes)
						],
					 });
					 //console.log($photoAttributes); // Uncomment for debugging

					el.classList.add("is-loaded");
				} else {
					console.log('data-lazy-interchange requires an ID');
				}
			} else {

				// It's an image
				el.classList.add("is-loaded");
			}

		}
	}).observe();
