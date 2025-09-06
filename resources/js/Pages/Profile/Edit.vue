<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
		<v-card class=""  title="Profile">
			<template #text>
				<UpdateProfileInformationForm
					:must-verify-email="mustVerifyEmail"
					:status="status"
					class="max-w-xl"
				/>

				<UpdatePasswordForm class="max-w-xl" />

				<DeleteUserForm class="max-w-xl" />
			</template>
		</v-card>
    </AuthenticatedLayout>
</template>
