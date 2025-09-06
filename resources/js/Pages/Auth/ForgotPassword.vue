<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Head, useForm} from '@inertiajs/vue3'

defineProps({
	status: {
		type: String,
	},
})

const form = useForm({
	email: '',
})

const submit = () => {
	form.post(route('password.email'))
}
</script>

<template>
	<GuestLayout>
		<Head title="Forgot Password"/>

		<v-container max-width="500" class="mt-10">
			<v-card>
				<v-card-title class="text-h6">Forgot Password</v-card-title>

				<v-card-text>
					<div class="mb-4 text-gray-600">
						Forgot your password? No problem. Just let us know your email
						address and we will email you a password reset link that will allow
						you to choose a new one.
					</div>

					<!-- Success status -->
					<div
						v-if="status"
						class="mb-4 text-sm font-medium text-green-600"
					>
						{{ status }}
					</div>

					<v-form @submit.prevent="submit">
						<!-- Email -->
						<v-text-field
							v-model="form.email"
							label="Email"
							type="email"
							variant="outlined"
							required
							autofocus
							autocomplete="username"
							:error-messages="form.errors.email"
						/>

						<!-- Actions -->
						<div class="flex justify-end mt-4">
							<v-btn
								type="submit"
								color="primary"
								:loading="form.processing"
								:disabled="form.processing"
							>
								Email Password Reset Link
							</v-btn>
						</div>
					</v-form>
				</v-card-text>
			</v-card>
		</v-container>
	</GuestLayout>
</template>
