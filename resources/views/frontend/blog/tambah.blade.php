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
    <label for="name">Nama</label>
    <input type="text" id="nama">

    <label for="email">Email</label>
    <input type="email" id="img">

    <label for="password">Password</label>
    <input type="password" id="slug">

    <label for="password">Password</label>
    <input type="password" id="isi">

    <button onclick="add()">Submit</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    function tambahBlog(){
      let nama = $('#nama').val()
      let img = $('#img').val()
      let slug = $('#slug').val()
      let isi = $('#isi').val()

      if(nama == '') return alert('nama tidak boleh kosong')
      if(img == '') return alert('img tidak boleh kosong')
      if(slug == '') return alert('slug tidak boleh kosong')
      if(isi == '') return alert('isi tidak boleh kosong')

      let fd = new FormData()
      fd.append('nama', nama)
      fd.append('img', img)
      fd.append('slug', slug)
      fd.append('isi', isi)

      $.ajax({
        url: `http://localhost:8000/api/blog/tambah`,
        method: 'POST',
        data: fd,
        processData: false, //agar data tidak diproses dulu sebelum dikirim
        contentType: false, //di false karena menggunakan form data (FD)
        success : _ => {
          window.location.href = "http://localhost:8000"
        }
      })
    }
  </script>
</body>
</html>