<?php
include 'header.php';
include 'config.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php 
        $sql = "SELECT * FROM students INNER JOIN student_class ON students.sclass = student_class.cid ORDER BY sid";
        $s_details = mysqli_query($conn, $sql) or die("Query Unsuccessful");

        if(mysqli_num_rows($s_details) > 0){
        
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php 
                while($s_info = mysqli_fetch_assoc($s_details)):
            ?>
            <tr>
                <td><?php echo $s_info['sid'] ?></td>
                <td><?php echo $s_info['sname'] ?></td>
                <td><?php echo $s_info['saddress'] ?></td>
                <td><?php echo $s_info['cname'] ?></td>
                <td><?php echo $s_info['sphone'] ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $s_info['sid'] ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $s_info['sid'] ?>'>Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php 
        }else{
            echo "<h2>No Data Found</h2>";
        }
        mysqli_close($conn);
    ?>
</div>
</div>
</body>
</html>
