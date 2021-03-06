<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container" style="border: solid 3px; border-radius: 15px;;">
    <section id="inner" class="inner-section section">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Môn Học</h2>
            <div class="row">
                <!-- <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">View your all contacs here.</p>
                </div> -->
            </div>

            <div class="inner-wrapper row">
                <div class="col-md-12">
                
                    <!-- FLASH MESSAGES HERE -->
                    <a href="/home" class="btn btn-primary" style="margin-bottom: 30px;">
                    <i class="fa-solid fa-house"></i> Trang chủ</a>
                    <a href="/notes/view_note" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-eye"></i> Xem ghi chú</a>
                    <a href="/subjects/add" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-plus"></i> Thêm Môn</a>
                    

                    <!-- Table Starts Here -->
                    <table id="subjects" class="table table-bordered table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Mã môn</th>
                                <th>Tên môn</th>
                                <th>Giảng viên</th>
                                <th>Số chỉ</th>
                                <th>Sửa/Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($subjects as $subject): ?>
                            <tr>
                            <td><?=$this->e($subject->ma_subject)?></td>
                                <td><?=$this->e($subject->subject_name)?></td>
                                <td><?=$this->e($subject->teacher)?></td>
                                <td><?=$this->e($subject->so_chi)?></td>
                                <td><a href="/subjects/edit/<?=$subject->id?>"class="btn btn-xs btn-warning">
                                    <i class="fa-solid fa-pen"></i> Sửa</i></a>
                                    <form class="delete" action="/subjects/delete/<?=$subject->id?>"method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-xs btn-danger"name="delete-subject">
                                    <i class="fa-solid fa-trash"></i> Xóa</i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- Table Ends Here -->
                </div>
            </div>
    </section>
</div>
<div id="delete-confirm" class="modal fade" role="dialog" >
    <div class="modal-dialog" style="border: solid black 1px; border-radius: 5px">
        <div class="modal-content">
            <div class="modal-header"style="background-image: url(../css/pic/bg.webp)">
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <h4 class="modal-title" >Xác Nhận</h4>
            </div>
            <div class="modal-body"><h4>Bạn có muốn xóa môn này ?</h4></div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal"
                    class="btn btn-danger" id="delete">Xóa</button>
                <button type="button" data-dismiss="modal"
                    class="btn btn-default">Hủy</button>
            </div>
        </div>
    </div>
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
