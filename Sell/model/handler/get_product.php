<?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/dbhandler.php");

    // get product list
    function getProductList(){
        $result = array();
        $query = "select * from product;";
        $data = query($query);
        foreach($data as $row){
            $result[] = array($row['product_id'],
                $row['product_name'],
                $row['product_color'],
                $row['product_size'],
                $row['product_quantity'],
                $row['product_price'],
                $row['product_descript'],
                $row['product_image']);
        }
        return $result;
    }

    // update product
    function updateProduct($id, $name, $color, $size, $quantity, $price, $descript, $image){
        $sql = "update product set product_name = '$name', product_color = '$color', 
        product_size = '$size', product_quantity = $quantity, product_price = $price, 
        product_descript = '$descript', product_image = '$image' where product_id = '$id';";
        $data = query($sql);
    }

    // add product
        // get next product id
    function getNextProductId(){
        $sql = "select max(product_id) from product;";
        $data = query($sql);
        $max = null;
        foreach($data as $row){$max = $row[0]; break;}
        if($max == null) return "SP001";
        $s = 1 + substr($max, -3);
        if($s < 10) return "SP00" . $s;
        if($s < 100) return "SP0" . $s;
        return "SP" . $s;
    }
        // add prouct
    function addProduct($name, $color, $size, $quantity, $price, $descript, $image){
        $id = getNextProductId();
        $sql = "insert into product value('$id', '$name', '$color', '$size', $quantity, 
        $price, '$descript', '$image');";
        $data = query($sql);
    }

    // delete product
    function deleteProduct($id){
        $sql = "delete from product where product_id = '$id';";
        $data = query($sql);
    }
?>