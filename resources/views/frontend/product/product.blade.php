<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>no</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="table-product">

    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
  <script>
    $.ajax({
      url : `http://localhost:8000/api/product`,
      method: 'GET',
      dataType: "json",
      success: response => {
        let listProduct = response.data
        let htmlString = ""
        for(let Product of listProduct){
          htmlString += 
          `<tr>
              <td>${product.name}</td>
              <td>${product.email}</td>
              <td>
                <a href="http://localhost:8000/detail/${product.id}">Detail</a>
                <button onclick="deleteProduct(${product.id})">Hapus</button>
              </td>
            </tr>`
        }
        html = $.parseHTML(htmlString)
        $('#tabel-pengguna').append(html)
      }
    })

    function deleteProduct(id){
      $.ajax({
        url: 
      })
    }
  </script>  
</body>
</html>