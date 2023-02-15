<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                name_profile: '',
                profile: {}
            }
        },
        methods:{
            /*search(){
                
            }*/
        },
        created() {
            let context = this;
            context.name_profile = (window.location.href).split("/").pop();
            axios.get('https://api.github.com/users/'+context.name_profile)
            .then(function (response) {
                context.profile = response.data;
            })
            .catch(function (error) {
                context.$toast.error(error);
                console.log(error);
            });
        }
    }
</script>

<template>
    <div class="container">        

        <div class="row">
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User: {{ name_profile }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img :src="profile.avatar_url" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">{{ profile.name }}</h5>
                                    <p class="text-muted mb-1">{{ profile.bio }}</p>
                                    <p class="text-muted mb-4">{{ profile.location }}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a :href="profile.html_url" target="_blank"><button type="button" class="btn btn-primary">See profile</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush rounded-3">
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fas fa-globe fa-lg text-warning"></i>
                                            <p class="mb-0">{{ profile.blog }}</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                            <p class="mb-0">{{ profile.login }}</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                            <p class="mb-0">@{{ profile.twitter_username }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ profile.name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ profile.email }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ profile.location }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Since</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ profile.created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4"><span class="text-primary font-italic me-1">Followers:</span></p>
                                            <h2>{{ profile.followers }}</h2>
                                            <p class="mb-4"><span class="text-primary font-italic me-1">Following:</span></p>
                                            <h2>{{ profile.following }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4 text-center"><span class="text-primary font-italic me-1">Repositories:</span></p>
                                            <h2  class="text-center">{{ profile.public_repos }}</h2>
                                            <p class="mb-4 text-center"><span class="text-primary font-italic me-1">Gists:</span></p>
                                            <h2 class="text-center">{{ profile.public_gists }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>