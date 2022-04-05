$(document).ready(function() {
  $('#categoriesAdd_form').on('submit', function(e){
      // toastr["success"]("Thêm Thành Công", "Thông Báo")     
      e.preventDefault();                    
      let actionUrl = $(this).attr('action');
      let categories_name = $(this).find('input[name="categories_name"]').val();
      let image = $(this).find('input[name="image"]').val();
      let _token = $(this).find('input[name="_token"]').val();
      // console.log(categories_name);
      // $.ajaxSetup({
      //     headers: {
      //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });
      $('.error').text('');
      $.ajax({
          url: 'addCategories',
          method: 'POST', 
          data: new FormData(this),
          // dataType: 'json',                
          cache: false,
          contentType: false,
          processData: false,                
          success:function(response){                   
              toastr["success"]("Thêm "+ categories_name+ " thành công!!!", "Thông Báo")  ;                  
          },
          error:function(error){              
              let tb = error.responseJSON.errors;
              for(var i in tb){
                  $('.error_' + i).text(tb[i][0]);
              }
          },
                      
      });
      // alert(categoriesAvatar);
  });
})