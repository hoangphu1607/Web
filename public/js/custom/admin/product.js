// $('#proImages').on('submit',function (e) {
//     e.preventDefault();
//     console.log('hi');
// })

function addImages(id) {
    var html = '<input type="hidden" name="pro_id" required value='+id+'></input>';
    $('#hidden').html(html);
    console.log(id);
}