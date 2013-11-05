var seoPro = function(config) {
    config = config || {};
    seoPro.superclass.constructor.call(this,config);
};
Ext.extend(seoPro,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
    ,initialize: function(){
    	seoPro.config.loaded = true;
        seoPro.addKeywords();
        seoPro.addPanel();

        if(MODx.config.seopro_help == 1){
            var helpButton = new Ext.Button({
                text: _('seopro.tips')
                ,cls: 'x-btn-seopro'
                // ,iconCls: 'seopro-tips'
                ,handler: function(btn, e){
                    seoPro.showTips(btn, e);
                }
            })
            Ext.getCmp('modx-action-buttons').add(helpButton);
            Ext.getCmp('modx-action-buttons').doLayout();
        }

        Ext.each(seoPro.config.fields.split(','), function(field) {
            seoPro.addCounter(field);
            if(field != 'alias'){
                seoPro.changePrevBox(field);
            }
        });
        Ext.getCmp('modx-panel-resource').on('success', function() {
            Ext.get('seopro-replace-alias').dom.innerHTML = this.record.alias;
        });
    }
    ,addCounter: function(field, chars){
    	var Field = Ext.getCmp('modx-resource-'+field);
        seoPro.config.values[field] = Field.getValue();
    	Field.on('keyup', function() {
            seoPro.config.values[field] = Field.getValue();
            seoPro.count(field)
            seoPro.changePrevBox(field)
		});
        Ext.get('x-form-el-modx-resource-' + field).createChild({
            tag: 'div'
            ,id: 'seopro-resource-'+field
            ,class: 'seopro-counter'
            ,html: '<span class="seopro-counter-wrap seopro-counter-keywords" id="seopro-counter-keywords-' + field + '" title="'+_('seopro.keywords')+'"><strong>'+_('seopro.keywords')+'</strong></span>\
                    <span class="seopro-counter-wrap seopro-counter-chars" id="seopro-counter-chars-' + field + '" title="'+_('seopro.characters.allowed')+'"><strong>'+_('seopro.characters')+': </strong><span class="current" id="seopro-counter-chars-' + field + '-current">1</span>/<span class="allowed" id="seopro-counter-chars-' + field + '-allowed">'+seoPro.config.chars[field]+'</span></span>'
        });
        seoPro.count(field);
    }
    ,addKeywords: function(){
        var fp = Ext.getCmp('modx-resource-main-left');
        var field = new Ext.form.TextField({
            xtype: 'textfield'
            ,name: 'keywords'
            ,id: 'seopro-keywords'
            ,fieldLabel: _('seopro.focuskeywords')
            ,value: seoPro.config.record
            ,enableKeyEvents: true
            ,anchor: '100%'
            ,listeners: { 'keyup': function(){
                MODx.fireResourceFormChange();
                Ext.each(seoPro.config.fields.split(','), function(field) {
                    seoPro.count(field);
                });
            }}
        });
        var fieldDesc = new Ext.form.Label({
            forId: 'pagetitle'
            ,text: _('seopro.focuskeywords_desc')
            ,cls: 'desc-under'
        });
        fp.add(field);
        fp.add(fieldDesc);
        fp.doLayout();
    }
    ,addPanel: function(){
    	var fp = Ext.getCmp('modx-resource-main-left');
        fp.add({
            xtype : 'panel'
            ,anchor: '100%'
            ,border:false
            ,fieldLabel: _('seopro.prevbox')
            ,layout: 'form'
            ,items: [{
                columnWidth: .67
                ,xtype: 'panel'
                ,baseCls: 'seopro-panel'
                ,bodyStyle: 'padding: 10px;'
                ,border: false
                ,autoHeight: true
                ,items: [{
                    xtype: 'box',
                    id: 'seopro-google-title',
                    //height: 20,
                    //boxMaxHeight:40,
                    bodyStyle:'background-color: #fbfbfb; ',
                    html: '',
                    border: false
                },{
                    xtype: 'box',
                    id: 'seopro-google-url',
                    //height: 20,
                    //boxMaxHeight: 30,
                    bodyStyle:'background-color: #fbfbfb; ',
                    html: seoPro.config.url,
                    border: false
                },{
                    xtype: 'box',
                    id: 'seopro-google-description',
                    //height: 50,
                    //boxMaxHeight: 50,
                    bodyStyle:'background-color: #fbfbfb; ',
                    html: '',
                    border: false
                }]
            }/*,{
                columnWidth: .33
                ,xtype: 'panel'
                ,id: 'seopro-google-logo'
                ,border: false
                ,html: '<img src="'+seoPro.config.assetsUrl+'img/google-logo.jpg" />'
            }*/]
        });
		fp.doLayout();

    }
    ,count: function(field){
        var Value = Ext.get('modx-resource-' + field).getValue();
        //var maxkeywords = Ext.get('seopro-counter-keywords-' + field + '-allowed').dom.innerHTML;
        var maxchars = Ext.get('seopro-counter-chars-' + field + '-allowed').dom.innerHTML;
        var charCount = Value.length;
        if(field == 'pagetitle' || field == 'longtitle'){
            var extra = ' | '+MODx.config.site_name;
            charCount = charCount+extra.length;
        }
        var keywordCount = 0;
        Ext.each(Ext.get('seopro-keywords').getValue().split(','), function(keyword) {
            keyword = keyword.replace(/^\s+/, '').toLowerCase();
            if(keyword){
                var counter = Value.toLowerCase().match(new RegExp('\\b'+keyword+'\\b','g'));
                if(counter){
                    keywordCount = keywordCount+counter.length;
                }
            }
        });
        //Ext.get('seopro-counter-keywords-' + field + '-current').dom.innerHTML = keywordCount;
        Ext.get('seopro-counter-chars-' + field + '-current').dom.innerHTML = charCount;

        if(keywordCount > 0 && keywordCount < 5){
            Ext.get('seopro-counter-keywords-' + field).removeClass('red').addClass('green');
        }else{
            Ext.get('seopro-counter-keywords-' + field).removeClass('green').addClass('red');
        }

        if(charCount > maxchars || charCount == 0){
            Ext.get('seopro-counter-chars-' + field).removeClass('green').addClass('red');
        }else{
            Ext.get('seopro-counter-chars-' + field).removeClass('red').addClass('green');
        }
    }
    ,changePrevBox: function(field){
        switch (field) {
            case 'pagetitle':
            case 'longtitle':
                if(seoPro.config.values['longtitle'] == '' || seoPro.config.values['longtitle'] === 'undefined'){
                    var title = seoPro.config.values['pagetitle'];
                }else{
                    var title = seoPro.config.values['longtitle'];
                }
                Ext.get('seopro-google-title').dom.innerHTML = title+' | '+MODx.config.site_name;
            break;
            case 'description':
            case 'introtext':
                if(seoPro.config.values['description'] == '' || seoPro.config.values['description'] === 'undefined'){
                    var description = 'Vul uw META description.';
                }else{
                    var description = seoPro.config.values['description'];
                }
                Ext.get('seopro-google-description').dom.innerHTML = description;
            break;
            case 'alias':
                Ext.get('seopro-replace-alias').dom.innerHTML = seoPro.config.values['alias'];
            break;
        }

    }
    ,showTips: function(btn,e){
        //Ext.Msg.minWidth = 480;
        //Ext.Msg.alert(_('seopro.tips'), _('seopro.tips.content'));
        new Ext.Window({
            title : "iframe",
            modal: true,
            width : 600,
            height: 500,
            //layout : 'fit',
            items : [{
                xtype : "component",
                width: 594,
                height: 449,
                autoEl : {
                    tag : "iframe",
                    src : MODx.config.seopro_helpurl,
                    width: 594,
                    height: 449,
                }
            }]
        }).show();
    }

});
Ext.reg('seopro',seoPro);

seoPro = new seoPro();


