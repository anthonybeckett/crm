<template>
	<section class="space-y-6 mt-4">
		<header>
			<h2 class="text-lg font-medium text-gray-900">
				Delete Account
			</h2>

			<p class="mt-1 text-sm text-gray-600">
				Once your account is deleted, all of its resources and data will
				be permanently deleted. Before deleting your account, please
				download any data or information that you wish to retain.
			</p>
		</header>

		<div class="mt-2">
			<v-btn variant="outlined" color="error" prepend-icon="mdi-delete-forever" @click="toggleModal">
				Delete Account
			</v-btn>
		</div>

		<v-dialog v-model="confirmationModal" max-width="500">
			<v-card>
				<v-card-title class="text-h6">
					Are you sure you want to delete your account?
				</v-card-title>

				<v-card-text>
					<p>
						Once your account is deleted, all of its resources and data will be permanently deleted.
						Please enter your password to confirm you would like to permanently delete your account.
					</p>

					<v-text-field
						v-model="form.password"
						type="password"
						label="Password"
						variant="outlined"
						density="compact"
						:error-messages="form.errors.password"
						@keyup.enter="deleteUser"
						class="mt-4"
					/>
				</v-card-text>

				<v-card-actions class="justify-end">
					<v-btn text @click="toggleModal">Cancel</v-btn>
					<v-btn
						color="error"
						:loading="form.processing"
						:disabled="form.processing"
						@click="deleteUser"
					>
						Delete Account
					</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
	</section>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import {useToast} from "@/Composibles/Generic/useToast.js";
import {route} from "ziggy-js";

const toast = useToast();

const confirmationModal = ref(false);

const form = useForm({
	password: ''
});

function toggleModal() {
	confirmationModal.value = !confirmationModal.value;
}

function deleteUser() {
	form.delete(route('profile.destroy'), {
		preserveScroll: true,
		onSuccess: toggleModal,
		onError: (err) => {
			console.log(err);
			toast.error("There was an error deleting your account.");
		},
		onFinish: () => form.reset(),
	});
}
</script>
