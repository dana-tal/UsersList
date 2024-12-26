<template>

<nav class="navbar navbar-expand-lg " style=" background-color:tan; "> <!--test -->
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <Link class="nav-link  custom_title" :class="{'active':$page.component==='Home'}" aria-current="page" :href="get_link('')">Home</Link>
          </li>
          <li v-if="username===null" class="nav-item">
            <Link class="nav-link custom_title" :class="{'active':$page.component ==='Auth/Register'}" :href="get_link('register')">Register</Link>
          </li>
          <li v-if="username===null" class="nav-item">
            <Link class="nav-link custom_title" :class="{'active':$page.component=== 'Auth/Login'}" :href="get_link('login')">Login</Link>
          </li>
          <li v-if="username !== null ">
            <Link class="nav-link custom_title" :class="{'active':$page.component ==='Users'}" :href="get_link('users')"   >Users</Link>
          </li>

          <li v-if="username !== null">
            	  <Link class="nav-link custom_title" :href="get_link('logout') "   method="post">Logout</Link>
          </li>

          <li v-if="username !== null">
            <span class="welcome nav-link custom_title">Welcome back {{ username }} </span>
          </li>

        </ul>

      </div>
    </div>
  </nav>
</template>
<script>

    import {Link} from '@inertiajs/vue3';


    export default
    {
        components: { Link},

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

                },
            methods:
            {
                get_link(slug)
                    {
                       // console.log (this.$page.url);
                        return this.$page.props.app_url+'/'+slug
                    }
            }

    }





</script>
<style scoped>
    .custom_title
    {
        color:white !important;
        font-weight:bold;
    }

    a:hover
    {
        color:lightseagreen !important;
    }

    .active
    {
        text-decoration:underline;
        color:teal !important;
    }

    .welcome
    {
        color:#728FCE !important;
    }
</style>
