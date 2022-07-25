<template>
    <div>
        <h3 class="text-center">Edit client</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateClient">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="client.name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="client.detail">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                client: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/clients/${this.$route.params.id}`)
                .then((res) => {
                    this.client = res.data;
                });
        },
        methods: {
            updateclient() {
                this.axios
                    .patch(`http://localhost:8000/api/clients/${this.$route.params.id}`, this.client)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>
