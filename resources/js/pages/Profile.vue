<template>
    <div class="container py-4">
        <div class="card" text-center style="width:400px">
            <router-link :to="{name: 'UploadPhoto', params: {id:detailsUser.id}}" class="btn btn-success">
                 <font-awesome-icon icon="fa-solid fa-upload" />
            </router-link>
             <div class="card-body text-center" v-if="id">
             <img v-if="detailsUser.photo" :src="'/images/'+detailsUser.photo" class="card-img-top rounded-circle" width="20" />
                <h4 class="card-title">{{detailsUser.name}}</h4>
                 <p class="text-muted">{{detailsUser.email}}</p>
                 <p class="text-muted">{{detailsUser.created_at}}</p>
                 <router-link :to="{name: 'User'}" class="btn btn-primary">
                     <font-awesome-icon icon="fa-solid fa-arrow-alt-circle-left" />
                 </router-link>
                 <a href="" class="btn btn-outline btn-danger"  @click.prevent="handlingDelete">
                     <font-awesome-icon icon="fa-solid fa-trash-alt" />
                 </a>
             </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['id'],
        data() {
            return {
                detailsUser: {}
            }
        },
        mounted() {
            this.getUsers()
        },
        methods: {
            getUsers(){
                axios.get('/api/users/' +this.id).then((response) => {
                console.log(response)
                this.detailsUser = response.data
              })
            },
            handlingDelete()  {
                if(confirm('Are you sure you want to delete this data??')){
                    axios.delete('/api/users/' +this.id).then((response) => {
                    if(response.data.status) {
                        console.log(response.data.message)
                        this.$noty.success(response.data.message)
                        this.$router.push({
                            name: 'User',
                        })
                    }
                })
                } else {
                    return false
                }
            },
        }
    }
</script>
