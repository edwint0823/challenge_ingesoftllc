<script>
export default {
    name: "TasksIndex"
}
</script>
<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";
import {Inertia} from "@inertiajs/inertia";

defineProps({
    tasks: {
        type: Object,
        required: true
    }
})

const deleteTask = (taskId) => {
    if (confirm('Are you sure')) {
        Inertia.delete(route('tasks.destroy', taskId))
    }
}
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create tasks')">
                        <Link :href="route('tasks.create')"
                              class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Create Task
                        </Link>
                    </div>

                    <div class="my-4">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Due Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                                    v-for="task in tasks.data">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ task.title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ task.description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ task.status ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ task.due_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap">
                                            <Link :href="route('tasks.edit', task.id )"
                                                  v-if="$page.props.user.permissions.includes('update tasks')"
                                                  class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                Edit
                                            </Link>
                                            <button @click="deleteTask(task.id)"
                                                    v-if="$page.props.user.permissions.includes('delete tasks')"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Delete
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <Link v-if="tasks.current_page > 1" :href="tasks.prev_page_url"
                              class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Prev
                        </Link>
                        <div v-else></div>
                        <Link v-if="tasks.current_page < tasks.last_page" :href="tasks.next_page_url"
                              class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Next
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
