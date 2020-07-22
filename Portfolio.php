<?php

include "functions.php";

$perpage = 3;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

$results = mysqli_query($koneksi, "SELECT * FROM daftar_kegiatan LIMIT $start, $perpage");

$hasil = mysqli_query($koneksi, "SELECT * FROM daftar_kegiatan");
$total = mysqli_num_rows($hasil);

$pages = ceil($total / $perpage);

//searching 

$keyword = "";
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $results = mysqli_query($koneksi, "SELECT * FROM daftar_kegiatan
                                        WHERE nama LIKE '%$keyword%' ");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Portfolio</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<div id="container">
		<center>
		<header>
		<h1>PORTOFOLIO</h1>
		</center>
	</div>

<div class="container2">
<hr>
<table class="table-container">
	<tr>
		<td class="profile">
		
			<h1 class="title">Profile</h1>
			<div>
				<img src="gambar/foto.jpg" alt="">
				<span>
				Tempat, Tanggal Lahir		: Yogyakarta, 14 juli 1995 <br>
				Agama 					: Islam <br>
				Jenis Kelamin					: Laki-Laki <br>
				Berat 			: 60 kg <br>
				Alamat			: Telaga Harmony Residence, block E2 no.8 Desa Sukasari RT07/RW015, Serang Baru, Bekasi, Jawa Barat. <br>
				<hr>
				Saya mudah beradaptasi, dapat bekerja keras, bekerja sama dalam tim, teliti, mudah berkomunikasi dengan orang lain
				serta senang mempelajari hal baru.
					
				</span>
			</div>
			
		</td>

		<td class="skill">
			<h1 class="title">Kemampuan</h1>

			<div class="content">
				
			<ul>
				
				<li>
					Design Grafis
					<div class="level" style="width: 60%">
						60%
					</div>
				</li>

				<li>
					Program Web
					<div class="level"  style="width: 50%">
						50%
					</div>
				</li>

				<li>
					Microsoft Office
					<div class="level"  style="width: 80%">
						80%
					</div>
				</li>

			</ul>

			</div>
			
		</td>
	</tr>
	<tr>
		<td class="profile">
			<h1 class="title">Pengalaman</h1>

			<div>
				Saya pernah bekerja sebagai operator produksi di beberapa perusahaan.
			</div>
			
			<table class="table">
				<tr>
					<th>No</th>
					<th>Nama Perusahaan</th>
					<th>Year</th>
				</tr>

				<tr>
					<td>1</td>
					<td>CV. KARYA HIDUP SENTOSA</td>
					<td>2013 - 2015</td>

				</tr>
				<tr>
					<td>2</td>
					<td>PT. SUZUKI INDOMOBIL MOTOR</td>
					<td>2015 - 2020</td>
				</tr>
			</table>
		</td>

		<td class="profile">
			<h1 class="title">Pendidikan</h1>

			<div>
				Beberapa pengalaman sekolah saya.
			</div>
			
			<table class="table">
				<tr>
					<th>No</th>
					<th>Nama Sekolah</th>
					<th>Tahun</th>
				</tr>

				<tr>
					<td>1</td>
					<td>SD N 1 SUDIMORO</td>
					<td>2001-2006</td>

				</tr>

				<tr>
					<td>2</td>
					<td>SMP N 1 PAJANGAN</td>
					<td>2006-2009</td>

				</tr>

				<tr>
					<td>3</td>
					<td>SMK N 1 SEDAYU</td>
					<td>2009-2013</td>

				</tr>

				<tr>
					<td>2</td>
					<td>Universitas Pelita Bangsa</td>
					<td>2018-2019</td>
				</tr>

				
			</table>
		</td>
	</tr>
	<tr>
		<td class="profile">

			<h1 class="title">HOBBY</h1>
			<div>
			<table class="table">
				<tr><td>Voly Ball</td>	</tr>
				<tr><td>Drawing/Skecth </td>	</tr>
				<tr><td>Editing Video </td>	</tr>
				<tr><td>Hiking </td> </tr>
		
					
				</div>
				</table>

		<td class="kontak">

			<h1 class="title">Kontak Personal</h1>
			<div>
				<p><img src="gambar/wa.png" align="left">
				: 087839174319 </p>
				<p><img src="gambar/email.jfif" align="left">
				: Wahyu.zuly95@gmail.com </p>
				<p><img src="gambar/fb.jfif" align="left">
				: Wahyoeyuliyanto@yahoo.co.id </p>
				<p><img src="gambar/twitter.png" align="left">
				: @wahyu_zuly </p>
		</table>

		<td class="profile">

			<h1 class="title">Kegiatan</h1>
		

		 <form action="" method="post">
                <input type="text" name="keyword" id="keyword" class="myInput" size="40" autocomplete="off" placeholder="masukan keyword nama">
                <button type="submit" name="cari" class="cari">Cari ! </button>
            </form>

            <table>
                <tr class="table">
                    <th style="width:5%;">No</th>
                    <th>nama</th>
                    <th>tangal</th>
                    <th>keterangan</th>
                  
                </tr>
                <tr>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($results)) : ?>
                        <td><?= $i; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["keterangan"]; ?></td>
                       

                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>


            </table>
            <div class="paginate">
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <?php if ($i == $page) : ?>
                        <a href="?halaman=<?= $i ?>" style="font-weight : bold; color: red;"><?= $i ?></a>
                    <?php else : ?>
                        <a href="?halaman=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

        </div>



    </div>

    </div>
    </table>
    </div>
<center>
<footer class="panel-footer">
				&copy; Wahyu Yuliyanto <br> Mahasiswa Uniersitas PelitaBangsa
	</footer>
	</center>
</body>
</html>