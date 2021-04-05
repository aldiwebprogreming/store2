<?php 

	/**
	 * 
	 */
	class Ebunga extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->model('Main_model');
		}

		function index()

		{
			$data['prov'] = $this->db->get('provinsi')->result_array();
			$this->load->view('home', $data);
		}


		function data_kel(){
			$searchTerm = $this->input->post('searchTerm');
			
			$response = $this->Main_model->getUsers($searchTerm);	
			echo json_encode($response);
	
		}

	
		function get_kec(){

		 	$id = $this->input->get('id');

		 	$data = $this->db->get_where('tbl_kecamatan', array('id_kec' => $id))->result_array();
		 	echo json_encode($data);

		 	foreach ($data as $val) {}

		 	if ($val['nama'] == 'Bakongan') {
		 		
		 	}

		}

		function get_kab(){

		 	$id = $this->input->get('id');

		 	$kab = $this->db->get_where('tbl_kabupaten', array('id_kab' => $id))->result_array();
		 	echo json_encode($kab);
		}

		function get_prov(){

		 	$id = $this->input->get('id');

		 	$prov = $this->db->get_where('tbl_provinsi', array('id_prov' => $id))->result_array();
		 	echo json_encode($prov);
		}


		function product(){
			echo "hello";
			// $id = $this->input->get('id');
			// $data['get_product'] = $this->db->get_where('tbl_store', array('id' => $id ))->result_array();

			// $this->load->view('det_product', $data);
		}


		function post_action(){

			// $nama = $this->input->post('kec');
			// $qly = $this->input->post('qlt');
			// $alamat = $this->input->post('alamat_penerima');
			// $data = array(
			// 	        'id'      =>$nama ,
			// 	        'qty'     => $qly,
			// 	        'price'   => 39.95,
			// 	        'name'    => $alamat
	
			// 	);
			// 		// var_dump($data);
			// 	 $this->cart->insert($data);
				

			// 	$this->load->view('tabel_keranjang');
			// if ($this->input->post('kirim')) {
				
			// 	$data = [

			// 	'no_tlp' =>$this->input->post('telp_penerima'),
			// 	'kel' =>$this->input->post('kel'),
			// 	'kec' =>$this->input->post('kec'),
			// 	'kab' =>$this->input->post('kab'),
			// 	'prov' => $this->input->post('prov'),
			// 	'order' =>'',
			// 	'qlt' =>$this->input->post('qlt'),
			// 	'harga' =>'',
			// 	'harga_total' =>'',
			// 	'keterangan' =>$this->input->post('note'),
			// 	'nama_penerima' =>$this->input->post('nama_penerima'),
			// 	'email_penerima' =>$this->input->post('email_penerima'),
			// 	'alamat_penerima' =>$this->input->post('alamat_penerima'),
			// 	'nama_item' =>$this->input->post('nama_item'),
			// 	'text_item' =>$this->input->post('text_item'),
			// 	'dari' =>$this->input->post('dari')

			// 	];

			// 	$input = $this->db->insert('tbl_order_store', $data);
			// 	if ($input) {
			// 		redirect('ebunga/cart');
			// 	} else {
			// 		echo "gagal";
			// 	}
			// }

		}


		function cart(){

			$data['cart'] = $this->db->query("SELECT * FROM tbl_order_store ORDER BY id DESC LIMIT 1")->result_array();

			$this->load->view('cart', $data);


		}


		function get_provinsi(){

			$id = $this->input->get('id');
			$data = $this->db->get_where('provinsi',array('id' => $id))->result_array();
			echo json_encode($data);
		}


		function get_kelurahan(){

			$kel = $this->db->get('provinsi')->result_array();
			echo json_encode($kel);
		}


		function get_produk(){
				
			$id = $this->input->get('id');
		
			$data = $this->db->get_where('tbl_store',array('id_kelurahan' =>$id))->result_array();
			echo json_encode($data);
			
		}


		function detail($slug){

			$id = $slug;
			
			$data['detail'] = $this->db->get_where('tbl_store',  array('slug' => $id))->result_array();	
			$add = $this->db->get_where('tbl_store', array('slug' =>$id))->result_array();
			foreach ($add as $key) {};
			$id_kel = $key['id_kelurahan'];
			$data['get_add'] = $this->db->get_where('provinsi', array('ID' => $id_kel))->result_array(); 
			
			$this->load->view('detail_produk', $data);

		}

		function view_order(){

			$id_produk = $this->input->post('id_produk');
			$nama_produk = $this->input->post("nama_produk");
			$qty = $this->input->post("qty");
			$harga = $this->input->post("harga");
			$catatan = $this->input->post('note');
			$papan_bunga = $this->input->post('tulisan_papanbunga');
			$kel =$this->input->post('kel');
			$kec =$this->input->post('kec');
	 		$kab =$this->input->post('kab');
			$prov = $this->input->post('prov');
			$alamat_penerima = $this->input->post('alamat_penerima');
			$nama_penerima = $this->input->post('nama_penerima');
			$email_penerima = $this->input->post('email_penerima');
			$telp_penerima = $this->input->post('telp_penerima');

	
			$data = array(
				        'id'      => $id_produk,
				        'qty'     => $qty,
				        'price'   => $harga,
				        'name'    => $nama_produk,
				        'note' 	=> $catatan,
				        'kel' 	=> $kel,
				        'kec' 	=> $kec,
				        'kab'  => $kab,
				        'prov' => $prov,
				        'alamat_penerima' => $alamat_penerima,
				        'nama_penerima' => $nama_penerima,
				        'email_penerima' => $email_penerima,
				        'telp_penerima' => $telp_penerima,
	
				);

			 $this->cart->insert($data);

			 $this->load->view('det_product');




		}
	}

 ?>