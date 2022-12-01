<?php
if($_POST){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $telepon=$_POST['telepon'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($nama)){
        echo "<script>alert('nama member tidak boleh kosong');location.href='tambah_member.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_member.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($conn,"update member set nama='".$nama."',alamat='".$alamat."', gender='".$gender."', telepon='".$telepon."', username='".$username."', where id='".$id."") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update member');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id=".$id."';</script>";
            }
        } else {
            $update=mysqli_query($conn,"update member set nama='".$nama."',alamat='".$alamat."', gender='".$gender."', telepon='".$telepon."', username='".$username."', password='".md5($password)."' where id='".$id."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update member');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id=".$id."';</script>";
            }
        }
        
    } 
}
?>
