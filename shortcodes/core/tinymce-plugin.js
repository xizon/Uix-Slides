/*! 
 * ************************************
 * Adding Buttons
 *
 *************************************
 */	

var custom_uploader;

 (function() {
    tinymce.create('tinymce.plugins.uix_slides', {
		
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
			
           
				
			ed.addButton( 'uix_slides_btn', {
				text: '',
				title: 'Uix Slides',
				image 	: url + '/icon.png',
				onclick: function() {
					ed.windowManager.open( {
						title: 'Insert Uix Slides',
						body: [
							{
								type: 'textbox',
								name: 'uix_slides_show',
								label: 'Show at most (Show all items if value is "-1")',
								value: '-1'
							},
							
						],
						onsubmit: function( e ) {
							ed.insertContent( '[uix_slides_output show="' + e.data.uix_slides_show + '"]');
						}
					});
				}

			});
				
     
			
			
			
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        }


    });
	
    // Register plugin
    tinymce.PluginManager.add( 'uix_slides', tinymce.plugins.uix_slides );
	
	
})();

