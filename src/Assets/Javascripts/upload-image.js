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

$('#upload').click(function () {

    var data = new FormData($('#file')[0].files[0]);

    $.ajax({
        url: '@Url.Action("Upload", "Home")',
        type: 'POST',
        data: data,
        cache: false,
        contentType: false,
        processData: false
    });
});
