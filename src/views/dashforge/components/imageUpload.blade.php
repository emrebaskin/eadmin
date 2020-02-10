<figure id="{{ $name }}" class="pos-relative mg-b-0 wd-md-15p wd-sm-30p wd-xs-45p ht-100 bd bd-gray-400 rounded-5 mr-1 ml-1 mt-0 mb-4" data-toggle="modal"
        data-target="#eFormUploadImageModal">
    <img src="/eadmin/img/upload-icon.png" class="img-fit-cover rounded" alt="Responsive image">
</figure>

<!-- Modal -->
<div class="modal fade" id="eFormUploadImageModal" tabindex="-1" role="dialog"
     aria-labelledby="eFormUploadImageModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Image Upload') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div id="eFormImageUploadProcessBar" class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                    <div class="row">
                        <div id="eFormImageUploadPreview" class="d-flex justify-content-center">

                        </div>
                        <div class="custom-file m-3">
                            <input data-field-name="{{ $name }}" type="file" class="custom-file-input" name="eFormImageUpload" id="eFormImageUpload">
                            <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
