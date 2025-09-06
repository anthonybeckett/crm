<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Head, useForm} from '@inertiajs/vue3'

const form = useForm({
	password: '',
})

const submit = () => {
	form.post(route('password.confirm'), {
		onFinish: () => form.reset(),
	})
}
</script>

<template>
	<GuestLayout>
		<Head title="Confirm Password"/>

		<v-container max-width="500" class="mt-10">
			<v-card>
				<v-card-title class="text-h6">Confirm Password</v-card-title>

				<v-card-text>
					<div class="mb-4 text-gray-600">
						This is a secure area of the application. Please confirm your
						password before continuing.
					</div>

					<v-form @submit.prevent="submit">
						<!-- Password -->
						<v-text-field
							v-model="form.password"
							label="Password"
							type="password"
							autocomplete="current-password"
							required
							autofocus
							:error-messages="form.errors.password"
							variant="outlined"
						/>

						<!-- Actions -->
						<div class="flex justify-end mt-4">
							<v-btn
								type="submit"
								color="primary"
								:loading="form.processing"
								:disabled="form.processing"
							>
								Confirm
							</v-btn>
						</div>
					</v-form>
				</v-card-text>
			</v-card>
		</v-container>
	</GuestLayout>
</template>
