<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền điện</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $ten = $_POST['name'];
            $chi_so_cu = $_POST['oldIndex'];
            $chi_so_moi = $_POST['newIndex'];
            $gia = $_POST['price'];

            if($chi_so_cu >= 0 and $chi_so_moi > 0){
                if($chi_so_moi > $chi_so_cu){
                    $tong_tien = ($chi_so_moi - $chi_so_cu) * $gia;
                    $tong_tien = round($tong_tien,2);
                }
                else $msg = "Chỉ số mới phải > chỉ số cũ";
            }
            else $msg = "Chỉ số cũ và chỉ số mới phải > 0";
        }
    ?>
    <form name="electricity" action="" method="post">
        <table style="background: beige">
            <tr style="background: orange">
                <th colspan="2">THANH TOÁN TIỀN ĐIỆN</th>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="name" size="20" value="<?php 
                        if(isset($ten)) echo $ten;
                    ?>" pattern="[A-Za-zÀ-ỹẠ-ỹ\s]+" title="Chỉ nhập chữ (ký tự)" required>
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="number" name="oldIndex" size="20" value="<?php 
                        if(isset($chi_so_cu)) echo $chi_so_cu;
                    ?>" step="any">
                    <span>(Kw)</span>
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="number" name="newIndex" size="20" value="<?php 
                        if(isset($chi_so_moi)) echo $chi_so_moi;
                    ?>" step="any">
                    <span>(Kw)</span>
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="number" name="price" size="20" value="<?php 
                        if(isset($gia)) echo $gia;
                    ?>" step="any" required>
                    <span>(VNĐ)</span>
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input readonly type="number" name="sumMoney" size="20" style="background: pink" value="<?php 
                        if(isset($tong_tien)) echo $tong_tien;
                    ?>" step="any">
                    <span>(VNĐ)</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; color: red">
                    <?php
                        if(isset($msg)) echo $msg;
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>