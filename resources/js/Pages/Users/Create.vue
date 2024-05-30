<script>
export default {
    name: "UsersCreate"
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import UsersForm from "@/Components/Users/Form.vue";

const form = useForm({
    name: '',
    email: '',
    password: ''
});
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <UsersForm :form="form" @submit="form.post(route('users.store'))"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
