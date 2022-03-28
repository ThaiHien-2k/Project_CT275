<?php

if (!is_administrator()) {
	echo '<h2>Truy cập bị từ chối!</h2><p class="error">Bạn không có quyền truy xuất trang này.</p>';
	include 'footer.php';
	exit();
}