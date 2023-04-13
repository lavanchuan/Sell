<?php
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/admin/get_ip_client.php");

    $logged = getLoggedByIp(getUserIpAddr());
    $products = array();
    if($logged){
        $products = $_SESSION['products'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bs5/bootstrap.min.css">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <!-- content -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <div class="container">
                <a href="../" class="navbar-brand"><img src="../res/logo/logo.jpg" alt="Home" class="rounded-pill"
                        style="width: 50px; height: 50px;"></a>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#list">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- list -->
                <div id="list" class="collapse navbar-collapse justify-content-center">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="" class="nav-link <?php if(!$logged) echo "disabled"?>" data-bs-toggle="tab"
                                data-bs-target="#product">Sản phẩm</a></li>
                        <li class="nav-item"><a href="" class="nav-link <?php if(!$logged) echo "disabled"?>" data-bs-toggle="tab"
                                data-bs-target="#customer">Khách hàng</a></li>
                        <li class="nav-item"><a href="#orders" class="nav-link <?php if(!$logged) echo "disabled"?>" data-bs-toggle="tab">Đơn hàng</a></li>
                        <li class="nav-item"><a href="#transport" class="nav-link <?php if(!$logged) echo "disabled"?>" data-bs-toggle="tab">Vận chuyển</a>
                        </li>
                        <li class="nav-item"><a href="#turnover" class="nav-link <?php if(!$logged) echo "disabled"?>" data-bs-toggle="tab">Doanh thu</a>
                        </li>
                        <li class="nav-item"><a href="#admin-info" class="nav-link <?php if(!$logged) echo "disabled"?>" data-bs-toggle="tab">Thông tin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="tab-content">
            <!-- product -->
            <div class="tab-pane" id="product">
                <button class="btn btn-primary sticky-top"
                    style="left: 80%; width 20%; top: 80px;"
                    data-bs-toggle="modal" data-bs-target="#add-product">Thêm sản phẩm</button>
                <div class="row">
                    <div class="product">
                        <?php foreach($products as $p){?>
                        <!-- p1 -> pn -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="title"><?php echo $p[1]?></h4>
                            </div>
                            <form action="../model/handler/admin/update_product.php" method="post" class="card-body d-flex">
                                <img src="../res/product/<?php echo $p[7]?>" class="img-thumbnail" style="height: 400px;">
                                <div class="p-5">
                                    <table class="">
                                        <tr>
                                            <td>Mã sản phẩm</td>
                                            <td><?php echo $p[0] ?><input type="text" 
                                            style="visibility:hidden;width:0px;" 
                                            name="productId" 
                                            value="<?php echo $p[0] ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td>Tên sản phẩm</td>
                                            <td><input type="text" class="form-control"
                                                value="<?php echo $p[1]?>" name="productName"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px;">Màu sắc</td>
                                            <td><input type="text" class="form-control"
                                                value="<?php echo $p[2]?>" name="productColor"></td>
                                        </tr>
                                        <tr>
                                            <td>Size</td>
                                            <td><input type="text" class="form-control text-uppercase"
                                                value="<?php echo $p[3]?>" name="productSize"></td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng</td>
                                            <td><input type="number" class="form-control"
                                                value="<?php echo $p[4]?>" min="0" name="productQuantity"></td>
                                        </tr>
                                        <tr>
                                            <td>Giá (vnđ)</td>
                                            <td><input type="number" class="form-control"
                                                value="<?php echo $p[5]?>" min="1000" name="productPrice"></td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <td><input type="text" class="form-control"
                                                value="<?php echo $p[6]?>" name="productDescript"></td>
                                        </tr>
                                    </table>
                                    <div class="container pt-5 d-flex">
                                        <label for="files_<?php echo $p[0]?>" class="btn btn-info me-2">Đổi ảnh sản phẩm</label>
                                        <input type="text" style="visibility:hidden;width:0px;" 
                                        value="<?php echo $p[7]?>" name="imageDefault">
                                        <input id="files_<?php echo $p[0]?>"  type="file" style="visibility:hidden;width:0px;"
                                        name="productImage" value="<?php echo $p[7]?>">
                                        <!-- style="visibility:hidden;width:0px;" -->
                                        <button type="submit" class="btn btn-primary me-2">Lưu sản phẩm</button>
                                        <a href="../model/handler/admin/delete_product.php?id=<?php echo $p[0]?>" class="btn btn-danger">Xóa sản phẩm</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php }?>

                        <!-- Add product -->
                        <div class="modal" id="add-product">
                            <div class="modal-dialog">
                                <form action="../model/handler/admin/add_product.php" method="post" class="modal-content container">
                                    <div class="modal-header">
                                        <h5 class="">Thêm sản phẩm</h5>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tr>
                                                <td>Tên sản phẩm</td>
                                                <td><input type="text" class="form-control" placeholder="Tên sản phẩm" required name="productName"></td>
                                            </tr>
                                            <tr>
                                                <td>Màu sắc</td>
                                                <td><input type="text" class="form-control" placeholder="Màu sản phẩm" required name="productColor"></td>
                                            </tr>
                                            <tr>
                                                <td>Size</td>
                                                <td><input type="text" class="form-control" placeholder="Kích thước sản phẩm" required name="productSize"></td>
                                            </tr>
                                            <tr>
                                                <td>Số lượng sản phẩm</td>
                                                <td><input type="number" class="form-control" required name="productQuantity" min="1" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>Giá sản phẩm</td>
                                                <td><input type="number" class="form-control" required name="productPrice"></td>
                                            </tr>
                                            <tr>
                                                <td>Mô tả sản phẩm</td>
                                                <td><input type="text" class="form-control" placeholder="Mô tả sản phẩm" name="productDescript"></td>
                                            </tr>
                                            <tr>
                                                <td>Ảnh sản phẩm</td>
                                                <td><input type="file" class="form-control" required name="productImage"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                        <button class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </form>
                            </div>
            </div>
                    </div>
                </div>
            </div>

            <!-- customer -->
            <div class="tab-pane" id="customer">
                <table width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-sm-2">Mã khách hàng</th>
                            <th class="col-sm-2">Tên khách hàng</th>
                            <th class="col-sm-4">Địa chỉ</th>
                            <th class="col-sm-4">Phản hồi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KH001</td>
                            <td>Lê Thị Kim A</td>
                            <td>125 - Hoàng Quốc Việt - Hà Nội</td>
                            <td>Shop ơi, có thể giao hàng nhanh giúp em trong vòng 2 ngày không
                                <button class="btn btn-info">Trả lời</button>
                            </td>
                        </tr>
                        <tr>
                            <td>KH002</td>
                            <td>Đào Lê Nhật Á</td>
                            <td>222 - Phạm Văn Đồng - Hà Nội</td>
                            <td>Đã nhận được hàng, chất lượng, sẽ ủng hộ shop lâu dài
                                <button class="btn btn-info">Trả lời</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- orders -->
            <div class="tab-pane" id="orders">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Mã khách hàng</th>
                            <th>Địa chỉ nhận</th>
                            <th>Thời gian đặt</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Chi tiết đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>DH001</td>
                            <td>KH001</td>
                            <td>125 - Hoàng Quốc Việt - Hà Nội</td>
                            <td>23:00:00 - 31/12/2022</td>
                            <td>Đã thanh toán - đang vận chuyển</td>
                            <td><button class="btn btn-info">Xem</button></td>
                        </tr>
                        <tr>
                            <td>DH002</td>
                            <td>KH002</td>
                            <td>222 - Phạm Văn Đồng - Hà Nội</td>
                            <td>12:12:12 - 12/12/2022</td>
                            <td>Đã thanh toán - đã nhận hàng</td>
                            <td><button class="btn btn-info">Xem</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- transport -->
            <div class="tab-pane" id="transport">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="col-sm-2">Mã đơn hàng</th>
                        <th class="col-sm-*">Quảng đường vận chuyển</th>
                        <th class="col-sm-4">Vị trí hiện tại</th>
                    </tr>
                    <tr>
                        <td>DH001</td>
                        <td>Phạm Văn Đồng - Hoàng Quốc Việt</td>
                        <td>220 - Phạm Văn Đồng</td>
                    </tr>
                </table>
            </div>

            <!-- turnover -->
            <div class="tab-pane" id="turnover">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item"><a href="#to2020" class="nav-link" data-bs-toggle="tab">2020</a></li>
                    <li class="nav-item"><a href="#to2021" class="nav-link" data-bs-toggle="tab">2021</a></li>
                    <li class="nav-item"><a href="#to2022" class="nav-link" data-bs-toggle="tab">2022</a></li>
                    <li class="nav-item"><a href="#to2023" class="nav-link" data-bs-toggle="tab">2023</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="to2020">
                        <table class="table table-hover">
                            <tr>
                                <th class="col-sm-3">Tháng 10</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 11</th>
                                <td>11.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 12</th>
                                <td>12.000.000 vnđ</td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab-pane" id="to2021">
                        <table class="table table-hover">
                            <tr>
                                <th class="col-sm-3">Tháng 1</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 2</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 3</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 4</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 5</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 6</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 7</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 8</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 9</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 10</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 11</th>
                                <td>11.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 12</th>
                                <td>12.000.000 vnđ</td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab-pane" id="to2022">
                        <table class="table table-hover">
                            <tr>
                                <th class="col-sm-3">Tháng 1</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 2</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 3</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 4</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 5</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 6</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 7</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 8</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 9</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 10</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 11</th>
                                <td>11.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 12</th>
                                <td>12.000.000 vnđ</td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab-pane" id="to2023">
                        <table class="table table-hover">
                            <tr>
                                <th class="col-sm-3">Tháng 1</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 2</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 3</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Tháng 4</th>
                                <td>10.000.000 vnđ</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- admin info -->
            <div class="tab-pane container" id="admin-info">
                <h1 class="text-center text-capitalize">
                    <?php 
                        echo $_SESSION['fullname'];
                    ?>
                </h1>
                <form action="../model/handler/admin/update_admin.php" method="post">
                    <table class="table table-hover">
                        <tr>
                            <th>Tên đăng nhập</th>
                            <td><?php echo $_SESSION['username'] ?></td>
                        </tr>
                        <tr>
                            <th class="col-sm-4">Ngày thành lập</th>
                            <td>
                                <!-- <?php echo date_format(date_create("".$_SESSION['foundday']), "d/m/Y") ?> -->
                                <input class="form-control" type="date" value="<?php echo $_SESSION['foundday'] ?>" name="txtFoundDay">
                            </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>
                                <input class="form-control text-capitalize" type="text" name="txtAddress" value="<?php echo $_SESSION['address_admin'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Chứng chỉ</th>
                            <td>5 sao, uy tín, chất lượng,...</td>
                        </tr>
                    </table>
                    <button type="submit" class="justify-content-end btn btn-primary">Lưu</button>
                    <a href="../" class="btn btn-info">Xem cửa hàng</a>
                    <a href="../model/handler/admin/logout_admin.php" class="btn btn-danger">Đăng xuất</a>
                </form>
            </div>
        </div>

        <!-- Login -->
        <?php 
            if(!$logged){
        ?>
        <form action="../model/handler/admin/loginadmin.php" method="post" 
        class="" style="padding-left: 20%; padding-top:100px;">
            <table width="60%">
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input type="text" placeholder="Tên đăng nhập" name="txtUsername" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" placeholder="Mật khẩu" name="txtPassword" class="form-control" required></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary" style="margin-left: 40%; margin-top: 10px;">Đăng nhập</button>
        </form>
    </div>
    <?php } ?>
    <!-- script -->
    <script src="../bs5/bootstrap.bundle.min.js"></script>
</body>

</html>