(function() {
    tinymce.create('tinymce.plugins.youtube', {
        init : function(ed, url) {
            ed.addButton('youtube', {
                title : 'Add Youtube',
                image : url + '/images/logo-youtube.svg',
                onclick : function() {
                    ed.focus();
                    ed.selection.setContent('[youtube]PASTE_URL_HERE[/youtube]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);
})();
