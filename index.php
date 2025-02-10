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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

 <!-- start menu -->
   <?php include 'menu.php';?>
    <!-- end menu -->

    <!-- start member -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12"> <br>
          <h3>รายการสมาชิก <a href="add.php" class="btn btn-info">+เพิ่มข้อมูล</a> </h3>
          <div class="table-responsive">
            <table class="table table-striped  table-hover table-responsive table-bordered table-sm">
              <?php include 'tb_header.php'; ?>
              <?php include 'tb_body.php'; ?>
            </table>
          </div>
          <hr>
          * แยก  header & footer & include  <br>
          * เปลี่ยนการลบจาก method get to method post ถ้าเวลาเหลือ 
        </div>
      </div>
    </div>


    <!-- end member -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>