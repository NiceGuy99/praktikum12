<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from siswa");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
	<th>No</th>
	<th>Tanggal</th>
	<th>Nama</th>
	<th>Jenis Kelamin</th>
	<th>NISN</th>
	<th>NIK</th>
	<th>Tempat Lahir</th>
	<th>Tanggal Lahir</th>
	<th>No Registrasi</th>
	<th>Agama</th>
	<th>Berkebutuhan Khusus</th>
	<th>Alamat</th>
	<th>Rt</th>
	<th>Rw</th>
	<th>Dusun</th>
	<th>Desa</th>
	<th>Kecamatan</th>
	<th>Kode Pos</th>
	<th>Lintang</th>
	<th>Bujur</th>
	<th>Tempat Tinggal</th>
	<th>Transportasi</th>
	<th>No KKS</th>
	<th>Anak Ke</th>
	<th>Penerima KPS</th>
	<th>No KPS</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['tanggal'].");</td>
 <td>".$row['nama'].");</td>
 <td>".$row['jenis_kelamin'].");</td>
 <td>".$row['nisn'].");</td>
 <td>".$row['nik'].");</td>
 <td>".$row['tempat_lahir'].");</td>
 <td>".$row['tanggal_lahir'].");</td>
 <td>".$row['no_registrasi'].");</td>
 <td>".$row['agama'].");</td>
 <td>".$row['berkebutuhan_khusus'].");</td>
 <td>".$row['alamat'].");</td>
 <td>".$row['rt'].");</td>
 <td>".$row['rw'].");</td>
 <td>".$row['dusun'].");</td>
 <td>".$row['desa'].");</td>
 <td>".$row['kecamatan'].");</td>
 <td>".$row['kodepos'].");</td>
 <td>".$row['lintang'].");</td>
 <td>".$row['bujur'].");</td>
 <td>".$row['tempat_tinggal'].");</td>
 <td>".$row['transportasi'].");</td>
 <td>".$row['no_kks'].");</td>
 <td>".$row['anak_ke'].");</td>
 <td>".$row['penerima_kps'].");</td>
 <td>".$row['no_kps'].");</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('B0', 'potrait');
$dompdf->render();
$dompdf->stream('Pendaftaran_siswa.pdf');
?>