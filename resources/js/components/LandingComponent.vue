<template>
<div>
  <el-input placeholder="Please input" v-model="input"></el-input>
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

   <el-rate :value='movie.rating? movie.average_rating:0' :max="10" disabled></el-rate>
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
               input: ''
          
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
            

},
computed: {
  searchContents(){
    if (this.search === '') {
      return this.movies
    }

    return this.movies.filter(x => this.search === x.funding)
  }
}
    }
   

</script>

<style>
 
.image {
    width:100%;
    max-height:400px;
   
  }
  
</style>
