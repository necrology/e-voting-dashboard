<?php
class M_pengumuman extends CI_Model{

	function get_all_pengumuman(){
		$hsl=$this->db->query("SELECT * FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	}
	function simpan_pengumuman($judul,$isi){
		$hsl=$this->db->query("INSERT INTO tbl_pengumuman(pengumuman_judul,pengumuman_isi) values ('$judul','$isi')");
		return $hsl;
	}
	function get_pengumuman_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_pengumuman where pengumuman_id='$kode'");
		return $hsl;
	}
	function update_pengumuman($pengumuman_id,$judul,$isi){
		$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_isi='$isi' where pengumuman_id='$pengumuman_id'");
		return $hsl;
	}
	function update_pengumuman_tanpa_img($pengumuman_id,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("update tbl_pengumuman set pengumuman_judul='$judul',pengumuman_isi='$isi',pengumuman_kategori_id='$kategori_id',pengumuman_kategori_nama='$kategori_nama',pengumuman_pengguna_id='$user_id',pengumuman_author='$user_nama',pengumuman_slug='$slug' where pengumuman_id='$pengumuman_id'");
		return $hsl;
	}
	function hapus_pengumuman($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengumuman WHERE pengumuman_id='$kode'");
		return $hsl;
	}

	function hapus_semua_data(){
		$hsl=$this->db->query("DELETE FROM tbl_pengumuman");
		return $hsl;
	}



	//Front-End

	function get_post_home(){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d %M %Y') AS tanggal FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit 3");
		return $hsl;
	}

	function get_berita_slider(){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman where pengumuman_img_slider='1' ORDER BY pengumuman_id DESC");
		return $hsl;
	}

	function berita_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit $offset,$limit");
		return $hsl;
	}

	function berita(){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	} 
	function get_berita_by_slug($slug){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman where pengumuman_slug='$slug'");
		return $hsl;
	}

	function get_pengumuman_by_kategori($kategori_id){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman where pengumuman_kategori_id='$kategori_id'");
		return $hsl;
	}

	function get_pengumuman_by_kategori_perpage($kategori_id,$offset,$limit){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman where pengumuman_kategori_id='$kategori_id' limit $offset,$limit");
		return $hsl;
	}

	function search_pengumuman($keyword){
		$hsl=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman WHERE pengumuman_judul LIKE '%$keyword%'");
		return $hsl;
	}

	function post_komentar($nama,$email,$web,$msg,$pengumuman_id){
		$hsl=$this->db->query("INSERT INTO tbl_komentar (komentar_nama,komentar_email,komentar_web,komentar_isi,komentar_pengumuman_id) VALUES ('$nama','$email','$web','$msg','$pengumuman_id')");
		return $hsl;
	}


	function count_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_views WHERE views_ip='$user_ip' AND views_pengumuman_id='$kode' AND DATE(views_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_views (views_ip,views_pengumuman_id) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE tbl_pengumuman SET pengumuman_views=pengumuman_views+1 where pengumuman_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Good
    function count_good($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_pengumuman_id='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_pengumuman_id) VALUES('$user_ip','1','$kode')");
				$this->db->query("UPDATE tbl_pengumuman SET pengumuman_rating=pengumuman_rating+1 where pengumuman_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_like($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_pengumuman_id='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_pengumuman_id) VALUES('$user_ip','2','$kode')");
				$this->db->query("UPDATE tbl_pengumuman SET pengumuman_rating=pengumuman_rating+2 where pengumuman_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_love($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_pengumuman_id='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_pengumuman_id) VALUES('$user_ip','3','$kode')");
				$this->db->query("UPDATE tbl_pengumuman SET pengumuman_rating=pengumuman_rating+3 where pengumuman_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_genius($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_pengumuman_id='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_pengumuman_id) VALUES('$user_ip','4','$kode')");
				$this->db->query("UPDATE tbl_pengumuman SET pengumuman_rating=pengumuman_rating+4 where pengumuman_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    function cek_ip_rate($kode){
    	$user_ip=$_SERVER['REMOTE_ADDR'];
        $hsl=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_pengumuman_id='$kode'");
        return $hsl;
    }


    function get_pengumuman_populer(){
		$hasil=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d %M %Y') AS tanggal FROM tbl_pengumuman ORDER BY pengumuman_views DESC limit 10");
		return $hasil;
	}

	function get_pengumuman_terbaru(){
		$hasil=$this->db->query("SELECT tbl_pengumuman.*,DATE_FORMAT(pengumuman_tanggal,'%d %M %Y') AS tanggal FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit 10");
		return $hasil;
	}

	function get_kategori_for_blog(){
		$hasil=$this->db->query("SELECT COUNT(pengumuman_kategori_id) AS jml,kategori_id,kategori_nama FROM tbl_pengumuman JOIN tbl_kategori ON pengumuman_kategori_id=kategori_id GROUP BY pengumuman_kategori_id");
		return $hasil;
	}
	

}