<template>


</template>

<script type="text/javascript">

    export default{
       created(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');

        this.$router.push({name:'/'})

        Toast.fire({
          icon: 'success',
          title: 'Logged out successfully'
        })
       } 
    }

</script>

<style type="text/css">

</style>