<template>
	<GuestLayout>
		<Head title="Log in"/>

		<v-container max-width="400" class="mt-10">
			<v-card>
				<v-card-title class="text-h6">Log in</v-card-title>
				<v-card-text>
					<div v-if="status" class="mb-4 text-green-600">
						{{ status }}
					</div>

					<v-form @submit.prevent="submit">
						<v-text-field
							v-model="form.email"
							label="Email"
							type="email"
							autocomplete="username"
							required
							autofocus
							:error-messages="form.errors.email"
							variant="outlined"
						/>

						<!-- Password -->
						<v-text-field
							v-model="form.password"
							label="Password"
							type="password"
							autocomplete="current-password"
							required
							:error-messages="form.errors.password"
							variant="outlined"
						/>

						<v-checkbox
							v-model="form.remember"
							label="Remember me"
							class="mt-2"
						/>

						<div class="flex justify-end items-center mt-4">
							<Link
								v-if="canResetPassword"
								:href="route('password.request')"
								class="text-sm text-gray-600 underline mr-4"
							>
								Forgot your password?
							</Link>

							<v-btn
								type="submit"
								color="success"
								:loading="form.processing"
								:disabled="form.processing"
							>
								Log in
							</v-btn>
						</div>
					</v-form>
				</v-card-text>
			</v-card>
		</v-container>
	</GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Head, Link, useForm} from '@inertiajs/vue3'
import {route} from "ziggy-js";

defineProps({
	canResetPassword: {
		type: Boolean,
	},
	status: {
		type: String,
	},
})

const form = useForm({
	email: '',
	password: '',
	remember: false,
})

const submit = () => {
	form.post(route('login'), {
		onFinish: () => form.reset('password'),
	})
}
</script>
