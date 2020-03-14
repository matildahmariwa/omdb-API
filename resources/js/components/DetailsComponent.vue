<template>
    <div>
      <el-row :gutter="10">
          <el-col :span="6">
     <el-card shadow="always" :body-style="{ padding: '0px'} ">
      <img v-bind:src="movie.cover_photo" class="image" >
  
        </el-card>
          </el-col>
          <el-col :span="12">
              <div class="info">
                 <div class="bottom clearfix">
                    <h3>{{movie.title}}  </h3> 
                     <p><el-rate :value='movie.rating? movie.average_rating:0' :max="10"  disabled></el-rate> <p>
                       <p>{{ movie.type }}</p>   
                    <p><span class="titles">Release</span>{{ movie.year }}</p>
                   

        </div>
         <div class="block">
  <span>Rate this movie
  <el-rate v-model="value1" :max="10" @change="rateMovie"></el-rate>
  </span>
</div>          
            </div>
          </el-col>
</el-row>
<hr>

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

<style scoped lang="scss">
.image{
  max-height:800px;
  width: 100%;
}
.el-row{
    margin-left: 100px !important;
    margin-right: 10px !important;
  }
  .info{
    padding-left: 100px;
    padding-top: 50px;

    h3{
    font-size:30px;
    font-weight: bold;
    }
    .titles{
      color:grey;
      margin-right: 20px;
    }
  }
</style>
