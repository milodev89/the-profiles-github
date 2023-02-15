<script>
    import axios from 'axios'
    import BarChart from './BarChart.vue'

    export default {
        data() {
            return {
                name_profile: '',
                profiles: [],
                clickSearch: 0,
            }
        },
        methods:{
            search(){
                let context = this;
                context.clickSearch = 0;
                context.profiles = [];
                if(!context.validateInput())return;  
                context.clickSearch = 1;              
                axios.get('https://api.github.com/search/users?q='+context.name_profile+'&per_page=10&page=1')
                .then(function (response) {
                    context.$toast.success('Succesfull search!')
                    context.profiles = response.data.items;
                })
                .catch(function (error) {
                    context.$toast.error(error);
                    console.log(error);
                });
            },
            validateInput(){
                let context = this;
                if (context.name_profile.length < 4) {
                    context.$toast.warning('Username must contain at least 4 characters!')
                    return false;
                }
                if (context.name_profile == 'doublevpartners') {
                    context.$toast.warning('User is private!')
                    return false;
                }
                return true;
            },
        },
        components: { BarChart }
    }
</script>

<template>
    <div class="container">    
        
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row align-items-center justify-content-center justify-content-md-between">
                    <div class="col-lg-6 col-md-6 col-sd-12 form-group">
                        <label for="nameProfile">Name Profile</label>
                        <input type="text" name="" id="nameProfile" class="form-control" v-model="name_profile">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sd-12 form-group">
                        <br>
                        <button class="btn btn-primary" @click.prevent="search()">Search</button>
                    </div>
                </div>
            </div>
        </section>        
        <hr>

        <section style="background-color: #eee;">
            <div class="container py-5">
                <div v-show="clickSearch == 1" class="row">
                    <p>Results for: {{ name_profile }}</p>
                </div>
                <div class="row" v-show="clickSearch == 1">
                    <div class="col-md-6 col-sd-12 col-lg-6">                
                        <table v-if="profiles.length>0" class="table table-responsive table-striped table-hover table-boordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="profile in profiles">
                                    <td>{{ profile.id }}</td>
                                    <td><a :href="'/profile/'+profile.login" target="_blank" rel="noopener noreferrer">{{ profile.login }}</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-md-6 col-sd-12 col-lg-6">            
                        <BarChart v-if="profiles.length>0" :profiles="profiles"/>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</template>