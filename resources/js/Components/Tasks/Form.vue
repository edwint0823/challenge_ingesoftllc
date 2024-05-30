<script>
export default {
    name: "TasksForm"
}
</script>
<script setup>

import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import FormSection from "@/Components/FormSection.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    form: {
        type: Object,
        required: true
    },
    isEdit: {
        type: Boolean,
        required: false,
        default: false
    }
})
defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ isEdit ? 'Edit a task' : 'Create a task' }}
        </template>
        <template #description>
            {{ isEdit ? 'Update the selected task' : 'Create a new task from scratch' }}
        </template>
        <template #form>
            <div class="col-span-3">
                <InputLabel for="title" value="Title"/>
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="title"
                />
                <InputError class="mt-2" :message="$page.props.errors.title"/>
            </div>
            <div class="col-span-3">
                <InputLabel for="description" value="Description"/>
                <TextInput
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="description"
                />
                <InputError class="mt-2" :message="$page.props.errors.description"/>
            </div>
            <div class="col-span-3">
                <InputLabel for="due_date" value="Due Date"/>
                <TextInput
                    id="dueDate"
                    v-model="form.due_date"
                    type="date"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="$page.props.errors.due_date"/>
            </div>
            <div class="col-span-3">
                <InputLabel for="status" value="Status"/>
                <Checkbox id="status" v-model="form.status" :checked="form.status"/>
                <span class="ml-2">¿ Active ?</span>
                <InputError class="mt-2" :message="$page.props.errors.status"/>
            </div>
            <InputError class="mt-2" :message="$page.props.errors.user_id"/>
        </template>
        <template #actions>
            <PrimaryButton>
                {{ isEdit ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>

    </FormSection>
</template>

<style scoped>

</style>
