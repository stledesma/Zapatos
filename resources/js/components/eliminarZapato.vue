<template>
    <input type="submit" class="btn btn-danger" value="Eliminar" v-on:click="eliminarZapato">
</template>

<script>
export default {
    props:['idZapato'],
    mounted(){
        console.log('id zapato', this.idZapato)
    },
    methods:{
        eliminarZapato(){
            this.$swal.fire({
            title: 'Esta seguro de eliminar este calzado?',
            width: 600,
            padding: '3em',
            background: '#fff',
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/gif-anime.gif")
                left top
                no-repeat
            `,
            text: "Esta accion no sera reversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#47C11F',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar calzado!',
             cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                const params={
                    id:this.idZapato
                }
                axios.post(`/shoes/${this.idZapato}`,{params, _method:'delete'})
                .then(respuesta=>{
                    this.$swal.fire({
                        title: 'Calzado eliminado!',
                        width: 600,
                        padding: '3em',
                        background: '#fff',
                        backdrop: `
                            rgba(0,0,123,0.4)
                            url("/images/gif-anime2.gif")
                            left top
                            no-repeat
                        `,
                        text: "Tu calzado se ha eliminado.",
                        icon: 'success',
                    }
                    )
                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentElement);
                })
                .catch(error=>{
                    console.log(error);
                })

            } else {
                this.$swal.fire({
                    title: 'Accion Cancelada!',
                    width: 600,
                    padding: '3em',
                    background: '#fff',
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("/images/gif-anime1.gif")
                        left top
                        no-repeat
                    `,
                    text: "Tu calzado no ha sido eliminado.",
                    icon: 'error',
                }
                )
            }
            })
        }
    }

}
</script>
