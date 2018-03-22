(function() {
    tinymce.create('tinymce.plugins.pbsvid', {
        init : function(ed, url) {
            ed.addButton('pbsvid', {
                title : 'Add PBS Video',
                image : url + '/images/logo-pbs.svg',
                onclick : function() {
                    ed.focus();
                    ed.selection.setContent('[pbsvid]Paste the video ID here (e.g. 3010057273)[/pbsvid]');  
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('pbsvid', tinymce.plugins.pbsvid);
})();
