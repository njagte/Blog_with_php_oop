</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
        <?php
            $query = "SELECT * FROM tbl_footer WHERE id='1'";
            $footerNote = $db->select($query);
            if ($footerNote) {
            while ($result = $footerNote->fetch_assoc()){
        ?>
	  <p>&copy; <?php echo $result['note']; ?><?php echo date('Y')?></p>
        <?php } }?>

	</div>
	<div class="fixedicon clear">
        <?php
            $query = "SELECT * FROM dbl_social WHERE id = '1'";
            $socialmedia = $db->select($query);
            if ($socialmedia) {
            while ($result = $socialmedia->fetch_assoc()) {
        ?>
		<a href="<?php echo $result['fb']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['fb']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['fb']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['fb']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>

        <?php } } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>