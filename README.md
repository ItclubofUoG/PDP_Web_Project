<h1 align="center">Welcome to PDP_web_attendance  👋</h1>

## ✔ Quy tắc code
<ul>
  <li>Chữ cái đầu viết thường các chữ phía sao viết hoa và tên biến cần có ý nghĩa</li>
  <li>Mỗi chức năng đều phải comment.</li>
  <li>Chia file hiển thị và file xử lí riêng biệt.</li>
  <li>Cố gắng viết chức năng bằng cách tách hàm.</li>
  <li>Tên file bắt đầu bằng chữ thường các chữ còn lại viết hoa</li>
  <li>Name , id của các ô input đặt tên giống tên cột trong cơ sở dữ liệu</li>
  <li>Các nut button cách đặt tên theo “btn_action” với action là các chức năng như add, update, delete</li>
</ul>
      
## 📁 Cấu trúc thư mục

<ul>
  <li>index.php // điều hướng cho các Controller liên quan đến user</li>
  <li>admin.php // điều hướng cho các Controller liên quan đến admin</li>
</ul>
<ul>
    <li>Model:
        <ul>
            <li>getdata.php //nhận dữ liệu từ thiết bị</li>
            <li>connectDB.php // kết nối Database</li>
        </ul>
    </li>
</ul>
<ul>
    <li>Controller: Chứa các file code xử lý</li>
</ul>

<ul>
  <li>Assets:css, img, js,...</li>
</ul>
<ul>
  <li>Layout: header, footer</li>
</ul>
<ul>
  <li>Libs: chứa các thư viện và file index.php chứa các hàm tự định nghĩa</li>
</ul>
<ul>
    <li>View:
        <ul>
            <li>chứa giao diện</li>
            <li>các giao diện dùng chung sẽ đặt bên ngoài ex: changePassword.php</li>
        </ul>
    </li>
</ul>
