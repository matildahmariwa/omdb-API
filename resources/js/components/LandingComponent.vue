<template>
<div>
<el-row :gutter="10">
  <el-col :span="6" v-for="(movie, i) in movies" v-bind:key="i">
 <el-card shadow="always" :body-style="{ padding: '0px'} ">
      <img v-bind:src="movie.cover_photo" class="image" >
    <div style="padding: 14px;">
                 <div class="bottom clearfix">
          <a :href="`/movie/${movie.id}`">{{movie.title}}</a>       
          <!-- <router-link :to="{name:'movie',params:{id:movie.id}}">{{movie.title}}</router-link> 
               <router-view></router-view> -->
                    <h4>{{ movie.year }}</h4>
                    <h4>{{ movie.type }}</h4>

        </div>
         <div class="block">
 
  <el-rate  :max="10" ></el-rate>
</div>          
            </div>
        </el-card>
  </el-col>
 
</el-row>
   
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                movies: [],
              movie:'',
          
            };
        },
        created(){ 
          this. fetchMovieList(); 
         
          },
        
        methods: {
            fetchMovieList() {
                    axios.get('/movies').then(response => {
                        this.movies = response.data;
                    })

                   .catch(error=>console.log(error))

                },
            

}
    }
   

</script>

<style scoped>
 
.image {
    width: 100%;
    display: block;
  }
  
</style>
