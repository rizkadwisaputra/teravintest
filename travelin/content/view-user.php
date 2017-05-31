        <div class="row">
            <div class="panel panel-primary panel-home">
              <div class="panel-heading">
                <h3 class="panel-title">Detail User</h3>
              </div>
              <div class="panel-body">
                <table class="table" id="tableku">
                <?php  
                    require_once "class/ClassUser.php";
                    $dt = $user->ambil_user($_GET['id']);
                    $dtal = $user->tampil_alamat($_GET['id']);
                ?>
                    <tbody>
                    <tr>
                        <td width="15%">Nama</td>
                        <td width="1%">:</td>
                        <td><?php echo $dt['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Email</td>
                        <td width="1%">:</td>
                        <td><?php echo $dt['email']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">No Hp</td>
                        <td width="1%">:</td>
                        <td><?php echo $dt['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Alamat</td>
                        <td width="1%">:</td>
                        <td>
                            <?php  
                            foreach ($dtal as $key => $dt) {
                                echo $dt['alamat']."<br/>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
              </div>
              <div class="panel-footer">
                <a href="index.php" class="btn btn-primary btn-add">Back</a>
              </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
            $(".row").animateCss('fadeIn');
        });
        </script>