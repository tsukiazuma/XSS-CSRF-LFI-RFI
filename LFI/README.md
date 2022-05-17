## Người thực hiện: Trần Ngọc Nam
## Ngày thực hiện: 17/5/2022

# Mục lục:
1. [Lỗ hổng LFI](#1)
2. [Lỗ hổng LFI trong PHP](#2)
3. [Lỗ hổng LFI trong JSP](#3)

## Lỗ hổng LFI:<a name="1"></a>
- Lỗ hổng Local file inclusion nằm trong quá trình include file cục bộ có sẵn trên server.
- Lỗ hổng xảy ra khi đầu vào người dùng chứa đường dẫn đến file bắt buộc phải include. Khi đầu vào này không được kiểm tra, tin tặc có thể sử dụng những tên file mặc định và truy cập trái phép đến chúng, tin tặc cũng có thể lợi dụng các thông tin trả về trên để đọc được những tệp tin nhạy cảm trên các thư mục khác nhau bằng cách chèn các ký tự đặc biệt như “/”, “../”, “-“.

## Lỗ hổng LFI trong PHP:<a name="2"></a>
- Ví dụ đường dẫn sau có thể bị tấn công <code>https://victim_site/abc.php?file=userinput.txt</code>.
- Giá trị của biến ‘file’ được lấy vào đoạn mã PHP dưới đây.
  ```php
  <?php…include $_REQUEST[‘file’];…?></code>.
  ```
- Giờ thì tin tặc sẽ đưa mã độc vào biến ‘file’ để truy cập trái phép vào file trong cùng chủ mục hoặc sử dụng kí tự duyệt chỉ mục như “../” để di chuyển đến chỉ mục khác. Ví dụ tin tặc lấy được log bằng cách cung cấp đầu vào “/apache/logs/error.log” hoặc “/apache/logs/access.log” hay việc đánh cắp dữ liệu liên quan đến tài khoản của người dùng thông qua “../../etc/passwd” trên hệ thống Unix.

## Lỗ hổng LFI trong JSP:<a name="3"></a>
- Giả sử URL dưới đây được yêu cầu trong ứng dụng và biến ‘test’ lấy dữ liệu đầu vào trong lệnh include <code>www.victim_site.com/abc.jsp?test=xyz.jsp</code>.
- Giá trị của biến ‘test’ sẽ được chuyển qua <code>…<jsp:include page=”<%= (String)request.getParameter(\”test\”)%>”>…</code>.
- Mũi tấn công dành cho đoạn mã trên có thể nằm trong một file database hợp lệ, được sử dụng như một đầu vào. Do có lỗ hổng local file inclusion nằm trong ứng dụng, file database sẽ được include vào trang JSP <code>www.victim_site.com/abc.jsp?test=/WEB-INF/database/passwordDB</code>.