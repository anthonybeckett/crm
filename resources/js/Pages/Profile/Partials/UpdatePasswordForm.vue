<template>
    <section class="mt-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Update Password
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Ensure your account is using a long, random password to stay
                secure.
            </p>
        </header>

		<v-form class="mt-4">
			<div>
				<p v-if="form.errors.current_password" class="text-red-500">{{ form.errors.current_password }}</p>
				<v-text-field v-model="form.current_password" label="Password" variant="outlined" type="password"></v-text-field>
			</div>

			<div>
				<p v-if="form.errors.password" class="text-red-500">{{ form.errors.password }}</p>
				<v-text-field v-model="form.password" label="Password" variant="outlined" type="password"></v-text-field>
			</div>

			<div>
				<p v-if="form.errors.password_confirmation" class="text-red-500">{{ form.errors.password_confirmation }}</p>
				<v-text-field v-model="form.password_confirmation" label="Confirm Password" variant="outlined" type="password"></v-text-field>
			</div>

			<v-btn variant="outlined" :disabled="form.processing" @click="updatePassword">Save</v-btn>
		</v-form>
    </section>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3';
import {route} from "ziggy-js";
import {useToast} from "@/Composibles/Generic/useToast.js";

const toast = useToast();

const form = useForm({
	current_password: '',
	password: '',
	password_confirmation: '',
});

const updatePassword = () => {
	form.put(route('password.update'), {
		preserveScroll: true,
		onSuccess: () => {
			form.reset();
			toast.success('Password updated successfully!');
		},
		onError: () => {
			toast.error('Password updated failed!');
		},
	});
};
</script>
