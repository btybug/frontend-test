<template>
    <div class="container">

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
          listenForBroadcast(survey_id) {
                Echo.join('survey.' + survey_id)
                    .here((users) => {
                    this.users_viewing = users;
                this.$forceUpdate();
            })
            .joining((user) => {
                    if (this.checkIfUserAlreadyViewingSurvey(user)) {
                    this.users_viewing.push(user);
                    this.$forceUpdate();
                }
            })
            .leaving((user) => {
                    this.removeViewingUser(user);
                this.$forceUpdate();
            });
            }
    }
</script>
