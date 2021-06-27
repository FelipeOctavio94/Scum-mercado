new Vue({
    el:'#buscarProducto',
    data:{
        url:"https://scum-mercado.herokuapp.com/",
        productoexiste: false ,
        nombre:"",
        productos:[]
        
       
    },
    methods:{
        buscarProducto: async function(){
            var recurso="controllers/BuscarProductoNombre.php";
            var form = new FormData();
            form.append("nombre",this.nombre);
            try {
                const res = await fetch(this.url+recurso,{
                    method:"post",
                    body: form,
                });
                if(this.nombre==""){
                    M.toast({html: 'Ingrese nombre'})
                }else{
                    const data = await res.json();
                    this.productos=data;
                    var cantidad=0;
                    for(i in data){
                        cantidad++;
                    }             
                    if(data==0){
                        M.toast({html: 'Busqueda sin resultados'})
                        this.productoexiste = false;
                    }else{

                        M.toast({html: '¡Busqueda finalizada con exito!! cantidad de recetas: '+cantidad})
                        this.productoexiste = true;
                    }
                }
                } catch (error) {
                console.log(error);
            }
        },

    },
    created(){

    }
});