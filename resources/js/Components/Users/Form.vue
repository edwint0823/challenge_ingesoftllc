<script>
export default {
    name: "UsersForm"
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
            {{ isEdit ? 'Edit a user' : 'Create a user' }}
        </template>
        <template #description>
            {{ isEdit ? 'Update the selected user' : 'Create a new user from scratch' }}
        </template>
        <template #form>
            <div class="col-span-6">
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
            <div class="col-span-3">
                <InputLabel for="email" value="Email"/>
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="$page.props.errors.email"/>
            </div>
            <div class="col-span-3">
                <InputLabel for="password" value="Password"/>
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    :required="!isEdit"
                    autocomplete="new-password"
                />
                <span class="text-xs font-semibold" v-if="isEdit">NOTE: If you do not want to update the password leave this field empty </span>
                <InputError class="mt-2" :message="$page.props.errors.password"/>
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
