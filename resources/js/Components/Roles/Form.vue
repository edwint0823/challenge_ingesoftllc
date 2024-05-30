<script>
export default {
    name: "RoleForm"
}
</script>
<script setup>

import FormSection from "@/Components/FormSection.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

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
            {{ isEdit ? 'Edit a role' : 'Create a role' }}
        </template>
        <template #description>
            {{ isEdit ? 'Update the selected role' : 'Create a new role from scratch' }}
        </template>
        <template #form>
            <div class="col-span-3">
                <InputLabel for="name" value="Name"/>
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="$page.props.errors.name"/>
            </div>
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
