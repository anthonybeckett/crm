<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Head, Link, useForm} from '@inertiajs/vue3'

const form = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: '',
})

const submit = () => {
	form.post(route('register'), {
		onFinish: () => form.reset('password', 'password_confirmation'),
	})
}
</script>

<template>
	<GuestLayout>
		<Head title="Register"/>

		<v-container max-width="500" class="mt-10">
			<v-card>
				<v-card-title class="text-h6">Register</v-card-title>

				<v-card-text>
					<v-form @submit.prevent="submit">
						<v-text-field
							v-model="form.name"
							label="Name"
							type="text"
							autocomplete="name"
							required
							autofocus
							:error-messages="form.errors.name"
							variant="outlined"
						/>

						<v-text-field
							v-model="form.email"
							label="Email"
							type="email"
							autocomplete="username"
							required
							:error-messages="form.errors.email"
							variant="outlined"
						/>

						<v-text-field
							v-model="form.password"
							label="Password"
							type="password"
							autocomplete="new-password"
							required
							:error-messages="form.errors.password"
							variant="outlined"
						/>

						<v-text-field
							v-model="form.password_confirmation"
							label="Confirm Password"
							type="password"
							autocomplete="new-password"
							required
							:error-messages="form.errors.password_confirmation"
							variant="outlined"
						/>

						<div class="flex justify-end items-center mt-4">
							<Link
								:href="route('login')"
								class="text-sm text-gray-600 underline mr-4"
							>
								Already registered?
							</Link>

							<v-btn
								type="submit"
								color="primary"
								:loading="form.processing"
								:disabled="form.processing"
							>
								Register
							</v-btn>
						</div>
					</v-form>
				</v-card-text>
			</v-card>
		</v-container>
	</GuestLayout>
</template>
