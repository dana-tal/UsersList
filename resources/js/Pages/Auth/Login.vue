<template>
            <div class="w-25 bg-primary-subtle ">
                <div class="row">
                    <div class="col d-flex justify-content-center py-2">
                        <h2>Login</h2>
                    </div>
                </div>
                <form @submit.prevent="submit" class="">
                    <div class="mb-3 row ">
                        <div class="col-md-3 d-flex justify-content-center"><label for="username" ><span >Username:</span></label></div>
                        <div class="col-md-8">
                            <input v-model="form.username" type="text"  class="form-control" id="username" name="username" >
                            <div v-if="form.errors.username" v-text="form.errors.username" class="text-danger mt-1"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-3 d-flex justify-content-center">Password:</label>
                        <div class="col-md-8">
                            <input v-model="form.password" type="password" class="form-control" id="password" name="password">
                            <div v-if="form.errors.password" v-text="form.errors.password" class="text-danger mt-1"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <button  type="submit"  :class="form.processing? 'bg-secondary':'bg-primary' " class="ms-4 text-white  py-2 px-4 hover:bg-info" :disabled="form.processing">Login</button>
                        </div>
                    </div>
                </form>
            </div>

</template>
<script setup>

   import {useForm, usePage} from  '@inertiajs/vue3';

    defineProps({
        errors: Object
    })

    const form = useForm({
        username:'',
        password:''
    });


    let submit = () => {
        let post_url =   usePage().props.app_url+'/login';
        form.post(post_url);

    };


</script>
