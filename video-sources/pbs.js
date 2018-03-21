(function() {
    tinymce.create('tinymce.plugins.pbsVid', {
        init : function(ed, url) {
            ed.addButton('pbsVid', {
                title : 'Add PBS Video',
                image : url + '/images/pbsVid.svg',
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
    tinymce.PluginManager.add('pbsVid', tinymce.plugins.pbsVid);
})();
