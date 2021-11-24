<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <Loading v-if="loading"/>

                <div v-else v-for="post in postList" :key="post.id" class="col-3 m-2">
                    <div class="card">
                        <img class="card-img-top img-fluid" :src=post.image_url alt="Immagine">
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <h5 class="card-text">{{post.author}}</h5>
                            <h5 class="card-text bandge badge-info">{{post.category.name}}</h5>

                            <p class="card-text">{{post.post_content}}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Loading from "./Loading.vue";


export default {
    name: "PostGuest",
    components: {
        Loading,

    },

    data(){
        return{
            postList: [],
            loading: true,
        }
    },

    methods:{
        getPostList(){
            axios.get("/api/posts")
            .then( (response) => {
                this.postList = response.data.posts;
                // console.log(response.data.posts);
            }).catch( (error) =>{
                console.log(error);
            }).then( () =>{
                this.loading = false;
            });
        }
    },
    
    created(){
        this.getPostList();
    }
}
</script>