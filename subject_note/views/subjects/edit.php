<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container" style="border: solid 3px; border-radius: 15px;">

            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Môn</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Trang cập nhật môn.</p>
                </div>
            </div>

            <div class="inner-wrapper row">
                <div class="col-md-12">

                    <form name="frm" id="frm" action="/subjects/<?=$this->e($subject['id'])?>" method="post" class="col-md-6 col-md-offset-3" style="margin-bottom: 7%;">

                          <!-- ma_subject -->

                        <div class="form-group<?=isset($errors['ma_subject']) ? ' has-error' : '' ?>">
                            <label for="ma_subject">Mã Môn</label>
                            <input type="text" name="ma_subject" class="form-control" maxlen="255" id="ma_subject" 
                                placeholder="Nhập mã môn" value="<?=$this->e($subject['ma_subject'])?>" />

                            <?php if (isset($errors['ma_subject'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['ma_subject'])?></strong>
                                </span>
                            <?php endif ?>                                
                        </div>

                        <!-- subject_name -->
                        <div class="form-group<?=isset($errors['subject_name']) ? ' has-error' : '' ?>">
                            <label for="subject_name">Tên Môn</label>
                            <input type="text" name="subject_name" class="form-control" maxlen="255" id="subject_name" 
                                placeholder="Enter subject_name" value="<?=$this->e($subject['subject_name'])?>" />

                            <?php if (isset($errors['subject_name'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['subject_name'])?></strong>
                                </span>
                            <?php endif ?>                                
                        </div>

                        <!-- teacher -->
                        <div class="form-group<?=isset($errors['teacher']) ? ' has-error' : '' ?>">
                            <label for="teacher">Tên Giảng viên</label>
                            <input type="text" name="teacher" class="form-control" maxlen="255" id="teacher" 
                                placeholder="Enter teacher" value="<?=$this->e($subject['teacher'])?>" />

                            <?php if (isset($errors['teacher'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['teacher'])?></strong>
                                </span>
                            <?php endif ?>                                  
                        </div>

                        <!-- so_chi -->
                            
                        <div class="form-group<?=isset($errors['so_chi']) ? ' has-error' : '' ?>">
                            <label for="so_chi">số tính chỉ</label>
                            <input type="number" name="so_chi" class="form-control" maxlen="255" id="so_chi" 
                                placeholder="Nhập vào số tính chỉ" value="<?=$this->e($subject['so_chi'])?>" />

                            <?php if (isset($errors['so_chi'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['so_chi'])?></strong>
                                </span>
                            <?php endif ?>                                  
                        </div>

                        <!-- Submit -->
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Cập nhật môn</button>
                        <a href="/subjects/view_subject "class="btn btn-danger"> Thoát</a>
                    </form>

                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
    <script>
        $(document).ready(function(){
            new WOW().init();
        });
    </script>
<?php $this->stop() ?>