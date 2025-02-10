<tbody>
    <!-- foreach ดึงข้อมูลแต่ละแถวมาแสดงผล โดยกำหนด $row เป็นแถวแต่ละแถว -->
    <?php foreach($result as $row) { ?> <!-- start foreach  -->
    <tr>
    <!-- $row['ชื่อของคอลลัมภ์ในฐานข้อมูล ที่จะดึงข้อมูลมาแสดง'] -->
    <td><?=$row['id'];?></td>
    <td><?=$row['student_id'];?></td>
    <td><?=$row['prefix'];?></td>
    <td><?=$row['first_name'];?></td>
    <td><?=$row['last_name'];?></td>
    <td><?=$row['email'];?></td>
    <td><?=$row['phone'];?></td>
    <td><?=$row['major'];?></td>
    <td><?=$row['register_date'];?></td>
    <td><?=$row['status'];?></td>
    <td><?=$row['favorite_prog'];?></td>
    <!-- ใช้ tag <a> เมื่อ click จะ link ไปหน้า edit.php และส่งค่า GET ไป พร้อม URL ด้วย = ?id=...&act=edit เพื่อเอาไว้ query ข้อมูลมาแสดงในฟอร์มแก้ไข  tag <a> ส่งค่าเป็น GET เท่านั้น -->
    <td><a href="edit.php?id=<?=$row['id'];?>&act=edit" class="btn btn-warning btn-sm">แก้ไข</a></td>
    <td>
        <!-- ใช้ form เพื่อส่งค่าไปเป็น POST และจะไม่แสดงใน URL เพราะจะเอาขอมูลไปใช้กลับฐานข้อมูลโดยตรง รูปแบบการส่งข้อมูล id=...&act=delete -->
        <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="hidden" name="act" value="delete">
        <!-- เมื่อกดปุ่ม delete จะมีหน้าต่างแสดงให้กด confirm ว่าจะลบข้อมูลนี้มั้ย โดยจะใช้ onclick ของ javascript มาช่วยจัดการ -->
        <button  class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</button>
        </form>
    </td>
    <!-- <td><a href="delete.php?id= <=$row['member_id'];?> &act=delete" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td> -->
    </tr>
    <?php } ?>  <!-- End foreach -->
</tbody>