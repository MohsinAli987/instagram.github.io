<template>
    <div>
        <button
            class="btn btn-primary ms-4"
            @click="FollowUser"
            v-text="buttontext"
        ></button>
    </div>
</template>
<script>
export default {
    props: ["userid", "follows"],
    mounted() {
        console.log("Component mounted.");
    },
    data: function () {
        return {
            status: this.follows,
        };
    },
    methods: {
        FollowUser() {
            axios.post("/follow/" + this.userid).then((response) => {
                this.status = ! this.status;
                console.log(response.data);
            })
            .catch(errors =>{
                if(errors.response.status == 401)
                {
                    window.location = '/login';
                }
            });
        }
    },
    computed :{
        buttontext(){
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
};
</script>
