<tbody>
    <?php foreach($result as $row) { ?>
    <tr>
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
    <td><a href="edit.php?id=<?=$row['id'];?>&act=edit" class="btn btn-warning btn-sm">แก้ไข</a></td>
    <td>
        <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="hidden" name="act" value="delete">
        <button  class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</button>
        </form>
    </td>
    <!-- <td><a href="delete.php?id= <=$row['member_id'];?> &act=delete" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td> -->
    </tr>
    <?php } ?>
</tbody>