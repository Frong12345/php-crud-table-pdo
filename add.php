<?php
//ถ้ามีค่าส่งมาจากฟอร์ม
if(isset($_POST['stu_id']) && isset($_POST['action']) && $_POST['action']=='add'){

// echo '<pre>';
// print_r($_POST);
// exit();

//ไฟล์เชื่อมต่อฐานข้อมูล
require_once 'config/condb.php'; 

//trigger exception in a "try" block
try { 

    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $stu_id = $_POST['stu_id'];
    $stu_prefix = $_POST['stu_prefix'];
    $stu_fname = $_POST['stu_fname'];
    $stu_lname = $_POST['stu_lname'];
    $stu_email = $_POST['stu_email'];
    $stu_phone = $_POST['stu_phone'];
    $stu_major = $_POST['stu_major'];
    $stu_status = $_POST['stu_status'];
    $stu_favpro = $_POST['stu_favpro'];

    //sql insert
    $stmt = $condb->prepare("INSERT INTO tbl_studeninfo

    (
    student_id, prefix, first_name, last_name, 
    email, phone, major, status, favorite_prog
    )

    VALUES 
    (
    :stu_id, :stu_prefix, :stu_fname, :stu_lname, 
    :stu_email, :stu_phone, :stu_major, :stu_status, :stu_favpro
    )


    ");

    //bindparam STR // INT
    $stmt->bindParam(':stu_id', $stu_id, PDO::PARAM_STR);
    $stmt->bindParam(':stu_prefix', $stu_prefix, PDO::PARAM_STR);
    $stmt->bindParam(':stu_fname', $stu_fname, PDO::PARAM_STR);
    $stmt->bindParam(':stu_lname', $stu_lname, PDO::PARAM_STR);
    $stmt->bindParam(':stu_email', $stu_email, PDO::PARAM_STR);
    $stmt->bindParam(':stu_phone', $stu_phone, PDO::PARAM_STR);
    $stmt->bindParam(':stu_major', $stu_major, PDO::PARAM_STR);
    $stmt->bindParam(':stu_status', $stu_status, PDO::PARAM_STR);
    $stmt->bindParam(':stu_favpro', $stu_favpro, PDO::PARAM_STR);


    //ถ้า stmt ทำงานถูกต้อง 
     if($stmt->execute()){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } //if

} //catch exception
catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
  exit;
   echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "กรุณาติดต่อผู้ดูแลระบบ",
                  type: "error"
              }, function() {
                  window.location = "index.php";
              });
            }, 1000);
        </script>';
  }  //catch
} //isset

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic CRUD by devbanban.com 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- sweet alert -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  </head>

  <body>
 <!-- start menu -->
 <?php include 'menu.php';?>
    <!-- end menu -->

    
    <!-- start member -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-7">
          <h3 class="text-center">ฟอร์มเพิ่มข้อมูลสมาชิก</h3>

          <form action="" method="post" class="mt-4">

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">รหัสนักศึกษา</label>
              <div class="col-sm-7">
                <input type="text" name="stu_id" class="form-control" required placeholder="รหัสนักศึกษา">
              </div>
            </div>
            
            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">คำนำหน้า</label>
              <div class="col-sm-7">
                <select class="form-select" name="stu_prefix" required>
                  <option value="">-กรุณาเลือก-</option> 
                  <option value="นาย">นาย</option>
                  <option value="นางสาว">นางสาว</option>
                </select>
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">ชื่อจริง</label>
              <div class="col-sm-7">
                <input type="text" name="stu_fname" class="form-control" required placeholder="ชื่อจริง">
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">นามสกุล</label>
              <div class="col-sm-7">
                <input type="text" name="stu_lname" class="form-control" required placeholder="นามสกุล">
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">อีเมล</label>
              <div class="col-sm-7">
                <input type="text" name="stu_email" class="form-control" required placeholder="อีเมล">
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">เบอร์โทร</label>
              <div class="col-sm-7">
                <input type="text" name="stu_phone" class="form-control" required placeholder="เบอร์โทร">
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">สาขา</label>
              <div class="col-sm-7">
                <select class="form-select" name="stu_major" required>
                    <option value="">-กรุณาเลือก-</option> 
                    <option value="IT">IT</option>
                    <option value="BI">BI</option>
                  </select>
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">สถานะ</label>
              <div class="col-sm-7">
                <select class="form-select" name="stu_status" required>
                  <option value="">-กรุณาเลือก-</option> 
                  <option value="Active">Active</option>
                  <option value="Graduated">Graduated</option>
                  <option value="Drop">Drop</option>
                  <option value="ETC.">ETC.</option>
                </select>
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-sm-3 col-form-label">ภาษาโปรแกรมที่ชอบ</label>
              <div class="col-sm-7">
                <select class="form-select" name="stu_favpro" required>
                  <option value="">-กรุณาเลือก-</option> 
                  <option value="SQL">SQL</option>
                  <option value="PHP">PHP</option>
                  <option value="JAVA">JAVA</option>
                  <option value="PYTHON">PYTHON</option>
                </select>
              </div>
            </div>

           
            <div class="row mb-2">
              <label class="col-sm-2"></label>
              <div class="col-sm-4">
                <button type="submit" name="action" value="add" class="btn btn-primary"> เพิ่มข้อมูล </button>
              </div>
            </div>
          </form>

         
        </div>
      </div>
    </div>
    <!-- end member -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


