

window.onload = function () {
    $.ajax({
        url:getDataProduct, // var getDataProduct in file chart/product.blade.php
        success: function(data){
            // console.log(data.order);
            var product = data.product;
            var length = data.product.length;
            var datacol = $(product).map(function() {return this.c_name;}).get(); 
            var dataset = $(product).map(function() {return this.soluong;}).get(); 
            renderChar(datacol,dataset,length,'Loại Sản Phẩm','Cate');
            var order = data.order; 
            var length = data.order.length;
            var datacol = $(order).map(function() {return this.pro_name;}).get(); 
            var dataset = $(order).map(function() {return this.soluong;}).get(); 
            renderChar(datacol,dataset,length,'Bán Trong Tháng','Product-Sold-Month');
            
        },
        error: function(error){
            console.log(error);
        }
    });
}

function renderChar(datacol,dataset,length,label,idChart) {
    var color = [];
    for (let index = 0; index < length; index++) {
        var o = Math.round, r = Math.random, s = 255;
        color[index] = 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 0.5 + ')';
    }
    var border = [];
    for (let index = 0; index < length; index++) {
        var o = Math.round, r = Math.random, s = 255;
        border[index] = 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 1 + ')';
    }
    const ctx = document.getElementById(idChart).getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',   
        data: {
            labels:datacol,
            datasets: [{
                label: label,
                data: dataset,
                backgroundColor: color,
                borderColor: border,
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });        
}