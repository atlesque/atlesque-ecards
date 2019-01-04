(function() {
	tinymce.PluginManager.add('odudecard_mce_button', function( editor, url ) {
		editor.addButton( 'odudecard_mce_button', {
			text: '',
			title : "ODude Card",
			icon: true,
			image: url+'/odude.png',
			type: 'menubutton',
			
					menu: [
						{
							text: 'List Ecard',
							onclick: function() {
								editor.windowManager.open( {
									title: 'List Ecard Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'ptype',
											label: 'Ecard Album slug name',
											value: ''
										},
										
										{
											type: 'listbox',
											name: 'perrow',
											label: 'Display Per Row',
											'values': [
												{text: '1 Ecard', value: '1'},
												{text: '2 Ecards', value: '2'},
												{text: '3 Ecards', value: '3'},
												{text: '4 Ecards', value: '4'},
												{text: '5 Ecards', value: '5'}
											]
										},
										{
											type: 'textbox',
											name: 'perpage',
											label: 'Ecards Per Page',
											value: '30'
										},
										{
											type: 'listbox',
											name: 'orderby',
											label: 'Sort ecard as',
											'values': [
												{text: 'Order by date', value: 'date'},
												{text: 'Order by title', value: 'title'},
												{text: 'Order by last modified date', value: 'modified'},
												{text: 'Ramdom Order', value: 'rand'},
												{text: 'Order by post id', value: 'ID'}
											]
										},
										{
											type: 'listbox',
											name: 'page',
											label: 'WP-Pagenavi Page Navigation',
											'values': [
												{text: 'Hide Navigation', value: 'off'},
												{text: 'Show Navigation', value: 'on'}
												
											]
										},
										{
											type: 'listbox',
											name: 'layout',
											label: 'Set Layout',
											'values': [
												{text: 'List', value: 'list'}
												
												
											]
										}
									],
									onsubmit: function( e ) 
									{
										var return_text='[odudecard-list perrow="' + e.data.perrow + '" perpage="' + e.data.perpage + '"  orderby="' + e.data.orderby + '" page="' + e.data.page + '" layout="' + e.data.layout + '" album="' + e.data.ptype + '"]';
										
										if (e.data.ptype == null || e.data.ptype == '')
										return_text='[odudecard-list perrow="' + e.data.perrow + '" perpage="' + e.data.perpage + '" orderby="' + e.data.orderby + '" page="' + e.data.page + '" layout="' + e.data.layout + '" ]';
										
										editor.insertContent( return_text);
									}
								});
							}
						}
						
					]
				
			
		});
	});
})();