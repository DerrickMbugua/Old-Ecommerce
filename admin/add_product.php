<?php
session_start();
if($_SESSION["admin"]=="")
{
    header('location:admin_login.php');

}
include "header.php";
include "menu.php";
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"admin_login");
?>

       
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Add Product</h2>
                <div class="block">
                   
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Product Name</td>
                            <td><input type="text" name="pnm"></td>
                        </tr>
                        <tr>
                            <td>Product Price</td>
                            <td><input type="text" name="pprice"></td>
                        </tr>
                        <tr>
                            <td>Product Quantity</td>
                            <td><input type="text" name="pqty"></td>
                        </tr>
                        <tr>
                            <td>Product image</td>
                            <td><input type="file" name="pimage"></td>
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td>
                                <select name="pcategory">
                                    <option value="Gents_Clothes">Gents Clothes</option>
                                    <option value="Ladies_Clothes">Ladies Clothes</option>
                                    <option value="Gents_Shoes">Gents Shoes</option>
                                    <option value="Gents_Shoes">Ladies Shoes</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Description</td>
                            <td>
                                <textarea cols="10" row="10" name="pdesc"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
                        </tr>

                    </table>

                </form>
<?php
if(isset($_POST["submit1"]))
{
    $v1=rand(1111,9999);
    $v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);
$fnm=$_FILES["pimage"]["name"];
$dst="./product_image/".$v3.$fnm;
$dst1="product_image/".$v3.$fnm;
move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);


mysqli_query($link,"insert into product values('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");

}
?>

                </div>
            </div>
</div>
  <?php
  include "footer.php";
  ?>