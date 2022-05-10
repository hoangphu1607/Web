

window.onload = function () {
    $.ajax({
        url:getDataProduct, // var getDataProduct in file chart/product.blade.php
        success: function(data){

            var name = $(data.product).map(function() {
                return this.c_name;
            }).get(); 
            var dataset = $(data.product).map(function() {
                return this.soluong;
            }).get(); 
            var color = [];
            for (let index = 0; index < data.product.length; index++) {
                var o = Math.round, r = Math.random, s = 255;
                color[index] = 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 0.5 + ')';
            }
            var border = [];
            for (let index = 0; index < data.product.length; index++) {
                var o = Math.round, r = Math.random, s = 255;
                border[index] = 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 1 + ')';
            }
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',   
                data: {
                    labels:name,
                    datasets: [{
                        label: 'Số Lượng',
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
        },
        error: function(error){
            console.log(error);
        }
    });
}