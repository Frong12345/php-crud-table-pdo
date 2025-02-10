<?php
//ไฟล์เชื่อมต่อฐานข้อมูล
require_once 'config/condb.php';
// คิวรี่ข้อมูลมาแสดงในตาราง
$stmt = $condb->prepare("SELECT * FROM tbl_studeninfo");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($result);
// echo '</pre>';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic CRUD by DevStudents.com 2025</title>
    <?php include "style.php";?> <!-- นำเข้า bootstrap.min.css -->
  </head>
  <body>

 <!-- start menu -->
   <?php include 'menu.php';?>
    <!-- end menu -->

    <!-- Start CRUD -->
    <div class="container custom">
      <div class="row">
        <div class="col-sm-12 "> <br>
          <?php include "header.php"; ?>
          <div class="table-responsive"> <!-- ทำมห้ตารางเลื่อนซ้าย-ขวาได้  -->
            <table class="table table-striped  table-hover table-bordered table-sm">
              <!-- theader  -->
              <?php include 'tb_header.php'; ?>
              <!-- tbody -->
              <?php include 'tb_body.php'; ?>
            </table>
          </div>
          <hr>
 
        </div>
      </div>
    </div> <!--close container-->
     <?php include "footer.php";?>

    
    

    <!-- End CRUD -->
    <?php include "script.php";?> <!-- นำเข้า bootstrap.bundle.min.js -->
  </body>
</html>