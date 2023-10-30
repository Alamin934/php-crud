<?php include 'header.php'; include 'config.php'; 

$sql = "SELECT * FROM student_class";
$st_class = mysqli_query($conn, $sql) or die("Query Unsuccessful");


?>
    <div id="main-content">
        <h2>Add New Record</h2>
        <form class="post-form" action="savedata.php" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="sname" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="saddress" />
            </div>
            <div class="form-group">
                <label>Class</label>
                <select name="class">
                    <option value="" selected disabled>Select Class</option>
                <?php while($class_info = mysqli_fetch_assoc($st_class)): ?>
                    <option value="<?php echo $class_info['cid']; ?>"><?php echo $class_info['cname']; ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="sphone" />
            </div>
            <input class="submit" type="submit" value="Save"  />
        </form>
        <?php mysqli_close($conn); ?>
    </div>
</div>
</body>
</html>
