<?php

//koneksi ke database
$conn =  mysqli_connect("localhost", "root", "", "gase");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}



function tambah($data){
//ambil data dari setiap elemen dalam form  
global $conn;
// $id = htmlspecialchars($data["id"]);
$nama = htmlspecialchars($data["nama"]);
$harga = htmlspecialchars($data["harga"]);
$genre = htmlspecialchars($data["genre"]);

//upload gambar dulu
$gambar = upload();
if(!$gambar){
    return false;
}

$query = "INSERT INTO gamestock VALUES('', '$nama', '$harga', '$genre', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
            alert('Hayo para admin pilih gambar dulu yaa');
        </script>";
        return false;
    }

    //cek file upload
    $imagevalid = ['jpg','jpeg','png'];
    $eksgambar = explode('.', $namafile);
    $eksgambar = strtolower (end($eksgambar));

    if(!in_array($eksgambar, $imagevalid)){
        echo "<script>
            alert('Yang di upload bukan gambar beb');
        </script>";
        return false;
    }
    //cek ukuran file
    if($ukuranfile > 3000000){
        echo "<script>
            alert('KEbesareen');
        </script>";
        return false;
    }

    //generate
    $newname = uniqid();
    $newname .= '.';
    $newname .= $eksgambar;


    //checking
    move_uploaded_file($tmpName, 'img/' . $newname);

    return $newname;
}

function hapus($id){
global $conn;
 mysqli_query($conn, "DELETE FROM gamestock WHERE id = '$id'");

 return mysqli_affected_rows($conn);
}

function ubah($id){
    global $conn;
$no = $id["id"];
$nama = htmlspecialchars($id["nama"]);
$harga = htmlspecialchars($id["harga"]);
$genre = htmlspecialchars($id["genre"]);

$oldgambar = htmlspecialchars($id["oldgambar"]);

if($_FILES['gambar']['error'] == 4){
    $gambar = $oldgambar;
}
else{
    $gambar = upload();
}

$query = "UPDATE gamestock SET nama = '$nama', harga = '$harga', genre = '$genre', gambar = '$gambar' WHERE id = '$no'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM gamestock WHERE nama LIKE '%$keyword%' OR genre LIKE '%$keyword%'";
    return query($query);
}
?>