<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>blog</title>
</head>
<body>
  <h1>Blog</h1>
  <a href="http://localhost:8000/blog/tambah">tambah blog</a>
  <a href="http://localhost:8000/product/">product</a>
  <a href="http://localhost:8000/blog/">blog</a>
  <table border='5'>
    <thead>
      <tr>
        <th>Nama</th>
        <th>img</th>
        <th>slug</th>
        <th>isi</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody id="tabel"></tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    
    function deleteBlog(id) {
      $.ajax({
        url: `http://localhost:8000/api/blog/delete/${id}`,
        method: "DELETE",
        dataType: "json",
        success: _ => {
          console.log("SUCCESS")
          window.location.href = ""
        }
      })
    }

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
            <th><img src='${blog.img}'/></th>
            <th>${blog.slug}</th>
            <th>${blog.isi}</th>
            <td>
              <a href="http://localhost:8000/blog/edit/${blog.id}">Detail</a>
              <button onclick="deleteBlog(${blog.id})">Hapus</button>
            </td>
        </tr>`
        }
        html = $.parseHTML(htmlString)
        $('#tabel').append(html)
      }
    })
  </script>
</body>
</html>