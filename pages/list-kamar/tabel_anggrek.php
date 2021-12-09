<?php
	require 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
    <title>Tamu Wisma Anggrek</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Tamu Wisma Anggrek</h2>
				</div>
                <div class="col-md-6 text-center mb-5">
                    <form action="tabel_anggrek.php" method="GET">
                        <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
                        <input type="submit" value="cari">
                        <input type="radio" name="kategori" value="carikamar" checked>
                        <label for="kamar">Nomor Kamar</label>
                        <input type="radio" name="kategori" value="caristatusco">
                        <label for="statusco">Status Check Out</label> <br>
                        <a href="tabel_anggrek.php"><i class="fa fa-refresh"></i>Reset</a>
                    </form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						    <thead class="thead-dark">
                                <tr>
                                <th>Timestamp</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Status Check Out</th>
                                <th>Nama Tamu</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Kabupaten / Kota</th>
                                <th>Jabatan</th>
                                <th>Nama Kantor</th>
                                <th>No. HP</th>
                                <th>No. Kamar</th>
                                <th>&nbsp;</th>
                                </tr>
						    </thead>
						    <tbody>
                                <?php
                                        $hal=26;
                                        $page=isset($_GET['hal'])?(int)$_GET['hal']:1;
                                        $start=($page>1)?($page*$hal)-$hal:0;
                                        if(isset($_GET['cari'])){
                                            $cari = $_GET['cari'];
                                            echo "Hasil Pencarian : ".$cari;
                                        }
                                        if(isset($_GET['cari'])){
                                            $cari = $_GET['cari'];
                                            $sql = "SELECT * FROM anggrek WHERE nomor_kamar like '%".$cari."%'";
                                            $sql1 = "SELECT * FROM anggrek WHERE nomor_kamar LIKE '%$cari%' limit $start,$hal";
                                        } else {
                                            $sql = "SELECT * FROM anggrek";
                                            $sql1 = "SELECT * FROM anggrek limit $start,$hal";
                                        }

                                        if (isset($_GET['cari']) && isset($_GET['kategori'])) {
                                                $cari = $_GET['cari'];
                                                if ($_GET['kategori'] == 'carikamar') {
                                                    $sql = "SELECT * FROM anggrek WHERE nomor_kamar LIKE '%$cari%'";
                                                    $sql1 = "SELECT * FROM anggrek WHERE nomor_kamar LIKE '%$cari%' limit $start,$hal";
                                                    $sql2 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                                } else {
                                                    $sql = "SELECT * FROM anggrek WHERE statusco LIKE '%$cari%'";
                                                    $sql1 = "SELECT * FROM anggrek WHERE statusco  LIKE '%$cari%' limit $start,$hal";
                                                    $sql2 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                                    }  
                                            } else {
                                                $sql = "SELECT * FROM anggrek";
                                                $sql1 = "SELECT * FROM anggrek limit $start,$hal";
                                                $sql2 = "SELECT * FROM anggrek WHERE statusco='Kosong'";
                                            }
                                            $query = mysqli_query($db, $sql);
                                            $query1 = mysqli_query($db, $sql1);
                                            $query2 = mysqli_query($db, $sql2);
                                            $total = mysqli_num_rows($query);
                                            $pages = ceil($total/$hal);
                                            $no = $start + 1;
                                ?>
                                <?php while($list=mysqli_fetch_array($query1)) : 
                                //$no++; 
                                ?> 
                                <tr class="alert" role="alert">
                                    <td><?= $list['timestamp']; ?></td>
                                    <td><?= $list['nama_kegiatan']; ?></td>
                                    <td><?= $list['tanggal_awal']; ?></td>
                                    <td><?= $list['tanggal_akhir']; ?></td>
                                    <td><?= $list['statusco']; ?></td>
                                    <td><?= $list['nama_tamu']; ?></td>
                                    <td><?= $list['nik']; ?></td>
                                    <td><?= $list['jenis_kelamin']; ?></td>
                                    <td><?= $list['tanggal_lahir']; ?></td>
                                    <td><?= $list['kota']; ?></td>
                                    <td><?= $list['jabatan']; ?></td>
                                    <td><?= $list['nama_kantor']; ?></td>
                                    <td><?= $list['no_hp']; ?></td>
                                    <td><?= $list['nomor_kamar']; ?></td>
                                    <td>
                                        <a class="edit" aria-label="close" href="form_anggrek.php?nomor_kamar=<?=$list['nomor_kamar']; ?>" onclick="return edit(event)">
                                        <span aria-hidden="true"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <script type="text/javascript">
  					    	function edit(ev){
                                            		ev.preventDefault();
                                            		var urlToRedirect = ev.currentTarget.getAttribute('href'); 
                                            		console.log(urlToRedirect);
					    		Swal.fire({
  							title: 'Yakin akan memilih kamar ini?',
                                            		icon: "question",
  							showCancelButton: true,
							confirmButtonText: 'Ya',
						}).then((result) => {
							if (result.isConfirmed) {
								window.location.href = urlToRedirect;
							}
						})
						}
					</script>
                                        <a class="edit" aria-label="close" href="hapus_anggrek.php?nomor_kamar=<?=$list['nomor_kamar']; ?>" onclick="return hapus(event)">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                        </a>
					<script type="text/javascript">
  					    	function hapus(ev){
                                    		ev.preventDefault();
                                    		var urlToRedirect = ev.currentTarget.getAttribute('href'); 
                                    		console.log(urlToRedirect);
					        Swal.fire({
  				                    	title: 'Data akan terhapus!',
                                            		icon: "warning",
  				                    	showCancelButton: true,
							confirmButtonText: 'Ya',
						        }).then((result) => {
								if (result.isConfirmed) {
									window.location.href = urlToRedirect;
							        }
						        })
						}
					</script>
                                    </td>
                                </tr>
							    <?php endwhile; ?>
						    </tbody>
						</table>
                        <!-- Pagination -->
                        <?php for( $i = 1 ; $i <= $pages ; $i++ ) : ?>
                                <?php if(isset($_GET["cari"])) : ?>
                                    <a href="?cari=<?= $_GET['cari']; ?>&hal=<?= $i; ?>">
                                    <?= $i; ?></a>
                                <?php else : ?>
                                    <a href="?&hal=<?= $i; ?>">
                                    <?= $i; ?></a>
                                <?php endif; ?>
                                
                        <?php endfor; ?>
                        <p>Total Data : <?= mysqli_num_rows($query); ?></p>
                        <p>Jumlah Kamar Kosong : <?= mysqli_num_rows($query2); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<!-- JS SWEETALERT -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>