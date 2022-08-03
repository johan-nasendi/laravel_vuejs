<template>
    <div class="container py-5">
        <div class="card">
             <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <h2>List Users</h2>
                    </div>
                    <div class="col col-lg-2">
                        <router-link :to="{name: 'AddUser'}" class="btn btn-info" title="ADD">
                            <font-awesome-icon icon="fa-solid fa-add" />
                        </router-link>
                    </div>
                </div>
                <hr>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Images</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                        <th scope="row">#</th>
                        <td><img v-if="user.photo" :src="'/images/'+user.photo" class="card-img-top rounded-circle" style="width:55px" /></td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>
                            <a href="#" class="btn btn-secondary" @click.prevent="displayuser(user.id)" title="DETAIL">
                                <font-awesome-icon icon="fa-solid fa-info-circle" />
                            </a>
                            <a href="#" class="btn btn-warning" @click.prevent="Edit(user.id)" title="EDIT">
                                <font-awesome-icon icon="fa-solid fa-edit" />
                            </a>
                        </td>
                        </tr>
                    </tbody>
                </table>
             </div>
         </div>
    </div>
</template>
<script>

    export default {
        props: ['id'],
        data() {
            return {
                users: [],
                detailsUser: {}
            }
        },
        mounted() {
            this.getUsers()
        },
        methods: {
            getUsers(){
                axios.get('/api/users').then((response) => {
                console.log(response)
                this.users = response.data
            })
            },
            profile_url(name){
                return '/user/' +name.toLowerCase()
            },
            displayuser(id) {
                this.$router.push({
                    name: 'Profile',
                    params: {id}
                })
            },
            Edit(id) {
                this.$router.push({
                    name: 'EditUser',
                    params: {id}
                })
            }
        }
    }
</script>
