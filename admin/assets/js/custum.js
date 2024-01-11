$(document).ready(function () {
  
    $('.delete_task_btn').click(function (e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'task_id':id,
                    'delete_task_btn': true
                },
                success: function(response){
                    if (response == 200) {
                        window.location.reload();
                        swal("Success", "task Deleted Successfully", "success");
                    }else if(response == 500){
                        window.location.reload();
                        swal("Error", "Something Went Wrong", "error");
                    }
                }
              })
            }
          });
    });

    $('.delete_user_btn').click(function (e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'user_id':id,
                    'delete_user_btn': true
                },
                success: function(response){
                    if (response == 200) {
                        window.location.reload();
                        swal("Success", "user Deleted Successfully", "success");   
                    }else if(response == 500){
                        window.location.reload();
                        swal("Error", "Something Went Wrong", "error");
                    }
                }
              })
            }
          });
    });

    $('.delete_order_btn').click(function (e){
      e.preventDefault();
      var id = $(this).val();
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              method: "POST",
              url: "code.php",
              data: {
                  'id':id,
                  'delete_order_btn': true
              },
              success: function(response){
                  if (response == 200) {
                      window.location.reload();
                      swal("Success", "order Deleted Successfully", "success");   
                  }else if(response == 500){
                      window.location.reload();
                      swal("Error", "Something Went Wrong", "error");
                  }
              }
            })
          }
        });
    });

});