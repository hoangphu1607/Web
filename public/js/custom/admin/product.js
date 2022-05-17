// $('#proImages').on('submit',function (e) {
//     e.preventDefault();
//     console.log('hi');
// })

function addImages(id) {
    $('#files').val('');
    var html = '<input type="hidden" name="pro_id" required value='+id+'></input>';
    $('#hidden').html(html);
    id_Product = id;
    $('.d-flex').remove();
        $.ajax({
        url:ListImgProduct,
        data:{
            pro_id:id
        },
        success: function(data){
            console.log(data);
            $('#conten_img').append(data.data);
        },
        error:function(error){
            console.log(error);
        }
    })
}

function delImgDetail(str) {
    console.log(str);
}