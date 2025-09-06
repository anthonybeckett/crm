<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Head, useForm} from '@inertiajs/vue3'

const props = defineProps({
	email: {
		type: String,
		required: true,
	},
	token: {
		type: String,
		required: true,
	},
})

const form = useForm({
	token: props.token,
	email: props.email,
	password: '',
	password_confirmation: '',
})

const submit = () => {
	form.post(route('password.store'), {
		onFinish: () => form.reset('password', 'password_confirmation'),
	})
}
</script>

<template>
	<GuestLayout>
		<Head title="Reset Password"/>

		<v-container max-width="500" class="mt-10">
			<v-card>
				<v-card-title class="text-h6">Reset Password</v-card-title>

				<v-card-text>
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

						<!-- Password -->
						<v-text-field
							v-model="form.password"
							label="Password"
							type="password"
							variant="outlined"
							required
							autocomplete="new-password"
							class="mt-4"
							:error-messages="form.errors.password"
						/>

						<!-- Confirm Password -->
						<v-text-field
							v-model="form.password_confirmation"
							label="Confirm Password"
							type="password"
							variant="outlined"
							required
							autocomplete="new-password"
							class="mt-4"
							:error-messages="form.errors.password_confirmation"
						/>

						<!-- Actions -->
						<div class="flex justify-end mt-4">
							<v-btn
								type="submit"
								color="primary"
								:loading="form.processing"
								:disabled="form.processing"
							>
								Reset Password
							</v-btn>
						</div>
					</v-form>
				</v-card-text>
			</v-card>
		</v-container>
	</GuestLayout>
</template>
