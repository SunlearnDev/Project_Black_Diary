var $this = $('#city_id');
$('#city_id').on('change', function(){
  var city_id = $(this).val();
    if(city_id){
        $.ajax({
            url:'/get_district', // url lấy dữ liệu
            method:'POST',
            data:{
                _token: $('input[name="_token"]').val(),
                city_id: city_id
            },
            success: function (data){
                var districtSelect  = $('#district_id');

                districtSelect .empty();
                if(data.length > 0){
                    districtSelect.append('<option value="" disabled selected hidden>Quận/Huyện</option>');
                    $.each(data, function (index, district){
                        districtSelect.append('<option value="' + district.id + '">' + district.name + '</option>');
                    })
                }
            },
            error: function() {
                // Xử lý lỗi (nếu có)
                console.log('Lỗi khi tải dữ liệu quận/huyện');
            }
        });
    }
});