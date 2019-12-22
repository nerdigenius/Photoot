$(function(){

    console.log('additional service loaded');
    $('input[type="checkbox"]').on('change', function(){
        var inputName;
        var adtnlArr = [];
        if (this.checked) {
            // Open optional Fields
            var parent = $(this).parent().parent();
            var optn = $(parent).find('.srv-detail');
            var child = optn.children();
            var checkId = $(this).attr('id');
            // Ceckbox is crop-image
            if( checkId == 'crop-image' ){
                var html = '<div class="col-sm-6"><input type="text" id="whinpx" name="whinpx" class="form-control input-xs desc-field" value="" placeholder="W x H in px" data-validetta="required"></div>';
                    html += '<div class="col-sm-6"><input type="text" id="resinpx" name="resinpx" class="form-control input-xs desc-field" value="" placeholder="Resolution" data-validetta="required,number"></div>';

                var searchPos = $(this).parent().parent();
                var pos = searchPos.find('.srv-detail');
                pos.append(html);
                // console.log(pos);
                // console.log(searchPos);
            }
            // Ceckbox is Shadow/Reflect
            if( checkId == 'shadrefl' ){
                var html = '<div class="col-sm-6"><select name="shadrefl-optn" id="shadrefl-optn" class="form-control desc-field" style="padding:0 12px;font-size:13px;">';
                    html += '<option value="original">Original</option><option value="drop-shadow">Drop shadow</option><option value="reflect">Reflect</option>';
                    html += '</select></div>';

                var searchPos = $(this).parent().parent();
                var pos = searchPos.find('.srv-detail');
                pos.append(html);
            }
            // Ceckbox is Background Change
            if( checkId == 'bkgndchange' ){
                var html = '<div class="col-sm-6"><select name="bkgndchange-optn" class="form-control desc-field" id="bkgndchange-optn" style="padding:0 12px;font-size:13px;">';
                    html += '<option value="white">White</option><option value="transparent">Transparent</option>';
                    html += '</select></div>';

                var searchPos = $(this).parent().parent();
                var pos = searchPos.find('.srv-detail');
                pos.append(html);
            }
            // Ceckbox is Output File Format
            if( checkId == 'opff' ){
                var html = '<div class="col-sm-6"><select class="form-control desc-field" name="opff-optn" id="opff-optn" style="padding:0 12px;font-size:13px;">';
                    html += '<option value="original">Original</option><option value="jpg">.jpg</option><option value="psd">.psd</option>';
                    html += '<option value="tiff">.tiff</option><option value="eps">.eps</option><option value="png">.png</option>';
                    html += '</select></div>';
                var searchPos = $(this).parent().parent();
                var pos = searchPos.find('.srv-detail');
                pos.append(html);
            }

        }else{
            var parent = $(this).parent().parent();
            var optn = $(parent).find('.srv-detail');
            optn.empty();
        }
        
    });

});
