<?php

define('TITLE', 'Xem tất cả các Trích dẫn');
include '../partials/header.php';

echo '<h2>Tất cả các Trích dẫn</h2>';

include '../partials/check_admin.php';
include '../mysqli_connect.php';

$query = 'SELECT ma_review, review FROM reviews';
if ($result = mysqli_query($dbc, $query)) {
    while ($row = mysqli_fetch_array($result)) {
        $htmlspecialchars = 'htmlspecialchars';
        echo "<div><blockquote>{$htmlspecialchars ($row['review'])}</blockquote>-
                  {$htmlspecialchars ($row['ma_review'])}<br>";
    }
} else {
    echo '<p class="error">Không thể lấy dữ liệu vì: <br>' . mysqli_error($dbc) .
           '.</p><p>Câu truy vấn là: '. $query . '</p>';
 }
mysqli_close($dbc);





include '../partials/footer.php';
?>