<template>
    <button class="btn btn-default" 
            v-bind:class="{'btn-success': voted}"
            v-on:click="vote"
    >
        <span class="glyphicon glyphicon-thumbs-up"></span>
        <span v-text="text"></span>
    </button>

</template>

<script>
    export default {
        props:['answer','me','count'],
        mounted() {
                axios.post('/api/answer/votes/users',{'me':this.me,'answer':this.answer}).then(response => {
                    this.voted = response.data.voted
            })
        },
        data() {
            return{
                voted:false,
            }      
        },
        computed: {
            text() {
                return this.count
            } 
        },
        methods : {
            vote() {
                axios.post('/api/user/vote',{'answer':this.answer,'me':this.me}).then(response => {
                    this.voted = response.data.voted
                    response.data.voted ? this.count++ : this.count--
                })
            }
        }
    }
</script>
