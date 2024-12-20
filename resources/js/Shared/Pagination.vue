
<script setup>
     import {Link} from '@inertiajs/vue3';
     defineProps({ links: Object });


</script>

<template>

<div>
    <ul>
        <li v-for="link in links" style=" display:inline-block;">
            <Link v-if="link.url"  v-html="link.label" class="px-2" :href="link.url"   :class="{ 'text-secondary': !link.url ,'link_active': link.active ,'link_text': link.url }"/>
            <span v-else v-html="link.label" class="px-2" :href="link.url"   :class="{ 'text-secondary': !link.url , 'fw-bold': link.active }" ></span>
        </li>
    </ul>


</div>


</template>
<style scoped>
  .link_text
  {
      color:white;
      font-weight:bold;
  }

  .link_active
  {
     color:deeppink;
     font-weight:bold;
  }
</style>
