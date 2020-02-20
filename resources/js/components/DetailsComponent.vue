<template>
    <div>
    {{movie.title}}
    {{movie.year}}
    </div>
</template>

<script>
    export default {
       props:[
           'movie'
       ],
       created(){
          console.log(this.movie) 
       }
    }
</script>
