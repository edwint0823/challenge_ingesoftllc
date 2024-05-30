<script>
export default {
    name: "RolesCreate"
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RoleForm from "@/Components/Roles/Form.vue";

const form = useForm({
    name: ''
});
</script>

<template>
    <AppLayout title="Roles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Role
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <RoleForm :form="form" @submit="form.post(route('roles.store'))"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
