<template>
    <div>
   <el-card shadow="always" :body-style="{ padding: '0px'} ">
      <img v-bind:src="movie.cover_photo" class="image" >
    <div style="padding: 14px;">
                 <div class="bottom clearfix">
                    <h3>{{movie.title}}  </h3>    
                    <h4>{{ movie.year }}</h4>
                    <h4>{{ movie.type }}</h4>

        </div>
         <div class="block">
  <h3>Rate this movie</h3>
  <el-rate v-model="value1" :max="10" @change="rateMovie"></el-rate>
</div>          
            </div>
        </el-card>
    </div>
</template>

<script>
    export default {
          props:[
           'movie'
       ],
         data() {
      return {
        value1: null,   
      }
    },
     
       created(){
          console.log(this.movie) 
       },
       methods:{
          rateMovie(){
              let payload = {
                  movie_id:this.movie.id,
                  star_value:this.value1
}
              axios.post('/rate',payload)

          } 
       }
    }
</script>

<style lang="scss">

</style>
