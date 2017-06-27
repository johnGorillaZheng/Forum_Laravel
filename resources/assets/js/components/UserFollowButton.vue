<template>
    <button class="btn btn-default" 
            v-text="text"
            v-bind:class="{'btn-success': followed}"
            v-on:click="follow"
    >
    </button>

</template>

<script>
    export default {
        props:['user','me'],
        mounted() {
                axios.post('/api/user/followers',{'user':this.user,'me':this.me}).then(response => {
                    this.followed = response.data.followed
            })
        },
        data() {
            return{
                followed:false
            }      
        },
        computed: {
            text() {
                return this.followed ? '已关注':'关注此人'
            } 
        },
        methods : {
            follow() {
                axios.post('/api/user/follow',{'user':this.user,'me':this.me}).then(response => {
                    this.followed = response.data.followed
                })
            }
        }
    }
</script>
