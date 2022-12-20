<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>blog</title>
</head>
<body>
  
  <a href="http://localhost:8000/product/tambah">tambah product</a>
  <a href="http://localhost:8000/product/">blog</a>
  <a href="http://localhost:8000/blog/">blog</a>
  <table border='5'>
    <thead>
      <tr>
        <th>Nama</th>
        <th>img</th>
        <th>deskripsi</th>
        <th>harga</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody id="tabel"></tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    
    function deleteProduct(id) {
      $.ajax({
        url: `http://localhost:8000/api/product/delete/${id}`,
        method: "DELETE",
        dataType: "json",
        success: _ => {
          console.log("SUCCESS")
          window.location.href = "http://localhost:8000/api/product/"
        }
      })
    }

    $.ajax({
      url: 'http://localhost:8000/api/product',
      method: 'GET',
      dataType: 'json',
      success: response => {
        let listproduct = response.data
        let htmlString = ''
        for(let product of listproduct){
          htmlString += `
          <tr>
            <th>${product.nama}</th>
            <th>${product.img}</th>
            <th>${product.deskripsi}</th>
            <th>${product.harga}</th>
            <td>
              <a href="http://localhost:8000/product/edit/${product.id}">Detail</a>
              <button onclick="deleteproduct(${product.id})">Hapus</button>
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