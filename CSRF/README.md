## Người thực hiện: Trần Ngọc Nam
## Ngày thực hiện: 16/5/2022

# Mục lục
1. [CSRF là gì?](#1)
2. [Kịch bản tấn công CSRF](#2)
3. [Cách phòng chống tấn công CSRF](#3)
   1. [Phía user](#4)
   2. [Phía server](#5)

## CSRF là gì?<a name="1"></a>
- CSRF ( Cross Site Request Forgery) là kỹ thuật tấn công bằng cách sử dụng quyền chứng thực của người dùng đối với một website.
- CSRF là kỹ thuật tấn công vào người dùng, dựa vào đó hacker có thể thực thi những thao tác phải yêu cầu sự chứng thực. Hiểu một cách nôm na, đây là kỹ thuật tấn công dựa vào mượn quyền trái phép.
- CSRF còn được gọi là "session riding", "XSRF".
  
## Kịch bản tấn công CSRF:<a name="2"></a>
- Hacker sử dụng phương pháp CSRF để lừa trình duyệt của người dùng gửi đi các câu lệnh http đến các ứng dụng web. Điều đó có thể thực hiện bằng cách chèn mã độc hay link đến trang web mà người dùng đã được chứng thực.
- Ví dụ:
  - Người dùng Alie truy cập 1 diễn đàn yêu thích của mình như thường lệ. Một người dùng khác, Bob đăng tải 1 thông điệp lên diễn đàn. Giả sử rằng Bob có ý đồ không tốt và anh ta muốn xóa đi một dự án quan trọng nào đó mà Alice đang làm.
  - Bob sẽ tạo 1 bài viết, trong đó có chèn thêm 1 đoạn code
    ```php
    <img height="0" width="0" src="http://www.webapp.com/project/1/destroy">
    ```
  - Giả sử Alie đang truy cập vào tài khoản của mình ở www.webapp.com và chưa thực hiện logout để kết thúc. Bằng việc xem bài post, trình duyệt của Alice sẽ đọc thẻ img và cố gắng load ảnh từ www.webapp.com, do đó sẽ gửi câu lệnh xóa đến địa chỉ này.
  - Ứng dụng web ở www.webapp.com sẽ chứng thực Alice và sẽ xóa project với ID là 1. Nó sẽ trả về trang kết quả mà không phải là ảnh, do đó trình duyệt sẽ không hiển thị ảnh.
- Ngoài thẻ <code>img</code>, các thẻ html có thể sử dụng kĩ thuật trên:
  ```php
  <iframe height="0" width="0" src="http://www.webapp.com/project/1/destroy">

  <link ref="stylesheet" href="http://www.webapp.com/project/1/destroy" type="text/css"/>

  <bgsound src="http://www.webapp.com/project/1/destroy"/>

  <background src="http://www.webapp.com/project/1/destroy"/>

  <script type="text/javascript" src="http://www.webapp.com/project/1/destroy"/>

  ```
## Cách phòng chống tấn công CSRF:<a name="3"></a>

### Phía user:<a name="4"></a>
- Nên thoát khỏi các website quan trọng khi đã thực hiện xong giao dịch hay các công việc cần làm.
- Không nên click vào các đường dẫn mà bạn nhận được qua email, qua facebook … 
- Không lưu các thông tin về mật khẩu tại trình duyệt của mình
- Trong quá trình thực hiện giao dịch hay vào các website quan trọng không nên vào các website khác, có thể chứa các mã khai thác của kẻ tấn công.

### Phía server:<a name="5"></a>
- Sử dụng captcha, các thông báo xác nhận.
- Sử dụng csrf_token.
- Sử dụng cookie riêng biệt cho trang admin.
- Kiểm tra IP.