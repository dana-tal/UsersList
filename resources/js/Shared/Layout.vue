<template>
    <div class="container-fluid min-vh-100 d-flex flex-column">
        <NavBar />
        <div class="row flex-grow-1 ">
            <div class="col d-flex justify-content-center " :class="{'align-items-center':vertical_center }" style="background-color:floralwhite">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>


import NavBar from '../Shared/NavBar.vue';

export default
    {
        components: { NavBar},
        computed: {
                    vertical_center()
                    {
                        //return this.$page.component === 'Home';
                        return ( !this.$page.url.startsWith('/users'))
                    }
                }
    }


</script>
