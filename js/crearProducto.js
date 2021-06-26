new Vue({
    el:'#creacionDeProductos',
    data:{
        url: "http://localhost/scum-mercado/",
        respuesta:[],
        nombre:'',
        prerequisito:'',
        precio_venta:'',
        precio_compra:'',
        cantidad:'',
        codigo_ingreso:''
        
    },
    methods:{
        

        crearProducto: async function(){
            var recurso = "controllers/InsertarProducto.php";
            var form = new FormData();
            form.append("nombre",this.nombre);
            form.append("prerequisito",this.prerequisito);
            form.append("precio_venta",this.precio_venta);
            form.append("precio_compra",this.precio_compra);
            form.append("cantidad",this.cantidad);
            form.append("codigo_ingreso",this.codigo_ingreso);
            
            try{
                
                const res = await fetch(this.url+recurso,{
                    method:"post",
                    body:form,
                });
                const data = await res.json();
                
                for (i in data){
                    M.toast({html: data[i]});
                    if(data["msg"]=="Producto creado con exito"){
                    this.nombre='';
                    this.prerequisito='';
                    this.precio_venta='';
                    this.precio_compra='';
                    this.cantidad='';
                    this.codigo_ingreso='';
                    this.esta=false;
                }
            }
            }catch(error){
                console.log(error);
                M.toast({html:"Hubo un error: "+error})
            }
        
        }

    },

    created(){}
      
    
});
