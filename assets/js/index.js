/*	-----------------------------------------------------------------------------------------------
	Namespace
--------------------------------------------------------------------------------------------------- */

var twentytwenty = twentytwenty || {};

// event "polyfill"
twentytwenty.createEvent = function( eventName ) {
	var event;
	if ( typeof window.Event === 'function' ) {
		event = new Event( eventName );
	} else {
		event = document.createEvent( 'Event' );
		event.initEvent( eventName, true, false );
	}
	return event;
};

/*	-----------------------------------------------------------------------------------------------
	Cover Modals
--------------------------------------------------------------------------------------------------- */
twentytwenty.coverModals = {

	init: function() {
		if ( document.querySelector( '.cover-modal' ) ) {
			// Handle cover modals when they're toggled
			this.onToggle();

			// Hide and show modals before and after their animations have played out
			this.hideAndShowModals();
		}
	},
	// Handle cover modals when they're toggled
	onToggle: function() {
		document.querySelectorAll( '.cover-modal' ).forEach( function( element ) {
			element.addEventListener( 'toggled', function( event ) {
				var modal = event.target,
					body = document.body;

				if ( modal.classList.contains( 'active' ) ) {
					body.classList.add( 'showing-modal' );
				} else {
					body.classList.remove( 'showing-modal' );
					body.classList.add( 'hiding-modal' );

					// Remove the hiding class after a delay, when animations have been run
					setTimeout( function() {
						body.classList.remove( 'hiding-modal' );
					}, 500 );
				}
			} );
		} );
	},	
	// Hide and show modals before and after their animations have played out
	hideAndShowModals: function() {
		var _doc = document,
			_win = window,
			modals = _doc.querySelectorAll( '.cover-modal' ),
			htmlStyle = _doc.documentElement.style,
			adminBar = _doc.querySelector( '#wpadminbar' );
		
		function htmlStyles() {
			return {
				'overflow-y':'scroll',
				position:'fixed',
				width:'100%',
				left:0
			};
		}			

		// Show the modal
		modals.forEach( function( modal ) {
			modal.addEventListener( 'toggle-target-before-inactive', function( event ) {
				var styles = htmlStyles();

				if ( event.target !== modal ) {
					return;
				}

				Object.keys( styles ).forEach( function( styleKey ) {
					htmlStyle.setProperty( styleKey, styles[ styleKey ] );
				} );

				modal.classList.add( 'show-modal' );
			} );

			// Hide the modal after a delay, so animations have time to play out
			modal.addEventListener( 'toggle-target-after-inactive', function( event ) {
				if ( event.target !== modal ) {
					return;
				}

				setTimeout( function() {

					modal.classList.remove( 'show-modal' );

					Object.keys( htmlStyles() ).forEach( function( styleKey ) {
						htmlStyle.removeProperty( styleKey );
					} );
				}, 500 );
			} );
		} );
	}
}

/*	-----------------------------------------------------------------------------------------------
	Toggles
--------------------------------------------------------------------------------------------------- */

twentytwenty.toggles = {
	init: function() {
		// Do the toggle
		this.toggle();
	},

	performToggle: function( element, instantly ) {
		var target, timeOutTime, classToToggle,
			self = this,
			_doc = document,
			// Get our targets
			toggle = element,
			targetString = toggle.dataset.toggleTarget,
			activeClass = 'active';

		target = _doc.querySelector( targetString );

		// Trigger events on the toggle targets before they are toggled
		if ( target.classList.contains( activeClass ) ) {
			target.dispatchEvent( twentytwenty.createEvent( 'toggle-target-before-active' ) );
		} else {
			target.dispatchEvent( twentytwenty.createEvent( 'toggle-target-before-inactive' ) );
		}

		// Get the class to toggle, if specified
		classToToggle = toggle.dataset.classToToggle ? toggle.dataset.classToToggle : activeClass;
		
		// For cover modals, set a short timeout duration so the class animations have time to play out
		timeOutTime = 0;

		if ( target.classList.contains( 'cover-modal' ) ) {
			timeOutTime = 10;
		}

		setTimeout( function() {
			var focusElement,
				subMenued = target.classList.contains( 'sub-menu' ),
				newTarget = subMenued ? toggle.closest( '.menu-item' ).querySelector( '.sub-menu' ) : target,
				duration = toggle.dataset.toggleDuration;

			// Toggle the target of the clicked toggle
			if ( toggle.dataset.toggleType === 'slidetoggle' && ! instantly && duration !== '0' ) {
				twentytwentyMenuToggle( newTarget, duration );
			} else {
				newTarget.classList.toggle( classToToggle );
			}

			// If the toggle target is 'next', only give the clicked toggle the active class
			if ( targetString === 'next' ) {
				toggle.classList.toggle( activeClass );
			} else if ( target.classList.contains( 'sub-menu' ) ) {
				toggle.classList.toggle( activeClass );
			} else {
				// If not, toggle all toggles with this toggle target
				_doc.querySelector( '*[data-toggle-target="' + targetString + '"]' ).classList.toggle( activeClass );
			}

			// Toggle aria-expanded on the toggle
			twentytwentyToggleAttribute( toggle, 'aria-expanded', 'true', 'false' );
			
			// Toggle body class
			if ( toggle.dataset.toggleBodyClass ) {
				_doc.body.classList.toggle( toggle.dataset.toggleBodyClass );
			}

			// Check whether to set focus
			if ( toggle.dataset.setFocus ) {
				focusElement = _doc.querySelector( toggle.dataset.setFocus );

				if ( focusElement ) {
					if ( target.classList.contains( activeClass ) ) {
						focusElement.focus();
					} else {
						focusElement.blur();
					}
				}
			}

			// Trigger the toggled event on the toggle target
			target.dispatchEvent( twentytwenty.createEvent( 'toggled' ) );

			// Trigger events on the toggle targets after they are toggled
			if ( target.classList.contains( activeClass ) ) {
				target.dispatchEvent( twentytwenty.createEvent( 'toggle-target-after-active' ) );
			} else {
				target.dispatchEvent( twentytwenty.createEvent( 'toggle-target-after-inactive' ) );
			}

		}, timeOutTime );
	},
	// Do the toggle
	toggle: function() {
		var self = this;

		document.querySelectorAll( '*[data-toggle-target]' ).forEach( function( element ) {
			element.addEventListener( 'click', function( event ) {
				event.preventDefault();
				self.performToggle( element );
			} );
		} );
	},
}

/**
 * Is the DOM ready
 *
 * this implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 * @param {Function} fn Callback function to run.
 */
function twentytwentyDomReady( fn ) {
	if ( typeof fn !== 'function' ) {
		return;
	}

	if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
		return fn();
	}

	document.addEventListener( 'DOMContentLoaded', fn, false );
}

twentytwentyDomReady( function() {
	twentytwenty.toggles.init();	// Handle toggles
	twentytwenty.coverModals.init();	// Handle cover modals
} );

/*	-----------------------------------------------------------------------------------------------
	Helper functions
--------------------------------------------------------------------------------------------------- */

/* Toggle an attribute ----------------------- */

function twentytwentyToggleAttribute( element, attribute, trueVal, falseVal ) {
	if ( trueVal === undefined ) {
		trueVal = true;
	}
	if ( falseVal === undefined ) {
		falseVal = false;
	}
	if ( element.getAttribute( attribute ) !== trueVal ) {
		element.setAttribute( attribute, trueVal );
	} else {
		element.setAttribute( attribute, falseVal );
	}
}
