<!-- Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="modal fade" id="multiphotosproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh phụ cho sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updateProduct')}}" name="contact" method="POST" 
        data-netlify="true" enctype="multipart/form-data" id="productUpdate_form">
        <div class="modal-body">
          {{-- Form cập nhật  --}}          
            @csrf
            {{-- Name --}}
            <div class="form-group">
                <section> 
                    <div class="container" >
                        <div class="row" style="margin: auto">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header">
                                        Dropzone File Upload
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                                            @csrf
                                            <div>
                                                <h3 class="text-center"> Upload Image By Click On Box </h3>                                       
                                            </div>
                                            <div class="dz-default dz-message">Drop files here to upload</dz-message>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Close</button>
          <button type="submit" class="btn btn-primary" id="Update">Send message</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>