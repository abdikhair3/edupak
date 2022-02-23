<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Model {

	public function global($warna, $pesan)
	{
		$notif = '
              <div class="card-body">
                <div class="alert alert-'.$warna.' alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  '.$pesan.'
                </div>
              </div>
		';
		return $notif;
	}

	public function Login_failed()
	{
		$notif = '
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Gagal Login, Periksa Kembali Username dan Password Anda !
                </div>
              </div>
		';
		return $notif;
	}

	public function Login_failed2()
	{
		$notif = '
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Gagal Login, Ada data kosong yang belum diisi !
                </div>
              </div>
		';
		return $notif;
	}

	public function Login_failed3()
	{
		$notif = '
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Gagal Login, Username tidak ditemukan !
                </div>
              </div>
		';
		return $notif;
	}

	public function Login_failed4()
	{
		$notif = '
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Gagal Login, Password yang anda masukkan salah !
                </div>
              </div>
		';
		return $notif;
	}

	public function sinkronisasi_berhasil()
	{
		$notif = '
              <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Berhasil !, Sinkronisasi Berhasil...
                </div>
              </div>
		';
		return $notif;
	}
	
	public function Login_success()
	{
		$notif = '
			<div class="card-body">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Selamat, Anda berhasil login ...
                </div>
              </div>
		';
		return $notif;
	}

	public function update_account()
	{
		$notif = "<div class='alert alert-success' role='alert'>Berhasil Merubah Akun, Silahkan Login Kembali ..<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}

	public function inputberhasil()
	{
		$notif = "<div class='alert alert-success' role='alert'>Data Berhasil Disimpan<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}

	public function inputgagal()
	{
		$notif = "<div class='alert alert-danger' role='alert'>Gagal Menyimpan Data, Mohon Periksa Kembali Data Yang Anda Inputkan..<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}
	public function berhasilhapus()
	{
		$notif = "<div class='alert alert-success' role='alert'>Data Berhasil Dihapus<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}
	public function gagalhapus()
	{
		$notif = "<div class='alert alert-danger' role='alert'>Gagal Menghapus Data..<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}
	public function update_berhasil()
	{
		$notif = "<div class='alert alert-success' role='alert'>Berhasil Merubah Data<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}

	public function publish()
	{
		$notif = "<div class='alert alert-success' role='alert'>Data Berhasil di publish<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}

	public function unpublish()
	{
		$notif = "<div class='alert alert-success' role='alert'>Data Berhasil di unpublish<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $notif;
	}

}

/* End of file aktifrecord.php */
/* Location: ./application/views/aktifrecord.php */