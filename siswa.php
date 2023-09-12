<?php 
include('koneksi.php');
?>

<?php session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>

<?php include('header.php')?>
  <?php include('sidebar.php')?>

  <div class="content-wrapper">
          <div class="row">
           
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">DATA SISWA</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>no.</th>
                          <th>nama</th>
                          <th>jenis kelamin</th>
                          <th>no telepon</th>
                          <th>alamat</th>
                          <th>kelas</th>  
                          <th>kota</th>                        
                          <th>aksi</th>
                         
                        </tr>
                        <?php
                                        $sql = "SELECT *, siswa.id as sid FROM siswa
                                                INNER JOIN kelas ON siswa.kelas_id=kelas.id
                                                INNER JOIN orangtua ON siswa.orangtua_id=orangtua.id
                                                INNER JOIN kota ON siswa.kota_id=kota.id";


                                        $data = mysqli_query($conn, $sql);


                                        $no = 1;
                                              foreach ($data as $key => $data) {
                                            
                          ?>

                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['nama'];?></td>
                          <td><?php echo $data['jk'];?></td>
                          <td><?Php echo $data['no_hp'];?></td>
                          <td><?php echo $data['alamat'];?></td>
                          <td><?php echo $data['nama_kelas'];?></td>
                          <td><?php echo $data['nama_kota']?></td>
                          <td>
                        <a href="hapus.php?id=<?php echo $data['sid']; ?>">hapus</a>
                        <a href="edit.php?id=<?php echo $data['sid']; ?>">edit</a>
                    </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>           
          </div>
        </div>
  <?php 
  include('footer.php')?>