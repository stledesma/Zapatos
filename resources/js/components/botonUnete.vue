<template>
    <input type="button" class="btn btn btn-dark" value="Únete al Proyecto" v-on:click="botonUnete">
</template>

<script>
export default {
    methods:{
        botonUnete(){
            this.$swal.fire({
            icon: 'success',
            title: 'Te acabas de unir al mejor proyecto de NightRaid',
            showConfirmButton: false,
            timer: 2500,
            width: 600,
            padding: '3em',
            background: '#fff',
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/gif-anime4.gif")
                left top
                no-repeat
            `,
            })
        }
    }
}
</script>
