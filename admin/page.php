<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
    if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
        echo"<script>window.location = 'index.php'; </script>";
    } else {
        $id = $_GET['pageid'];
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Page</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);

            if ($name == "" || $body == "") {
                echo "<span class='error'>Field must not be empty !</span>";
            } else {
                $query = "UPDATE tbl_page
                            SET
                            name = '$name',
                            body = '$body'
                            WHERE id = '$id'";

                $updated_row = $db->update($query);
                if ($updated_row){
                    echo "<span class='success'>Page Updated Successfully.</span>";
                }else{
                    echo "<span class='error'>Page not Updated.</span>";
                }
            }
        }
        ?>
        <div class="block">
            <?php
                $pagequery = "SELECT * FROM tbl_page WHERE id = '$id'";
                $pagedetail = $db->select($pagequery);
                if ($pagedetail) {
                while ($result = $pagedetail->fetch_assoc()) {
            ?>
            <form action="" method="post">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $result['name']?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $result['body']; ?>
                            </textarea>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php include 'inc/footer.php'; ?>



