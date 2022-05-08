function confirOrder(id_bill,id_user) {
    // e.preventDefault();

    $.ajax({
        url:urlOrderConfirm,
        method:'post',
        data:{
            id_bill : id_bill,
            id_user: id_user,
            _token: _token            
        },
        success: function(data){
            console.log(data);
            toastr["success"]("Xác Nhận Đặt Hàng!!!", "Thông Báo");   
            const myTimeout = setTimeout(backHome,2000);
            
        },
        error: function(error){
            console.log(error);
        }
    })
}

function backHome() {
    window.location = home
}