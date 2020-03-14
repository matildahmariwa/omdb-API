<template>
<div>
  <el-input placeholder="Please input" v-model="input"></el-input>
<el-row :gutter="10">
  <el-col :span="6" v-for="(movie, i) in movies" v-bind:key="i">
 <el-card shadow="always" :body-style="{ padding: '0px'} ">
      <img v-bind:src="movie.cover_photo" class="image" >
    <div style="padding:14px;">
                 <div class="bottom clearfix">
          <a :href="`/movie/${movie.id}`" class="detail">{{movie.title}} </a>       
         
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

<style lang="scss">
 
.image {
    width:100%;
    max-height:400px;
    
  }
  .el-card{
    margin-top:30px;
    border-top-left-radius:15px;
    border-top-right-radius:18px;  
    h4{
      font-size: 15px;
    }
  }
  .el-row{
    margin-left: 10px !important;
    margin-right: 10px !important;
  }
  .detail{
    color:purple;
    font-weight: bold;
    font-size:15px;
  }
 
  
</style>
