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
    <input type="text" id="nama" value="">
    <input type="file" id='img'>
    <textarea type="text" id="slug"></textarea>
    <textarea type="text" id="isi"></textarea>
    <button onclick="editProduct()">Submit</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    $.ajax({
      url: `http://localhost:8000/api/blog/{{ $id }}`,
      method: 'GET',
      success: response => {
        let blog = response.data
        $('#nama').val(blog.nama)
        $('#img').val(blog.img)
        $('#slug').val(blog.slug)
        $('#isi').val(blog.isi)
      }
    })

    function editProduct(){
      let nama = $('#nama').val()
      let img = $('#img').val()
      let slug = $('#slug').val()
      let isi = $('#isi').val()

      if(name === '') return alert('Namanya mana?')
      if(img === '') return alert('imgnya mana?')
      if(slug === '') return alert('slugnya mana?')
      if(isi === '') return alert('isinya mana?')

      let fd = new FormData()
      fd.append('name', name)
      fd.append('img', img)
      fd.append('slug', slug)
      fd.append('isi', isi)

      $.ajax({
        url: 'http://localhost:8000/api/pengguna',
        method: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success : _ => {
          window.location.href = "http://localhost:8000"
        }
      })
    }
  </script>
</body>
</html>