# PDP_web_attendance

Quy tắc code
• Chữ cái đầu viết thường các chữ phía sao viết hoa và tên biến cần có ý nghĩa
• Mỗi chức năng đều phải comment.
• Chia file hiển thị và file xử lí riêng biệt.
• Cố gắng viết chức năng bằng cách tách hàm.
• Tên file bắt đầu bằng chữ thường các chữ còn lại viết hoa
• Name , id của các ô input đặt tên giống tên cột trong cơ sở dữ liệu
• Các nut button cách đặt tên theo “btn_action” với action là các chức năng như add, update, delete
Cấu trúc thư mục
index.php // điều hướng cho các Controller liên quan đến user
admin.php // điều hướng cho các Controller liên quan đến admin
• Model:
o getdata.php //nhận dữ liệu từ thiết bị
o connectDB.php // kết nối Database
• Controller: Chứ các file code xử lý
• Assets
o css, img, js,...
• Layout:
o header, footer
• Libs:
o chứa các thư viện và file index.php chứa các hàm tự định nghĩa
• View
o chứa giao diện
o các giao diện dùng chung sẽ đặt bên ngoài ex: changePassword.php
