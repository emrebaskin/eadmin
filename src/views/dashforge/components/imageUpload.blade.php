<figure class="pos-relative mg-b-0 wd-md-15p ht-100 bd bd-gray-400 rounded-5 mr-1 ml-1 mt-2 mb-4" data-toggle="modal"
        data-target="#eFormUploadImageModal">
    <img src="/eadmin/img/upload-icon.png" class="img-fit-cover rounded" alt="Responsive image">
</figure>


<!-- Modal -->
<div class="modal fade" id="eFormUploadImageModal" tabindex="-1" role="dialog"
     aria-labelledby="eFormUploadImageModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="custom-file m-3">
                            <input type="file" class="custom-file-input" name="eFormImageUpload" id="eFormImageUpload">
                            <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-dark" id="upload">{{ __('Upload') }}</button>
            </div>
        </div>
    </div>
</div>
