<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>
<?php $this->start("page_specific_css") ?>
<style>
    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
</style>
    <?php $this->stop() ?>
    <?php $this->start("page") ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>Page Not Found <small>
                            <font face="Tahoma" color="red">Error 404</font></small>
                        </h1>
                    <div class="error-details">
                         Xin lỗi, đã xảy ra lỗi.
                             Trang bạn yêu cầu không thể được tìm thấy.
                    </div>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-home"></span>
                            Về trang chủ </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>