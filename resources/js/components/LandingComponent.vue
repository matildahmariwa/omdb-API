<template>
<div>
    <li class="list-group-item" v-for="(movie, index) in list">
        <h1>{{ movie.title }}</h1>

    </li>
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                list: [],
                movie: {
                    id: '',
                    title: '',
                    year:'',
                    type:'',
                    cover_photo:''
                }
            };
        },
        methods: {
            fetchMovieList() {
                axios.get('/api/movies').then((res) => {
                    this.list = res.data;
                });
                console.log(this.list)
            }
        }
    }


</script>

<style scoped>

</style>
