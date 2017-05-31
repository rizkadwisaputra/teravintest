        <div class="row">
            <div class="panel panel-primary panel-home">
              <div class="panel-heading">
                <h3 class="panel-title">List User</h3>
              </div>
              <div class="panel-body">
              <?php 
                require_once "class/ClassUser.php";
                $cek = $user->cek_user();
                if ($cek == true) {
            ?>
                <table class="table" id="tableku">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                        if (isset($_GET['delete'])) {
                            if ($_GET['delete'] != "") {
                                $user->hapus_user($_GET['delete']);
                                echo "<script>location='index.php';</script>";
                            }
                        }
                        $dusr = $user->tampil_user();
                        foreach ($dusr as $key => $dt) {
                    ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $dt['nama']; ?></td>
                            <td><?php echo $dt['email']; ?></td>
                            <td width="20%">
                                <a href="index.php?page=view&id=<?php echo $dt['id_user']; ?>" class="btn btn-info btn-xs">VIEW</a>
                                <a href="index.php?delete=<?php echo $dt['id_user']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Lanjutkan hapus..!!');">DELETE</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }else{ ?>
                    <div class="alert alert-info">
                        <h4>Data User Kosong</h4>
                        <p>Silahkan menambahkan data user melalui button add..</p>
                    </div>
                <?php } ?>
              </div>
              <div class="panel-footer">
                <a href="index.php?page=add" class="btn btn-primary btn-add">ADD</a>
              </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
            $(".row").animateCss('fadeIn');
        });
        </script>