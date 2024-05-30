<script>
export default {
    name: "RolesEdit"
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RoleForm from "@/Components/Roles/Form.vue";

const props = defineProps({
    role: {
        type: Object,
        required: true
    },
})
const form = useForm({
    name: props.role.name
});
</script>

<template>
    <AppLayout title="Roles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Role
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <RoleForm :is-edit="true" :form="form" @submit="form.put(route('roles.update', props.role.id))"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
