/*! 
 * ************************************
 * Adding Buttons
 *
 * @windowManager:
 
		ed.windowManager.open( {
			title: 'Insert Uix Slides',
			body: [
				{
					type: 'textbox',
					name: 'uix_slides_value_1',
					label: 'Text Box',
					value: '30'
				},
				{
					type: 'textbox',
					name: 'uix_slides_value_2',
					label: 'Multiline Text Box',
					value: 'You can say a lot of stuff in here',
					multiline: true,
					minWidth: 300,
					minHeight: 100
				},
				{
					type: 'listbox',
					name: 'uix_slides_value_3',
					label: 'List Box',
					'values': [
						{text: 'Option 1', value: '1'},
						{text: 'Option 2', value: '2'},
						{text: 'Option 3', value: '3'}
					]
				},
				{
					type: 'checkbox',
					name: 'uix_slides_value_4',
					label: 'Executar automaticamente?',
					text: 'Sim',
					classes: 'checkclass'
				},
				
				{
					type: 'textbox',
					name: 'uix_slides_value_5',
					label: 'Image',
					id: 'uix_slides_value_5',
					value: ''
				},
					{
						type: 'button',
						name: 'uix_slides_value_imgBtn',
						text: 'Select Image',
						label: ' ',
						classes : 'upload_image_button',
						onclick: function() {
							window.mb = window.mb || {};
					
							window.mb.frame = wp.media({
								frame: 'post',
								state: 'insert',
								library : {
									type : 'image'
								},
								multiple: false
							});
					
							window.mb.frame.on('insert', function() {
								var json = window.mb.frame.state().get('selection').first().toJSON();
					
								jQuery( '#uix_slides_value_5' ).val( json.url );
								
								
								
							});
					
							window.mb.frame.open();
						}
					},
			 
					{
						type: 'colorpicker',
						name: 'uix_slides_value_6',
						label: 'Color',
						value: '#333333'
					},
						
		            {
						type   : 'combobox',
						name   : 'uix_slides_value_7',
						label  : 'combobox',
						values : [
							{ text: 'Test', value: 'test' },
							{ text: 'Test2', value: 'test2' }
						]
					},
					{
						type   : 'container',
						name   : 'uix_slides_value_8',
						label  : ' ',
						html   : '<i style=color:red>but needs some styling?</i>'
					},
				  	
												
				
				
			],
			onsubmit: function( e ) {
				ed.insertContent( '[random_shortcode textbox="' + e.data.uix_slides_value_1 + '" multiline="' + e.data.uix_slides_value_2 + '" listbox="' + e.data.uix_slides_value_3 + '" checkbox="'+ e.data.uix_slides_value_4 +'" image="' + e.data.uix_slides_value_5 + '" color="' + e.data.uix_slides_value_6 + '"]');
			}
		});
					
 
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

