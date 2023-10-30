<?php include 'header.php'; include 'config.php'; ?>

<div id="main-content">
    <h2>Edit Record</h2>
    <?php 
    $std_id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE sid={$std_id}";
    $single_std = mysqli_query($conn, $sql) or die("Unsuccessful Query");

    if(mysqli_num_rows($single_std) > 0):
        while($std_info = mysqli_fetch_assoc($single_std)):
    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $std_info['sid']; ?>"/>
          <input type="text" name="sname" value="<?php echo $std_info['sname']; ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $std_info['saddress']; ?>"/>
      </div>
      <div class="form-group">
            <label>Class</label>
        <?php 
        $class_sql = "SELECT * FROM student_class";
        $class_query = mysqli_query($conn, $class_sql) or die("Unsuccessful Query");
        if(mysqli_num_rows($class_query) > 0): ?>
            <select name="sclass">
        <?php 
            while($class_info = mysqli_fetch_assoc($class_query)):
                if($class_info['cid'] == $std_info['sclass']){
                    $selected='selected';
                }else{
                    $selected='';
                }
        ?>
                <option value="<?php echo $class_info['cid'] ?>" <?php echo $selected; ?>><?php echo $class_info['cname']; ?></option>
            <?php endwhile; ?>
            </select>
        <?php endif; ?>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $std_info['sphone']; ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php endwhile; endif; ?>
</div>
</div>
</body>
</html>
