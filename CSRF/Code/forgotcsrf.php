<!DOCTYPE html>
<html>

<head>
    <title>Đổi mật khẩu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Đổi mật khẩu</h3>

                            <form action='forgot.php' method='POST'>
                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" name="txtUsername" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">Tên đăng nhập</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" name="txtPassword" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Mật khẩu</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" name="txtPassword3" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Mật khẩu mới</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="hidden" id="typePasswordX-2" name="txtPassword2" value="reset" class="form-control form-control-lg" />
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" name="forgot" type="submit">Đổi mật khẩu</button>
                                <input type="hidden" name="_token" value="<?php echo $token; ?>" />
                                <?php
                                $_SESSION['_token'] = $token;
                                ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>