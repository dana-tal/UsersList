<template>
                <div  style="height:900px; display: flex; flex-direction: column;" >
                    <div class="d-flex justify-content-center"><h2 class="mt-4 mb-4 ">Users List</h2></div>

                    <div class="row mb-2">
                        <div class="col-md-2"><label for="search">Search:</label></div>
                        <div class="col-md-6"><input v-model="search" type="text" name="search" id="search" placeholder="Search ..." class=" px-2 "></div>
                        <div class="col-md-4 text-end"><button v-if="is_admin"  @click="handle_click" class="btn btn-danger">Delete</button></div>

                    </div>
                    <div  class="row">
                        <div class="col">
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr><td v-if="is_admin">Delete</td><td>First Name</td><td>Last Name</td><td>Username</td></tr>
                                </thead>
                                <tbody>
                                    <tr v-for="user in users.data" :key="user.id">
                                        <td v-if="is_admin"><input  v-model="state.checked_items" type="checkbox" :id="user.id"  :value="user.id"></td>
                                        <td>{{ user.first_name }}</td>
                                        <td> {{ user.last_name }}</td>
                                        <td> {{ user.username  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- <p>{{ state.checked_items }}</p> -->

                    <div class="row " style="background-color:tan;margin-top: auto; ">
                        <div class="col-md-12 d-flex justify-content-center align-items-center pt-2 ">
                            <Pagination :links="users.links" class="mt-6 ms-10"/>
                        </div>
                    </div>
                </div>

</template>


<script setup>
import Pagination from '../Shared/Pagination.vue';

import {ref, watch,reactive } from "vue";
import { router, usePage } from '@inertiajs/vue3';
import debounce from "lodash/debounce";

let props =  defineProps({
       users: Object,
       filters: { type:Object, default:[]}
     });

    let search = ref(props.filters.search);

    let state = reactive({checked_items:[ ]});

    let domain_url =   usePage().props.app_url;

     watch(search,
        debounce(
                    function (value){
                                        console.log('changed '+value);
                                        router.get(domain_url+'/users',{search: value }, {preserveState:true, replace:true });
                                    },
                    500
                )
            );



function handle_click()
{
    if (confirm("Are you sure you want to delete users :"+state.checked_items.join(',')) === true)
    {
        router.post(domain_url+'/users/delete',{users: state.checked_items });
    }
}
</script>
<script>

    export default
    {
        computed:
            {
                    is_admin()
                    {
                        if (this.$page.props.auth)
                        {
                            return this.$page.props.auth.user.is_admin;
                        }
                        else
                        {
                            return false;
                        }
                    }
            }
    }
</script>
