<template>
   <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    <div v-for="(errorArray, index) in notifmsg" :key="index">
                        <span class="text-danger">{{ errorArray}} </span>
                    </div>
                    <form @submit.prevent="handleUpdate">

                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" placeholder="Enter Full Name" v-model="user.name"
                                required autocomplete="name" autofocus>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">E-Email</label>
                            <div class="col-md-6">
                                <input  type="email" class="form-control" placeholder="Enter E-mail" v-model="user.email"
                                required autocomplete="email" autofocus>

                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <router-link :to="{name: 'User'}" class="btn btn-danger" title="BACK">
                                     <font-awesome-icon icon="fa-solid fa-arrow-alt-circle-left" />
                                </router-link>
                                <button type="submit" class="btn btn-success" title="SUBMIT">
                                   <font-awesome-icon icon="fa-solid fa-save" />
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                notifmsg: '',
                user: {
                    name: '',
                    email: ''
                }
            }

        },
        methods: {
            handleUpdate() {
                console.log(this.user)
                axios.put('/api/users/' +this.id, this.user).then((response) => {
                if(response.data.status) {

                    this.$noty.success(response.data.message)
                    this.$router.push({
                         name: 'User',
                     })
                }

              }).catch((e) => {
                console.log(e.response.status == 403)
                this.notifmsg  = e.response.message
              })
            },
            getUsers(){
                axios.get('/api/users/' +this.id).then((response) => {
                console.log(this.id)
                this.user =  {
                    name: response.data.name,
                    email: response.data.email
                }
              })
            }
        },
        created() {
            this.getUsers()
        },
    }
</script>
