<template>
            <div>
                <div class="row"><div class="col"><h1>Welcome</h1></div></div>
                <div v-if="username=== null " class="row"><div class="col"><p>Please login or register </p></div></div>
                <div v-else class="row"><div class="col"><p>Welcome back {{ username }}</p></div></div>
            </div>
</template>
<script>

export default{
     computed: {
                    username()
                    {
                        if (this.$page.props.auth)
                        {
                            return this.$page.props.auth.user.username;
                        }
                        else
                        {
                            return null;
                        }
                    }
                }
}
</script>


