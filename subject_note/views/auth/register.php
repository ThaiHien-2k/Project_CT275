<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container" style="background-image: url(../css/pic/bg.webp); border: solid 3px; border-radius: 15px;   width: 700px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background: rgba(0,0,0,0.0); border: none;">
                <div class="panel-heading"style="background: rgba(0,0,0,0.0); border: none;"><h1>Register</h1></div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/register">

                        <div class="form-group<?=isset($errors['name']) ? ' has-error' : '' ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" 
                                    value="<?=isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus>

                                <?php if (isset($errors['name'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['name'])?></strong>
                                    </span>
                                <?php endif ?>                                  
                            </div>
                        </div>

                        <div class="form-group<?=isset($errors['email']) ? ' has-error' : '' ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" 
                                    value="<?=isset($old['email']) ? $this->e($old['email']) : '' ?>" required>

                                <?php if (isset($errors['email'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['email'])?></strong>
                                    </span>
                                <?php endif ?>       
                            </div>
                        </div>

                       <div class="form-group<?=isset($errors['password']) ? ' has-error' : '' ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if (isset($errors['password'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password'])?></strong>
                                    </span>
                                <?php endif ?>                                  
                            </div>
                        </div>

                       <div class="form-group<?=isset($errors['password_confirmation']) ? ' has-error' : '' ?>">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                <?php if (isset($errors['password_confirmation'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password_confirmation'])?></strong>
                                    </span>
                                <?php endif ?>                                  
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success" style="border-radius: 100px;">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>
