<main>
    <div class="dashboard-container-sanpham">
        <div class="card detail">
            <div class="detail-header">
                <h2>Tin tức</h2>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal-them">
                    <i class="fa-solid fa-plus"></i> Thêm
                </button>
            </div>

            <!-- Modal Thêm -->
            <div class="modal fade" id="myModal-them">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm tin tức</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="admin/tintuc/them-tintuc.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="them_anh1" class="form-label">Ảnh 1</label>
                                            <input class="form-control" type="file" id="them_anh1" placeholder="Chọn hình ảnh" name="them_anh1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_tieude1">Tiêu đề 1</label>
                                            <input type="text" class="form-control" id="them_tieude1" placeholder="Tên tiêu đề 1" name="them_tieude1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_anh2" class="form-label">Ảnh 2</label>
                                            <input class="form-control" type="file" id="them_anh2" placeholder="Chọn hình ảnh" name="them_anh2">
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_tieude2">Tiêu đề 2</label>
                                            <input type="text" class="form-control" id="them_tieude2" placeholder="Tên tiêu đề 2" name="them_tieude2">
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_anh3" class="form-label">Ảnh 3</label>
                                            <input class="form-control" type="file" id="them_anh3" placeholder="Chọn hình ảnh" name="them_anh3">
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_tieude3">Tiêu đề 3</label>
                                            <input type="text" class="form-control" id="them_tieude3" placeholder="Tên tiêu đề 3" name="them_tieude3">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="them_noidung1">Nội dung 1</label>
                                            <textarea class="form-control" rows="5" id="them_noidung1" name="them_noidung1"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_noidung2">Nội dung 2</label>
                                            <textarea class="form-control" rows="4" id="them_noidung2" name="them_noidung2"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="them_noidung3">Nội dung 3</label>
                                            <textarea class="form-control" rows="5" id="them_noidung3" name="them_noidung3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Thêm</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Sửa -->
            <?php
            require_once(__DIR__ . '/../config_data/config.php');
            $lietkett_sql = "SELECT * FROM tbl_tintuc";
            $result = mysqli_query($conn, $lietkett_sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $newsId = $row['id_tintuc'];
            ?>
                <div class="modal fade" id="myModal-sua-<?php echo $row['id_tintuc']; ?>">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sửa tin tức</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="admin/tintuc/sua-tintuc.php" method="post" enctype="multipart/form-data" id="<?php echo $newsId; ?>">
                                    <input type="hidden" name="nid" value="<?php echo $newsId; ?>">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="sua_anh1" class="form-label">Ảnh 1</label>
                                                <input class="form-control" type="file" src="admin/tintuc/upload/<?php echo $row['anh1']; ?>" id="sua_anh1" placeholder="Chọn hình ảnh" name="sua_anh1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_tieude1">Tiêu đề 1</label>
                                                <input type="text" class="form-control" value="<?php echo $row['tieude1']; ?>" id="sua_tieude1" placeholder="Tên tiêu đề 1" name="sua_tieude1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_anh2" class="form-label">Ảnh 2</label>
                                                <input class="form-control" type="file" src="admin/tintuc/upload/<?php echo $row['anh2']; ?>" id="sua_anh2" placeholder="Chọn hình ảnh" name="sua_anh2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_tieude2">Tiêu đề 2</label>
                                                <input type="text" class="form-control" value="<?php echo $row['tieude2']; ?>" id="sua_tieude2" placeholder="Tên tiêu đề 2" name="sua_tieude2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_anh3" class="form-label">Ảnh 3</label>
                                                <input class="form-control" type="file" src="admin/tintuc/upload/<?php echo $row['anh3']; ?>" id="sua_anh3" placeholder="Chọn hình ảnh" name="sua_anh3">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_tieude3">Tiêu đề 3</label>
                                                <input type="text" class="form-control" value="<?php echo $row['tieude3']; ?>" id="sua_tieude3" placeholder="Tên tiêu đề 3" name="sua_tieude3">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="sua_noidung1">Nội dung 1</label>
                                                <textarea class="form-control" rows="5" id="sua_noidung1" name="sua_noidung1"><?php echo $row['noidung1']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_noidung2">Nội dung 2</label>
                                                <textarea class="form-control" rows="4" id="sua_noidung2" name="sua_noidung2"><?php echo $row['noidung2']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sua_noidung3">Nội dung 3</label>
                                                <textarea class="form-control" rows="5" id="sua_noidung3" name="sua_noidung3"><?php echo $row['noidung3']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <!-- Modal Xóa -->
            <div class="modal fade" id="myModal-xoa">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="border: none;">
                            <h5 class="modal-title">Xác nhận xóa ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="admin/tintuc/xoa-tintuc.php" method="post">
                                <p style="padding-left: 40px; font-size: 20px;">Bạn chắc chắn muốn xóa ?</p>
                                <div class="modal-footer" style="border: none;">
                                    <button type="submit" class="btn btn-success" name="luu">Đồng ý</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table>
                <tr>
                    <th>Mã tin tức</th>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Tùy chọn</th>
                </tr>
                <?php
                require_once(__DIR__ . '/../config_data/config.php');
                $lietkett_sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc";
                $result = mysqli_query($conn, $lietkett_sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td style="width: 200px;">PV-TT<?php echo $row['id_tintuc']; ?></td>
                        <td style="width: 250px;">
                            <img class="img-tintuc" style="max-width: 60px; max-height: 95px;" src="admin/tintuc/upload/<?php echo $row['anh1']; ?>" alt="<?php echo $row['tieude1']; ?>">
                        </td>
                        <td style="padding-right: 50px;"><?php echo $row['tieude1']; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#myModal-sua-<?php echo $row['id_tintuc']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#myModal-xoa" data-id="<?php echo $row['id_tintuc']; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</main>

<!-- Xoá -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var tintucId = button.getAttribute('data-id');
                var modal = document.getElementById('myModal-xoa');
                var form = modal.querySelector('form');
                form.setAttribute('action', 'admin/tintuc/xoa-tintuc.php?nid=' + tintucId);
            });
        });
    });
</script>