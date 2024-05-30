<script>
export default {
    name: "UsersEdit"
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import UsersForm from "@/Components/Users/Form.vue";

const props = defineProps({
    user_edit: {
        type: Object,
        required: true
    }
})


const form = useForm({
    name: props.user_edit.name,
    email: props.user_edit.email,
    password: ''
});
</script>

<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit user
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <UsersForm :form="form" @submit="form.put(route('users.update', props.user_edit.id))"
                               :is-edit="true"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
