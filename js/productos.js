cargaProductos();

async function cargaProductos() {
  try {
    const res = await fetch(
      "http://localhost/scum-mercado/controllers/Productos.php"
    );
    const data = await res.json();
    pintaTabla(data);

    console.log(data);
  } catch (error) {
    console.log(error);
  }
}

function pintaTabla(data) {
  var productos = document.getElementById("productos");
  var tabla = `
            <table>
                <tr>
                   <th> Nombre </th>
                   <th>Pre-requisitos</th>
                   <th> Precio venta </th>
                   <th> Precio compra </th>
                   <th> Cantidad </th>
                   <th> Codigo spawn</th>
                </tr>   
        `;
  data.forEach((item) => {
    tabla += `
                <tr>
                    <td>${item.nombre}</td>
                    <td>${item.preprequisito}</td>
                    <td>${item.precio_venta}</td>
                    <td>${item.precio_compra}</td>
                    <td>${item.cantidad}</td>
                    <td>${item.codigo_ingreso}</td>
                </tr>    
            `;
  });
  tabla += "</table>";
  productos.innerHTML = tabla;
}

document.getElementById("bt_guardar").addEventListener("click", (e) => {
  e.preventDefault();
  insertarProducto();
});

async function insertarProducto() {
  try {
    const URL = "http://localhost/scum-mercado/controllers/InsertarProducto.php";
    const res = await fetch(URL, {
      method: "POST",
      body: new FormData(document.getElementById("form")),
    });
    const data = await res.json();
    M.toast({ html: data.msg });
    console.log(data);
  } catch (error) {
    console.log(error);
  }
}
