<?php

define('TITLE', 'Sửa một Trích dẫn');
include '../partials/header.php';

echo '<h2>Sửa một Trích dẫn</h2>';

include '../partials/check_admin.php';
include '../mysqli_connect.php';
 if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
  $query = "SELECT quote, source, favorite FROM quotes WHERE id={$_GET['id']}";
  if ($result = mysqli_query($dbc, $query)) {
    $row = mysqli_fetch_array($result);
    echo '<form action="edit_quote.php" method="post">
      <p><label>Trích dẫn <textarea name="quote" rows="5" cols="30">' .
          htmlspecialchars ($row['quote']) . '</textarea></label></p>
      <p><label>Nguồn <input type="text" name="source"value=" '. htmlspecialchars ($row['source']). ' "</label></p>
      <p><label>Đây là trích dẫn được yêu thích? <input type="checkbox" name="favorite" value="yes"';
    if ($row['favorite'] == 1) {
      echo ' checked="checked"';
	}
    echo '></label</p>
      <input type="hidden" name="id" value="' . $_GET['id'] . '">
      <p><input type="submit" name="submit" value="cập nhật Trích dẫn này!"></p>
  </form>';
  } else {
    echo '<p class="error">Không thể lấy được trích dẫn này vì:<br>' . mysqli_error($dbc) .
        '.</p><p>Câu truy vấn là:' . $query. '</p>';
		}
		
		} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
  $problem = FALSE;
  if ( !empty($_POST['quote']) && !empty($_POST['source']) ) {
     if (isset($_POST['favorite'])) {
        $favorite = 1; 
      } else {
        $favorite = 0;
	  }
   } else {
     echo '<p class="error">Hãy gõ vào cả Trích dẫn và Nguồn của nó!</p>';
     $problem = TRUE;
  }
  if (!$problem) {
     $query = "UPDATE quotes SET quote=?, source=?, favorite=? WHERE id=?";
     $stmt = mysqli_prepare($dbc, $query);
     mysqli_stmt_bind_param($stmt, 'ssii', $_POST['quote'], $_POST['source'],
                      $favorite, $_POST['id']);
     if ($result = mysqli_stmt_execute ($stmt)) {
        echo '<p>Trích dẫn này đã được cập nhật.</p>';
     } else {
        echo '<p class="error">Không thể cập nhật Trích dẫn này vì:<br>' . mysqli_error($dbc).
           '.</p><p>Câu truy vấn là: '. $query . '</p>';
  } }}else
    {
  echo '<p class="error">Đã có lỗi xảy ra.</p>';
    }



include '../partials/footer.php';
?>