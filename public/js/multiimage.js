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
                                if (data) {
                                    newObject = "<div class='col-xs-4 col-md-3 image-obj' containerId='" + data + "'>";
                                    newObject += "<div class='deleteContainer' onclick='deleteContainer(" + data + ")'>x</div>";
                                    newObject += "<img class='img-responsive' src='" + e.target.result + "'>";
                                    newObject += "</img>";
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