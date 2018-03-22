(function() {
    tinymce.create('tinymce.plugins.vimeo', {
        init : function(ed, url) {
            ed.addButton('vimeo', {
                title : 'Add Vimeo',
                image : url + '/images/logo-vimeo.svg',
                onclick : function() {
                    ed.focus();
                    ed.selection.setContent('[vimeo]PASTE_URL_HERE[/vimeo]<br/>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);
})();
