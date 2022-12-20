<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
  <form action="">
    <label for="nama">Nama</label>
    <input type="text" id="nama">
    
    <label for="deskripsi">deskripsi</label>
    <textarea id="deskripsi"></textarea>

    <label for="img">img</label>
    <input type="file" id="img">

    <label for="harga">harga</label>
    <input type="number" id="harga">
    <button onclick="tambahBlog()">Submit</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    function tambahBlog(){
      let nama = $('#nama').val()
      let deskripsi = $('#deskripsi').val()
      let img = $('#img').val()
      let harga = $('#harga').val()
      
      if(nama == '') return alert('nama tidak boleh kosong')
      if(deskripsi == '') return alert('deskripsi tidak boleh kosong')
      if(img == '') return alert('img tidak boleh kosong')
      if(harga == '') return alert('harga tidak boleh kosong')

      let fd = new FormData()
      fd.append('nama', nama)
      fd.append('deskripsi', deskripsi)
      fd.append('img', img.prop('files')[0])
      fd.append('harga', harga)

      $.ajax({
        url: 'http://localhost:8000/api/product/tambah',
        method: 'POST',
        data: fd,
        processData: false, //agar data tidak diproses dulu sebelum dikirim
        contentType: false, //di false karena menggunakan form data (FD)
        success : _ => {
          window.location.href = "http://localhost:8000/"
        }
      })
    }
  </script>
</body>
</html>