<template>
    <v-app>
        <div class="min-h-screen bg-gray-100">
			<NavBar />

            <!-- Page Content -->
            <main class="py-12 mt-6">
                <slot/>

				<v-snackbar v-model="showSnackbar" :color="snackbarColor" timeout="3000" absolute top right>
					{{ snackbarMessage }}
				</v-snackbar>
            </main>
        </div>
    </v-app>
</template>

<script setup>
import NavBar from "@/Components/Generic/Nav/NavBar.vue";
import { ref, provide } from 'vue'

const showSnackbar = ref(false)
const snackbarMessage = ref('')
const snackbarColor = ref('success')

function showToast(message, color = 'success') {
	snackbarMessage.value = message
	snackbarColor.value = color
	showSnackbar.value = true
}

provide('showToast', showToast)
</script>
