<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php $this->start("page") ?>
<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<div style="text-align:center">
    <img src="../css/pic/animation-welcome.gif" style=" width:500px">


<div class="container" style="background-image: url(../css/pic/bg.webp); border: solid 3px; border-radius: 15px;   width: 700px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background: rgba(0,0,0,0.0)" >
            <!-- FLASH MESSAGES HERE -->
            
            <div class="panel panel-default" style="background: rgba(0,0,0,0.0); border: none;">
                <div class="panel-heading" style="background: rgba(0,0,0,0.0); border: none; " ><h1>Login</h1></div>
                <div class="panel-body">               

                    <form class="form-horizontal" role="form" method="POST" action="/login">
                        
                        <div class="form-group <?=isset($errors['email']) ? 'has-error' : '' ?>">
                            <label for="email" class="col-md-4 control-label">Địa chỉ Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" 
                                    value="<?=isset($old['email']) ? $this->e($old['email']) : '' ?>" required autofocus>

                                <?php if (isset($errors['email'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['email'])?></strong>
                                    </span>
                                <?php endif ?>                               
                            </div>
                        </div>

                        <div class="form-group <?=isset($errors['password']) ? 'has-error' : '' ?>">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if (isset($errors['password'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password'])?></strong>
                                    </span>
                                <?php endif ?>                                  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit"class="btn btn-success" style="border-radius: 100px;">
                                    Đăng nhập
                                </button>

                                <a class="btn btn-link" href="/register" style="color: black">
                                    <h4>Tạo tài khoản ? </h4>
                                </a>
                            </div>
                        </div>
                        <div>
                            <p>
                                    <h4>Để sử dụng được trang này bạn cần phải đăng nhập hoặc ấn vào <a href="register">Tạo tài khoản</a> nếu bạn chưa có tài khoản..</h4>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->stop() ?>
