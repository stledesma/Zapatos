<template>
    <input type="button" class="btn btn-primary animate__animated animate__fadeInUpBig" value="Comprar" v-on:click="botonComprar">
</template>

<script>
export default {
    methods:{
        botonComprar(){
            this.$swal.fire({
            icon: 'error',
            title: 'Oops...',
            width: 600,
            padding: '3em',
            background: '#fff',
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/gif-anime3.gif")
                left top
                no-repeat
            `,
            text: 'La compra en linea esta en construccion',
            footer: '<a href>Podrias ayudar a mejor la experiencia del sitio?</a>'
            })
        }
    }
}
</script>
