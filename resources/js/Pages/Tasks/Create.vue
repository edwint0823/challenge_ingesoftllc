<script>
export default {
    name: "TasksCreate"
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import TaskForm from "@/Components/Tasks/Form.vue"

const form = useForm({
    title: '',
    description: '',
    due_date: '',
    status: false
});
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Task
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <TaskForm :form="form" @submit="form.post(route('tasks.store'))"/>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
