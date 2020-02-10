var Upload = function (file) {
    this.file = file;

    console.log(file)
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
Upload.prototype.getName = function() {
    return $(this).data('field-name');
};


Upload.prototype.doUpload = function () {

    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("eFormImageUpload", this.file, this.getName());

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
            $(that.preview_id).html(data.viewImage);
        },
        error: function (error) {
            console.log("error",error);
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
    var upload = new Upload(file);

    // maby check size or type here with upload.getSize() and upload.getType()

    // execute upload
    upload.doUpload();
});
