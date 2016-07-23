function deleteContainer(o,id) {
    $obj = $(o);
    console.log($obj);
    var server = $obj.attr('multiimage-delete-server') || $obj.prop('multiimage-delete-server');
    var fd = new FormData();
    fd.append('data[id]', id);
    $('div[containerId=' + id + ']').remove();
    $.ajax({
        url: server, //Server script to process data
        type: 'POST',
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function(data) {
            console.log(data.success.toString());
            // show preview
            if (typeof data.success != 'undefined' && data.success.toString() == 'true') {
                $('div[containerId=' + id + ']').remove();
                $.growl.notice({
                    message: 'Image removed correctly.',
                    'title': 'Congrats'
                });
            }else{
                $.growl.notice({
                    message: 'Image didn\'t remove correctly.',
                    'title': 'Error'
                });
            }
        },
        error: function() {
            $.growl.notice({
                message: 'Image didn\'t remove correctly.',
                'title': 'Error'
            });
        },
        data: fd,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
}
$(function() {
    $('input[with-previews]').change(function() {
        var fileObj = this;
        var me = $(this);
        var valid_types = {
            'image/jpeg': true,
            'image/jpg': true,
            'image/png': true,
        };
        var fd = new Array();
        var previewObject = me.attr('multiupload-preview-object');
        var _modelId = me.attr('multiupload-model-id');
        var server = me.attr('multiupload-server');
        var deleteServer = me.attr('multiupload-delete-server') ||me.prop('multiupload-delete-server');
        for (var i = 0; i < fileObj.files.length; i++) {
            if (valid_types[fileObj.files[i].type]) {
                fd[i] = new FormData();
                fd[i].append('data[id]', _modelId);
                fd[i].append('data[file]', fileObj.files[i]);
                console.log('#' + i, fileObj.files[i])
                var reader = new FileReader();
                reader.readAsDataURL(fileObj.files[i]);
                reader.onload = (function(i) {
                    return function(e) {
                        console.log('i=' + i)
                        $.ajax({
                            url: server, //Server script to process data
                            type: 'POST',
                            xhr: function() { // Custom XMLHttpRequest
                                var myXhr = $.ajaxSettings.xhr();
                                return myXhr;
                            },
                            //Ajax events
                            success: function(data) {
                                console.log(data);
                                // show preview
                                if (data.success == 'true') {
                                    newObject = "<div class='col-xs-4 col-md-3 image-obj' containerId='" + data.id + "'>";
                                    newObject += "<div class='deleteContainer' multiimage-delete-server='"+deleteServer+"' onclick='deleteContainer(this," + data.id + ")'>x</div>";
                                    newObject += "<div class='image-space'><img class='maxheight100' src='" + e.target.result + "'>";
                                    newObject += "</img>";
                                    newObject += "</div>";
                                    newObject += "</div>";
                                    $(previewObject).append(newObject);
                                    $.growl.notice({
                                        message: 'Image uploaded correctly.',
                                        'title': 'Congrats'
                                    });
                                }
                            },
                            error: function() {
                                $.growl.notice({
                                    message: 'Image didn\'t upload correctly.',
                                    'title': 'Error'
                                });
                            },
                            // Form data
                            data: fd[i],
                            //Options to tell jQuery not to process data or worry about content-type.
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                })(i)
            } else {
                alert('Support only .jpg, .png, .jpeg');
            }
        }
    });
})