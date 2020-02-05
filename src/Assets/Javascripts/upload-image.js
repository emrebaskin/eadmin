// var Upload = function (file) {
//     this.file = file;
// };
//
// Upload.prototype.getType = function() {
//     return this.file.type;
// };
// Upload.prototype.getSize = function() {
//     return this.file.size;
// };
// Upload.prototype.getName = function() {
//     return this.file.name;
// };
// Upload.prototype.doUpload = function () {
//     var that = this;
//     var formData = new FormData();
//
//     // add assoc key values, this will be posts values
//     formData.append("eFormImageUpload", this.file, this.getName());
//
//     $.ajax({
//         type: "POST",
//         url: "/admin/image/upload",
//         xhr: function () {
//             var myXhr = $.ajaxSettings.xhr();
//             if (myXhr.upload) {
//                 myXhr.upload.addEventListener('progress', that.progressHandling, false);
//             }
//             return myXhr;
//         },
//         success: function (data) {
//             // your callback here
//         },
//         error: function (error) {
//             // handle error
//         },
//         async: true,
//         data: formData,
//         cache: false,
//         contentType: false,
//         processData: false,
//         timeout: 60000
//     });
// };
//
// Upload.prototype.progressHandling = function (event) {
//     var percent = 0;
//     var position = event.loaded || event.position;
//     var total = event.total;
//     var progress_bar_id = "#progress-wrp";
//     if (event.lengthComputable) {
//         percent = Math.ceil(position / total * 100);
//     }
//     // update progressbars classes so it fits your code
//     $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
//     $(progress_bar_id + " .status").text(percent + "%");
// };
//
// //Change id to your id
// $("#eFormImageUpload").on("change", function (e) {
//     var file = $(this)[0].files[0];
//     var upload = new Upload(file);
//
//     // maby check size or type here with upload.getSize() and upload.getType()
//
//     // execute upload
//     upload.doUpload();
// });

$(document).ready(function (e) {
    $("#eFormImageUpload").on('submit', (function (e) {
        e.preventDefault();
        // $("#message").empty();
        // $('#loading').show();
        $.ajax({
            url: "ajax_php_file.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                // $('#loading').hide();
                // $("#message").html(data);
            }
        });
        return false;
    }));
});
