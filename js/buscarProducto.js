new Vue({
    el:'#buscarNombre',
    data:{
        url:"http://localhost/scum-mercado/",
        productoexiste: false ,
        nombre:"",
        productos:[]
        
       
    },
    methods:{
        buscarNombre: async function(){
            var recurso="controllers/BuscarProductoNombre.php";
            var form = new FormData();
            form.append("nombre",this.nombre);
            try {
                const res = await fetch(this.url+recurso,{
                    method:"post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                this.productos=data;
            } catch (error) {
                console.log(error);
            }
        },

    },
    created(){

    }
});