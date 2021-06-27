new Vue({
data:{
  url: "https://scum-mercado.herokuapp.com/",
 
  productos:[],
  
},
methods:{
  cargaProductos: async function () {
  try {
    const res = await fetch(
      "https://scum-mercado.herokuapp.com/controllers/Productos.php"
    );
    const data = await res.json();
    pintaTabla(data);

    console.log(data);
  } catch (error) {
    console.log(error);
  }
},

pintaTabla: function (data) {
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
},

insertarProducto: async function () {
  try {
    const URL = "https://scum-mercado.herokuapp.com/controllers/InsertarProducto.php";
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
},
created(){
  this.cargaProductos();
}
});