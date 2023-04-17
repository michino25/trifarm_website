truy cập vào link => dẫn đến index.php => dẫn đến controler, gọi hàm invoke xử lý link 
    => khai thác database tương ứng và dẫn đến view

ở tầng model có: 
OOP và một model chung để query dữ liệu
trong model chung gọi đến db_module để query như bình thường
config hỗ trợ lưu trữ tên database cho db_module

ở tầng view có: 
basepage.php
header
    |_files
    |_...
footer
    |_files
    |_...
main
    |_search
        |_files
        |_...
    |_home
        |_files
        |_...
    |_detail
        |_files
        |_...
    
folder chỉ chứa file php, các file khác lưu trữ trong thư mục assets

bảng user đăng nhập: làm sau

đổi đường dẫn chính (đổi cổng xampp) controlers/controler.php 
    public $index = 'http://localhost/trifarm-anpha-version';


database add
https://docs.google.com/spreadsheets/d/1hXD336KKycFJdMWwEnL7JpLiyxYaYvxDH2sLBbLetys/edit#gid=0

Drive link image
    https://drive.google.com/drive/folders/1JAB5ujuWIwV4rJAewm_E3W0qi0bppXJ1?usp=sharing