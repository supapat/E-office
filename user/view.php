<?php
session_start();
include "../connect.php";
$id = $_GET['id'];
$position = $_SESSION['ses_position'];

$sql = "SELECT  document.* FROM access LEFT JOIN document 
	   on access.documentId = document.documentId  WHERE access.documentId = '$id' AND access.positionId ='$position'";
$rs = mysqli_query($link,$sql);
$data = mysqli_fetch_array($rs,MYSQLI_ASSOC);
$pop=substr($data['attachment'],0,5);

$type = "save_file";
$type2 = $pop;
$type3 = $year;
$src = "../{$type}/{$type2}/{$type3}/{$data['attachment']}";

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
}else{

	?>

	<!DOCTYPE HTML>
<!--


	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php include "../headAdmin.php"; ?>
<body class="is-loading"  id="page-top">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">


		<!-- Header -->
		<header id="header">
			<a href="index.php" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="Document.php">Document search</a></li>
				<li><a href="private.php?userId=<?php echo $_SESSION['ses_userId']?>">private</a></li>

			</ul>
			<ul class="icons">
				<li><a href="../logout.php" class="fa fa-sign-out"><span class="label"> Log out</span></a></li>

			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Featured Post -->
			<article class="post featured">
				<header class="major">
					<span class="date"><?php echo "$date $month $year";?></span>
					<h3><a href="#"><?php echo "ไฟล์: {$data['documentName']}";?></a></h3>
				</header>
				<div class="table-wrapper">
					
						<?php
						if($type=="save_file") {


							echo "<img src=\"$src\"> ";

						}
						else {
							echo "<h3>ไม่สามารถเปิดไฟล์นี้ได้ กรุณาดาวน์โหลดมาเปิดบนเครื่องของท่านเอง</h3>";
						}

						?>


						
						
					</div><br><br><br>
					<a href="../download.php?id=<?php echo $id  ?>" target="iframe"><img src="../images/arw-down.png" title="ดาวน์โหลด"></a>
				</article>

				<?php
					mysqli_close($link);
						?>




				<!-- Copyright -->
				<div id="copyright">
					<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
				</div>

			</div>

			<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


		</body>
		</html>
		<?php }

		?>