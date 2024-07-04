// $(document).ready(function() {
//     $('select[name="category_id"]').on('change',function(){
//         var category_id = $(this).val();
//         var url = $(this).data('url');

//         if(category_id){
//             $.ajax({
//                 url: url + "/" + category_id, // Concatenate url and category_id
//                 method: "GET",
//                 dataType: "json",
//                 success: function(data){
//                     $("#package_id").empty();
//                     $.each(data, function(key, value){
//                         $("#package_id").append('<option value="'+value.id+'">'+value.en_package_name+'</option>');
//                     });
//                 },
//             });
//         } else {
//             alert("Please select a Category");
//         }
//     });
// });

$(document).ready(function () {

    $('select[name="category_id"]').on('change', function () {

        var url = $(this).find(':selected').data('url');

        if (url) {

            $.ajax({

                url: url,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    $('#package_id').html(data);
                },
            });
        } else {
            alert("Please select a Category");
        }
    });
});

