<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penelitian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_penelitian');
		$this->load->helper(array('form','url'));

	}


	public function index()
	{
		$isi['content']		= 'admin/barang/content_penelitian';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data penelitian';
		$isi['data'] 		= $this->db->query('SELECT * FROM `u_tblpenelitian` INNER JOIN a_tblsdm ON u_tblpenelitian.idsdm=a_tblsdm.idsdm
		');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/barang/tambah_penelitian';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data penelitian';
		$isi['kt']			= $this->Model_penelitian->get_ktgori();
		$this->load->view('admin/index',$isi);
	}

	public function update($id_barang)
	{
		$isi['content']		= 'admin/barang/update_penelitian';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data peneitian';
		$where 				= array('idpenelitian' => $idpenelitian);
		$isi['kt']			= $this->Model_penelitian->get_ktgori();
		$isi['barang']		= $this->Model_penelitian->edit_data($where,'penelitian')->result();
		$this->load->view('admin/index',$isi);
	}

	public function simpan()
	{
		$nmsdm				= $this->input->post('nmsdm');
		$judul				= $this->input->post('judul');
		$jeniskarya 		= $this->input->post('jeniskarya');
		$sumberbiaya   		= $this->input->post('sumberbiaya');
		$coverpenelitian	= $this->input->post('coverpenelitian');

		$data = array(
					'nmsdm'				=> $nmsdm,
					'judul'				=> $judul,
					'jeniskarya' 		=> $jeniskarya,
					'sumberbiaya'		=> $sumberbiaya,
					'coverpenelitian'	=> $coverpenelitian,

			);
		$this->Model_barang->input_data($data,'u_tblpenelitian');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data barang berhasil."); window.location.href="<?php echo base_url();?>admin/penelitian"</script> <?php
	}

	public function hapus($idpenelitian)
	{
		$where = array('idpenelitian' => $idpenelitian);
		$this->Model_barang->hapus_data($where,'u_tblpenelitian');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data barang berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/penelitian"</script> <?php
	}

	public function edit(){
		$nmsdm				= $this->input->post('nmsdm');
		$judul				= $this->input->post('judul');
		$jeniskarya 		= $this->input->post('jeniskarya');
		$sumberbiaya   		= $this->input->post('sumberbiaya');
		$coverpenelitian	= $this->input->post('coverpenelitian');

		$data = array(
					'nmsdm'				=> $nmsdm,
					'judul'				=> $judul,
					'jeniskarya' 		=> $jeniskarya,
					'sumberbiaya'		=> $sumberbiaya,
					'coverpenelitian'	=> $coverpenelitian,
			);
	$where = array(
		'idpenelitian' => $idpenelitian
	);

	$this->Model_barang->update_data($where,$data,'penelitian');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>/admin/idpenelitian"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */