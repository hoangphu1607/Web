<!-- Modal -->
<div class="modal top fade" id="multiphotosproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Danh sách ảnh chi tiết của sản phẩm</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section>
                    <div class="card">
                        <div class="card-header">
                            Kéo và thả hình ảnh vào đây
                        </div>
                        <div class="card-body">
                            <form action="{{route('productimages')}}" method="post" enctype="multipart/form-data" class="dropzone dz-clickable"
                                id="image-upload">
                                @csrf
                                <div>
                                    <h3 class="text-center">
                                        Upload Image By Click On Box
                                    </h3>
                                </div>
                        </div>
                        </form>
                    </div>                   
            </section>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
</div>
