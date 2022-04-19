<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container"style="border: solid 3px; border-radius: 15px;">
    <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Trang chủ</h2>
            <div class="row">
                <!-- <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">View your all contacs here.</p>
                </div> -->
            </div>

            <div class="inner-wrapper row">
                <div class="col-md-12">
                
                    <!-- FLASH MESSAGES HERE -->

                    <a href="/subjects/view_subject" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-eye"></i> Xem tất cả môn</a>
                    <a href="/notes/view_note" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-eye"></i> Xem tất cả ghi chú</a>

                    <!-- Table Starts Here -->
                    <table id="subjects" class="table table-bordered table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Mã môn</th>
                                <th>Tên môn</th>
                                <th>Giảng viên</th>
                                <th>Số chỉ</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($subjects as $subject): ?>
                            <?php foreach($notes as $note): ?>
                            <?php if( $subject->ma_subject === $note->ma_Mon):?>
                            <tr>
                                <td><?=$this->e($subject->ma_subject)?></td>
                                <td><?=$this->e($subject->subject_name)?></td>
                                <td><?=$this->e($subject->teacher)?></td>
                                <td><?=$this->e($subject->so_chi)?></td>
                                <td><?=$this->e($note->note)?></td>
                            </tr>  
                            <?php endif ?>
                            
                            <?php endforeach ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- Table Ends Here -->
                </div>
            </div>
    </section>
</div>


<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <script>
        $(document).ready(function(){
            new WOW().init();
            
            $('#subjects').DataTable();  
            
            $('button[name="delete-subject"]').on('click', function(e){
                const $form = $(this).closest('form');
                e.preventDefault();
            $('#delete-confirm').modal({ backdrop: 'static', keyboard: false })
                .one('click', '#delete', function() {
                $form.trigger('submit');
                });
            });
        });
        
    </script>
<?php $this->stop() ?>
