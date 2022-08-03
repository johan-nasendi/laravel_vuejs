<template>
   <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Photo</div>

                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">File</label>
                            <div class="col-md-6">
                                <input  type="file" class="form-control" required autocomplete="name" autofocus @change="upload">
                            </div>
                            <img :src="previewimage" width="100">
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success" title="SUBMIT" @click="submit">
                                   <font-awesome-icon icon="fa-solid fa-upload" />
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
                previewimage: null,
                photo: null
            }
        },
        methods: {
            upload(e) {
                let files = e.target.files[0]
                this.previewimage = URL.createObjectURL(files)
                this.photo = files
            },
            submit () {
                let formData = new FormData()
                formData.append('photo', this.photo)

                axios.post('/api/users/photo/'+this.id, formData)
                .then(response => {
                    if(response.data.status) {
                        this.$noty.success(response.data.message)
                        this.$router.push({
                         name: 'Profile',
                         params: {id: this.id}
                     })
                    }
                })
            }
        }
    }
</script>
