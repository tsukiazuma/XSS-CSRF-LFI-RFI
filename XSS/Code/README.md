## Người thực hiện: Trần Ngọc Nam
## Ngày thực hiện: 15/5/2022

- Đây là giao diện trang web bị lỗi xss.

  ![CHESSE](../../img/9.png)
  
- Trang web dễ dàng bị tấn công bởi xss để lấy cookie và chiếm phiên làm việc.
  ```php
  <script>alert(document.cookie)</script>
  ```

  ![CHESSE](../../img/1-.png)

- 