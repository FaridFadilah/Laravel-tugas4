<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>blog</title>
</head>
<body>
  <table id="tabel">
    <thead>
      <tr>
        <th>Nama</th>
        <th>slug</th>
        <th>isi</th>
      </tr>
    </thead>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    $.ajax({
      url: 'http://localhost:8000/api/blog',
      method: 'GET',
      dataType: 'json',
      success: response => {
        let listBlog = response.data
        let htmlString = ''
        for(let blog of listBlog){
          htmlString += `
          <tr>
            <th>${blog.nama}</th>
            <th>${blog.img}</th>
            <th>${blog.slug}</th>
            <th>${blog.isi}</th>
        </tr>`
        }
        html = $.parseHTML(htmlString)
        $('#tabel').append(html)
      }
    })
  </script>
</body>
</html>