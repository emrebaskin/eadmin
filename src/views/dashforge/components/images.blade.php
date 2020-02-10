<figure id="{{ $name }}-{{ $id }}" class="pos-relative mg-b-0 wd-md-15p wd-sm-30p wd-xs-45p ht-100 bd bd-gray-400 rounded-5 mr-1 ml-1 mt-0 mb-3">
    <input type="hidden" name="{{ $name }}[]" value="{{ $id }}">
    <img src="{{ $image }}" class="img-fit-cover rounded " alt="Responsive image">
    <figcaption class="pos-absolute t-0 r-0 pd-5 d-flex ">
        <div class="btn-group">
            <a href="#" onclick="deleteImage('{{ $id }}','{{ $name }}-{{ $id }}')" class="btn btn-sm btn-danger btn-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-trash-2">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </a>
        </div>
    </figcaption>
</figure>
