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
                <form action="{{route('productimages')}}" data-netlify="true" enctype="multipart/form-data" id="proImages" method="POST">
                    @csrf
                    <div id="hidden"></div>
                    <label for="files">Chọn hình</label>
                    <input type="file" id="files" name="files[]" multiple><br><br>    
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                </form>   
          </div>
          
        </div>
        <div class="modal-footer">
            
            {{-- <button type="submit" class="btn btn-primary" >Save changes</button> --}}
        
        </div>
    </div>
</div>
</div>
