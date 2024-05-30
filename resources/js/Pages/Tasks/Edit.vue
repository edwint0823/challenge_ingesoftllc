<script>
export default {
    name: "TasksEdit"
}
</script>
<script setup>

import TaskForm from "@/Components/Tasks/Form.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    task: {
        type: Object,
        required: true
    },
    message: {
        type: String,
        required: false,
        default: null
    }
})
const form = useForm({
    title: props.task.title,
    description: props.task.description,
    due_date: props.task.due_date,
    status: props.task.status,
    user_id: props.task.user_id
});
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Task
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <InputError class="mt-2" :message="props.message"/>
                    <TaskForm :form="form" @submit="form.put(route('tasks.update', props.task.id))" :is-edit="true"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
