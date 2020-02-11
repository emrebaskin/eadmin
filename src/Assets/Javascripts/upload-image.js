var Upload = function (file,name) {
    this.file = file;
    this.name = name;
    this.progress_bar_id = "#eFormImageUploadProcessBar";
    this.preview_id = "#eFormImageUploadPreview";
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {

    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("eFormImageUpload", this.file, this.getName());
    formData.append("eFormFieldName", this.name);

    $.ajax({
        type: "POST",
        url: "/admin/image/upload",
        xhr: function () {

            $(that.progress_bar_id).show();
            $(that.progress_bar_id + " .progress-bar").addClass("progress-bar-animated");

            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
            $(that.progress_bar_id + " .progress-bar").removeClass("progress-bar-animated");
            $(that.progress_bar_id).hide();
            $('#'+that.name).before(data.viewImage);
        },
        error: function (error) {
            $(that.progress_bar_id + " .progress-bar").removeClass("progress-bar-animated");
            $(that.progress_bar_id).hide();
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#eFormImageUploadProcessBar";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    $(progress_bar_id + " .progress-bar").css("width", +percent + "%").attr("aria-valuenow",percent);
};

//Change id to your id
$("#eFormImageUpload").on("change", function (e) {


    var file = $(this)[0].files[0];
    var name = $(this).data('field-name');
    var upload = new Upload(file,name);

    // maby check size or type here with upload.getSize() and upload.getType()

    // execute upload
    upload.doUpload();
});


function deleteImage(id,figureId) {
    $.ajax({
        type: "POST",
        url: "/admin/image/delete/"+id,
        success: function (data) {
            $('#'+figureId).remove();
        },
        error: function (error) {
            console.log('error',error)
        },
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
}
