<script setup>
import {computed} from 'vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Head, Link, useForm} from '@inertiajs/vue3'

const props = defineProps({
	status: {
		type: String,
	},
})

const form = useForm({})

const submit = () => {
	form.post(route('verification.send'))
}

const verificationLinkSent = computed(
	() => props.status === 'verification-link-sent'
)
</script>

<template>
	<GuestLayout>
		<Head title="Email Verification"/>

		<v-container max-width="600" class="mt-10">
			<v-card>
				<v-card-title class="text-h6">Email Verification</v-card-title>

				<v-card-text>
					<p class="text-body-2 mb-4">
						Thanks for signing up! Before getting started, could you verify your
						email address by clicking on the link we just emailed to you? If you
						didn't receive the email, we will gladly send you another.
					</p>

					<v-alert
						v-if="verificationLinkSent"
						type="success"
						variant="tonal"
						class="mb-4"
					>
						A new verification link has been sent to the email address you
						provided during registration.
					</v-alert>

					<v-form @submit.prevent="submit">
						<div class="flex justify-between items-center mt-4">
							<v-btn
								type="submit"
								color="primary"
								:loading="form.processing"
								:disabled="form.processing"
							>
								Resend Verification Email
							</v-btn>

							<Link
								:href="route('logout')"
								method="post"
								as="button"
								class="text-sm text-primary underline"
							>
								Log Out
							</Link>
						</div>
					</v-form>
				</v-card-text>
			</v-card>
		</v-container>
	</GuestLayout>
</template>
