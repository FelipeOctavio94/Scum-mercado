new Vue({
    el:'#creacionDeProductos',
    data:{
        url: "http://localhost/scum-mercado/",
        vnombre:'',
        vprerequisito:'',
        vprecio_venta:'',
        vprecio_compra:'',
        vcantidad:'',
        vcodigo_ingreso:'',
        productos:[],
        
    },
    methods:{
        
        guardar : async function (){
            
            const recurso = "controllers/ControlEditarProducto.php";
            var form = new FormData();
            form.append("nombre",this.vnombre);
            form.append("prerequisito", this.vprerequisito);
            form.append("precio_venta", this.vprecio_venta);
            form.append("cantidad", this.vcantidad);
            form.append("codigo_ingreso", this.vcodigo_ingreso);
            try {
                const res = await fetch(this.url + recurso, {
                method: "post",
                body: form,
                
            });
                const data = await res.json();
                alerta=(data.msg);
                console.log(data);
            } catch (error) {
                    console.log(error);
            }
            M.toast({html: this.alerta})
        },
        cargar: async function () {
            var url = "http://localhost/scum-mercado/controllers/Productos.php";
      
            try {
              const res = await fetch(url);
              const data = await res.json();
              this.productos = data;
              console.log(data);
            } catch (error) {
              console.log(error);
            }
            
          },


        crearProducto: async function(){
            var recurso = "controllers/InsertarProducto.php";
            var form = new FormData();
            form.append("nombre",this.vnombre);
            form.append("prerequisito",this.vprerequisito);
            form.append("precio_venta",this.vprecio_venta);
            form.append("precio_compra",this.vprecio_compra);
            form.append("cantidad",this.vcantidad);
            form.append("codigo_ingreso",this.vcodigo_ingreso);
            
            try{
                
                const res = await fetch(this.url+recurso,{
                    method:"post",
                    body:form,
                });
                const data = await res.json();
                this.alerta=data.msg
                for (i in data){
                    M.toast({html: data[i]});
                    if(data["msg"]=="Producto creado con exito"){
                    this.vnombre='';
                    this.vprerequisito='';
                    this.vprecio_venta='';
                    this.vprecio_compra='';
                    this.vcantidad='';
                    this.vcodigo_ingreso='';
                    
                }
            }
            }catch(error){
                console.log(error);
                M.toast({html:"Hubo un error: "+error})
            }
        
        }

    },

    created(){
        this.cargaProductos();
    }
      
    
});
