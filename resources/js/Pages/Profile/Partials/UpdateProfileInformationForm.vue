<template>
	<section>
		<header>
			<h2 class="text-lg font-medium text-gray-900">
				Profile Information
			</h2>

			<p class="mt-1 text-sm text-gray-600">
				Update your account's profile information and email address.
			</p>
		</header>

		<v-form class="mt-4">
			<v-text-field
				v-model="form.name"
				label="Name"
				variant="outlined"
				:error-messages="form.errors.name"
			></v-text-field>

			<v-text-field
				v-model="form.email"
				label="Email"
				variant="outlined"
				:error-messages="form.errors.email"
			></v-text-field>

			<div v-if="mustVerifyEmail && user.email_verified_at === null">
				<p class="mt-2 text-sm text-gray-800">
					Your email address is unverified.
					<Link
						:href="route('verification.send')"
						method="post"
						as="button"
						class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
					>
						Click here to re-send the verification email.
					</Link>
				</p>

				<div
					v-show="status === 'verification-link-sent'"
					class="mt-2 text-sm font-medium text-green-600"
				>
					A new verification link has been sent to your email address.
				</div>
			</div>

			<v-btn variant="outlined" :disabled="form.processing" @click="formSubmit">Save</v-btn>
		</v-form>
	</section>
</template>

<script setup>
import {Link, useForm, usePage} from '@inertiajs/vue3';
import {route} from "ziggy-js";
import {useToast} from "@/Composibles/Generic/useToast.js";

const toast = useToast();

defineProps({
	mustVerifyEmail: {
		type: Boolean,
	},
	status: {
		type: String,
	},
});

const user = usePage().props.auth.user;

const form = useForm({
	name: user.name,
	email: user.email,
});

function formSubmit() {
	form.patch(route('profile.update'), {
		onSuccess: () => toast.success("Successfully updated profile information"),
		onError: () => toast.error("Error updating profile information"),
	})
}
</script>
