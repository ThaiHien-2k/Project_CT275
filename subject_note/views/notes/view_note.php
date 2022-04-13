<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container">
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

                    <a href="/notes/add" class="btn btn-primary" style="margin-bottom: 30px;">
                        <i class="fa fa-plus"></i> Thêm ghi chú</a>

                    <!-- Table Starts Here -->
                    <table id="notes" class="table table-bordered table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Mã môn</th>
                                <th>Ghi chú</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($notes as $note): ?>
                            <tr>
                            <td><?=$this->e($note->ma_Mon)?></td>
                                <td><?=$this->e($note->note)?></td>

                                <td><a href="/notes/edit/<?=$note->id?>"class="btn btn-xs btn-warning">
                                    <i alt="Edit" class="fa fa-pencil"> Edit</i></a>
                                    <form class="delete" action="/notes/delete/<?=$note->id?>"method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-xs btn-danger"name="delete-note">
                                    <i alt="Delete" class="fa fa-trash"> Delete</i>
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
<div id="delete-confirm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác Nhận</h4>
            </div>
            <div class="modal-body">Bạn có muốn xóa môn này?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal"
                    class="btn btn-danger" id="delete">Delete</button>
                <button type="button" data-dismiss="modal"
                    class="btn btn-default">Cancel</button>
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
            
            $('#notes').DataTable();  
            
            $('button[name="delete-note"]').on('click', function(e){
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
