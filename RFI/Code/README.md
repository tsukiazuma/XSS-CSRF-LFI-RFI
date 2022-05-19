## Người thực hiện: Trần Ngọc Nam
## Ngày thực hiện: 18/5/2022

- Đây là giao diện web bị lỗi RFI.
  
  ![CHESSE](../../img/19.png)

- Vì trang web có dạng <code>?page=lfi.php</code> nên dễ dàng bị tấn công rfi. Ở đây ta sẽ thử chèn 1 đường dẫn url vào <code>?page=https://thudinh.blogspot.com/2017/09/dvwa-file-inclusion-medium-level.html</code>.
  
  ![CHESSE](../../img/20.png)

- Để ngăn chặn điều này, ta sử dụng hàm <code>str_place()</code> để xóa các giá trị được gán như <code>http://</code>, <code>https://</code>, các kí tự cho phép người dùng thoát khỏi thư mục và thay thế bằng giá trị " ".
  ```php
  if (isset($_GET['page'])) {
        $page = $_GET['page'];

        $page = str_replace(array("http://", "https://"), "", $page);
        $page = str_replace(array("../", "..\""), "", $page);

        include($page);
    }
  ```

- Như vậy, ta đã ngăn chặn được tấn công rfi bằng cách chèn url.
  
  ![CHESSE](../../img/21.png)