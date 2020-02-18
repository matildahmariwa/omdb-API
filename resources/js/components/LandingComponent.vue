<template>
<div>
<el-row :gutter="10" >
  <el-col :span="6" v-for="movie in movies" v-bind:key="movie">
 <el-card>
      <img v-bind:src="movie.cover_photo" >
    <div style="padding: 14px;">
                 <div class="bottom clearfix">
           <h4>{{ movie.title }}</h4>
                    <h4>{{ movie.year }}</h4>
                    <h4>{{ movie.type }}</h4>
        </div>
                   
                    
           
            </div>
        </el-card>
  </el-col>
 
</el-row>
    <!-- <ul>
        <li v-for="movie in movies" v-bind:key="movie">
            {{movie.title}}
             {{movie.year}}
        </li>
    </ul> -->
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                movies: [],

            };
        },
        created(){ this. fetchMovieList(); },
        methods: {
            fetchMovieList() {
                    axios.get('/movies').then(response => {
                        this.movies = response.data;
                    })

                   .catch(error=>console.log(error))

                }
            }

    }


</script>

<style scoped>
 .el-row {
    margin-bottom: 20px;
   
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>
