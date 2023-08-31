# Project_Black_Diary
#Lỗi ngày 31-8-2023:
  * Lỗi 1: 
  - cập nhật dữ liệu mySql bằng PHP lỗi sử dụng bộ mã hóa latin1_swedish_ci sau khi chèn dữ liệu vào phông chữ bị lỗi đã sữ dụng mysqli_set_charset($conn, "latin1");
  - xử lý lỗi thay đổi sang utf8mb4_unicode_ci sau đó mysqli_set_charset($conn, "utf8mb4") nhập dữ liệu thành công.
  * Lỗi 2: 
    - Error :sử dụng cùng một ID #open-setting cho nhiều phần tử trong danh sách bài viết, dẫn đến việc JavaScript chỉ hoạt động cho phần tử đầu tiên có ID tương ứng và bỏ qua các phần tử khác
    - Handle: đổi sang dùng class, sử dụng các phương thức như .closest() và .find() để tìm phần tử cụ thể muốn thao tác
