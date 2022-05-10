function addImages(id) {
    $.ajax({
        url:urlStoreImages,
        method:"POST", 
        data:{
            'id':id,
            _token:_token,
        },
        success: function (data) {
           console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    })
}