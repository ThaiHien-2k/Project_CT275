<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">

            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">notes</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Add your notes here.</p>
                </div>
            </div>

            <div class="inner-wrapper row">
                <div class="col-md-12">

                    <form name="frm" id="frm" action="/notes/note" method="post" class="col-md-6 col-md-offset-3">



                    
<div class="control-group <?=isset($errors['ma_Mon']) ? ' has-error' : '' ?>">
<label  for="ma_Mon">Mã môn</label>
<div class="controls">
<select name="ma_Mon" class="span8 tip form-control" onChange=""  required>
<option value="">Chọn mã môn</option> 
<?php
$con = new mysqli('localhost','root', '', 'subject_note');
 $query=mysqli_query($con,"select * from subjects");
while($row=mysqli_fetch_array($query))
{?>

<option value=" <?=isset($row['ma_subject']) ? $this->e($row['ma_subject']) : '' ?>"><?php echo $row['ma_subject'];?></option>
<?php } ?>
</select>

<?php if (isset($errors['ma_Mon'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['ma_Mon'])?></strong>
                                </span>
                            <?php endif ?>      
</div>
</div>

                        <!-- Name -->
                        <!-- <div class="form-group<?=isset($errors['ma_Mon']) ? ' has-error' : '' ?>">
                            <label for="ma_Mon">Mã môn</label>
                            <input type="text" name="ma_Mon" class="form-control" maxlen="255" id="ma_Mon" placeholder="Enter ma_Mon" 
                                value="<?=isset($old['ma_Mon']) ? $this->e($old['ma_Mon']) : '' ?>" />

                            <?php if (isset($errors['ma_Mon'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['ma_Mon'])?></strong>
                                </span>
                            <?php endif ?>                                 
                        </div>                                  -->
                       
                        <!-- Description -->
                        <div class="form-group<?=isset($errors['note']) ? ' has-error' : '' ?>">
                            <label for="description">Notes </label>
                            <textarea name="note" id="note" class="form-control" 
                                placeholder="Enter note (maximum character limit: 255)"><?=isset($old['note']) ? $this->e($old['note']) : '' ?></textarea>

                            <?php if (isset($errors['note'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['note'])?></strong>
                                </span>
                            <?php endif ?>                                 
                        </div>
                    
                        <!-- Submit -->
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Add note</button>
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
