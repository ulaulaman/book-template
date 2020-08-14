/**
 * TinyMCE buttons for custom shortcodes
 */
( function() {
	tinymce.create( 'tinymce.plugins.Bookdata', {
		init: function( ed, url ) {
			ed.addButton( 'bookdata', {
				title: 'Bookdata',
				/** image: url + '/img/tinymce-sample.png', */
				onclick: function() {
					title = prompt( "Enter title", "" );
					ed.execCommand( 'mceInsertContent', false, '[bookdata title="' + title + '"]' );
				}
			});
		},
		createControl: function( n, cm ) { return null; },
	});
	tinymce.PluginManager.add( 'bookdata', tinymce.plugins.PilauSample );
})();