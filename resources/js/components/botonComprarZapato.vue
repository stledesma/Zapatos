<template>
    <input type="button" class="btn btn btn-secondary" value="Comprar" v-on:click="botonComprarZapato">
</template>

<script>
export default {
    props:['idZapato', 'nombreZapato', 'precioZapato'],
    mounted(){
        console.log('id zapato', this.idZapato)
        console.log('nombre zapato', this.nombreZapato)
        console.log('precio zapato', this.precioZapato)
    },
    methods:{
        botonComprarZapato(){
            this.$swal.fire({
            icon: 'success',
            title: 'Producto añadido al carrito',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            width: 600,
            padding: '3em',
            background: '#fff',
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/gif-anime5.gif")
                left top
                no-repeat
            `,
            text: 'El producto ' + this.idZapato + ' ' + this.nombreZapato + ' con valor de $ ' + this.precioZapato + ' ha sido añadido.',
            footer: '<a href>Podrias ayudar a mejor la experiencia del sitio?</a>'
            })
        }
    }
}
</script>
