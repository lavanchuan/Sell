<?php 
    session_start();
    // $_SESSION[]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bs5/bootstrap.min.css">
    <title>Cửa hàng quần áo TN</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark sticky-top">
            <div class="container-fluid">
                <a href="" class="navbar-brand"><img src="./res/logo/logo.jpg" alt="Home" class="rounded-pill"
                        style="width: 50px; height: 50px;"></a>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#list">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- list -->
                <div id="list" class="collapse navbar-collapse justify-content-between">
                    <a href="" class="navbar-brand">Cửa hàng quần áo TN</a>

                    <form action="" class="d-flex">
                        <input type="text" name="" id="" class="me-2" placeholder="Tìm kiếm">
                        <button class="btn btn-primary">Tìm kiếm</button>
                    </form>

                    <div class="d-flex">
                        <a href="#basket" data-bs-toggle="modal"><img src="./res/icon/basket.png" class="me-2" width="40px" height="40px"></a>
                        <div class="dropdown">
                            <a href="" class="" data-bs-toggle="dropdown"><img src="./res/icon/user.png" class="me-2"
                                    width="40px" height="40px"></a>
                            <ul class="dropdown-menu">
                                <!-- Nếu chưa đăng nhập -->
                                <a href="#login" class="dropdown-item" data-bs-toggle="modal">
                                    <li>Đăng nhập</li>
                                </a>
                                <a href="#register" class="dropdown-item" data-bs-toggle="modal">
                                    <li>Đăng ký</li>
                                </a>
                                <!-- Nếu đã đăng nhập -->
                                <a href="#info" class="dropdown-item" data-bs-toggle="modal">
                                    <li>Thông tin cá nhân</li>
                                </a>
                                <a href="#change-pass" class="dropdown-item" data-bs-toggle="modal">
                                    <li>Đổi mật khẩu</li>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="./admin/" class="dropdown-item"><li>Quản trị</li></a>
                                <hr class="dropdown-divider">
                                <a href="" class="dropdown-item">
                                    <li>Đăng xuất</li>
                                </a>
                            </ul>
                        </div>
                        <span class="text-primary form-control">Tên người dùng</span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container p-5">
            <div class="row">
                <!-- p1 -->
                <div class="card col-sm-6">
                    <div class="card-header">
                        <h4 class="title text-center">Sản phẩm 1</h4>
                    </div>
                    <div class="card-body d-flex">
                        <img src="./res/product/quan_jean_nu.jpg" class="img-thumbnail me-2" width="200px">
                        <table width="100%" class="table table-borderless">
                            <tr>
                                <th>Số lượng còn lại</th>
                                <td>2</td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>Sản phẩm phù hợp với phong cách trẻ trung, hiện đại</td>
                            </tr>
                            <tr>
                                <th>Giá</th>
                                <td>150.000 vnđ</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="">
                                    <a href="#product-detail" class="btn" data-bs-toggle="modal">
                                        <img src="./res/icon/add-to-basket.png" width="40px">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- p2 -->
                <div class="card col-sm-6">
                    <div class="card-header">
                        <h4 class="title text-center">Sản phẩm 2</h4>
                    </div>
                    <div class="card-body d-flex">
                        <img src="./res/product/ao_thun_unisex.jpg" class="img-thumbnail me-2" width="200px">
                        <table width="100%" class="table table-borderless">
                            <tr>
                                <th>Số lượng còn lại</th>
                                <td>9</td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>Sản phẩm phù hợp với phong cách trẻ trung, hiện đại</td>
                            </tr>
                            <tr>
                                <th>Giá</th>
                                <td>235.000 vnđ</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="">
                                    <a href="#product-detail" class="btn" data-bs-toggle="modal">
                                        <img src="./res/icon/add-to-basket.png" width="40px">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- detail product -->
            <div class="modal" id="product-detail">
                <div class="modal-dialog">
                    <form action="" class="modal-content container">
                        <div class="modal-header">
                            <h1 class="text-center">Sản phẩm 1</h1>
                        </div>

                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body d-flex">
                                    <img src="./res/product/quanao2.jpg" width="150px">
                                    <div class="container p-2">
                                        <table>
                                            <tr>
                                                <td>Số lượng</td>
                                                <td><input type="number" min="1" max="2" value="1" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td>Thành tiền</td>
                                                <td><span>150.000 vnđ</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Thêm vào giỏ hàng</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- form login -->
            <div class="modal" id="login">
                <div class="modal-dialog">
                    <form action="" class="modal-content container">
                        <div class="modal-header">
                            <h5 class="">Đăng nhập</h5>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>Tên đăng nhập</td>
                                    <td><input type="text" class="form-control" placeholder="Tên đăng nhập" required></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu</td>
                                    <td><input type="password" class="form-control" placeholder="Mật khẩu" required></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- form change-pass -->
            <div class="modal" id="change-pass">
                <div class="modal-dialog">
                    <form action="" class="modal-content container">
                        <div class="modal-header">
                            <h5 class="">Đổi mật khẩu</h5>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>Mật khẩu cũ</td>
                                    <td><input type="text" class="form-control" placeholder="Mật khẩu cũ" required></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu mới</td>
                                    <td><input type="password" class="form-control" placeholder="Mật khẩu mới" required></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- form register -->
            <div class="modal" id="register">
                <div class="modal-dialog">
                    <form action="" class="modal-content container">
                        <div class="modal-header">
                            <h5 class="">Đăng ký</h5>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>Tên người dùng</td>
                                    <td><input class="form-control" type="text" placeholder="Tên người dùng" required></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><input class="form-control" type="text" placeholder="Địa chỉ" required></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><input class="form-control" type="text" placeholder="Số điện thoại" required></td>
                                </tr>
                                <tr>
                                    <td>Tên đăng nhập</td>
                                    <td><input type="text" class="form-control" placeholder="Tên đăng nhập" required></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu</td>
                                    <td><input type="password" class="form-control" placeholder="Mật khẩu" required></td>
                                </tr>
                                <tr>
                                    <td>Nhập lại mật khẩu</td>
                                    <td><input type="password" class="form-control" placeholder="Mật khẩu" required></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- form info -->
            <div class="modal" id="info">
                <div class="modal-dialog">
                    <form action="" class="modal-content container">
                        <div class="modal-header">
                            <h5 class="">Thông tin cá nhân</h5>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>Tên đăng nhập</td>
                                    <td>Tên đăng nhập hiện tại</td>
                                </tr>
                                <tr>
                                    <td>Tên người dùng</td>
                                    <td><input class="form-control" type="text" value="Tên hiện tại" required></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><input class="form-control" type="text" value="Địa chỉ hiện tại" required></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><input class="form-control" type="text" value="Số điện thoại hiện tại" required></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- basket area -->
            <div class="modal" id="basket">
                <div class="modal-dialog">
                    <form action="" class="modal-content container-fluid">
                        <div class="modal-body">
                            <!-- dang sach don hang -->
                            <div class="card container">
                                <div class="card-header">
                                    <h4 class="text-center title">Sản phẩm 1</h4>
                                </div>
                                <div class="card-body d-flex">
                                    <img src="./res/product/quanao2.jpg" width="200px" class="img-thumbnail">
                                    <table>
                                        <tr>
                                            <td>Giá</td>
                                            <td>150.000 vnđ</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng</td>
                                            <td><input class="form-control" type="number" value="1" min="1" max="2"></td>
                                        </tr>
                                        <tr>
                                            <td>Thành tiền</td>
                                            <td>150.000 vnđ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- script -->
    <script src="./bs5/bootstrap.bundle.min.js"></script>
</body>

</html>