<template>
	<!-- Top App Bar -->
	<v-app-bar color="white" elevation="1">
		<!-- Logo -->
		<Link :href="route('home')" class="flex items-center">
			<ApplicationLogo class="h-9 w-auto mr-4"/>
		</Link>

		<!-- Desktop Navigation -->
		<v-toolbar-items class="hidden sm:flex">
			<Link :href="route('home')" class="flex items-center px-4">
				<v-icon class="mr-2">mdi-home</v-icon>
				Home
			</Link>

			<Link :href="route('leads')" class="flex items-center px-4">
				<v-icon class="mr-2">mdi-card-account-details-star-outline</v-icon>
				Leads
			</Link>
		</v-toolbar-items>

		<v-spacer/>

		<!-- User Menu -->
		<v-menu>
			<template #activator="{ props }">
				<v-btn
					v-bind="props"
					variant="text"
					append-icon="mdi-menu-down"
				>
					{{ $page.props.auth.user.name }}
				</v-btn>
			</template>

			<v-list>
				<Link :href="route('profile.edit')" class="flex items-center">
					<v-list-item>
						<v-list-item-title>
							<v-icon class="mr-2">mdi-account</v-icon>
							Profile
						</v-list-item-title>
					</v-list-item>
				</Link>

				<Link :href="route('logout')" method="post" class="flex items-center">
					<v-list-item>
						<v-list-item-title>
							<v-icon class="mr-2">mdi-logout</v-icon>
							Log Out
						</v-list-item-title>
					</v-list-item>
				</Link>
			</v-list>
		</v-menu>

		<!-- Mobile Hamburger -->
		<!--		<v-btn-->
		<!--			class="sm:hidden"-->
		<!--			icon-->
		<!--			@click="drawer = !drawer"-->
		<!--		>-->
		<!--			<v-icon>mdi-menu</v-icon>-->
		<!--		</v-btn>-->
	</v-app-bar>

	<!-- Mobile Navigation Drawer -->
	<v-navigation-drawer
		v-model="drawer"
		temporary
		location="left"
	>
		<v-list>
			<v-list-item :to="route('home')" link>
				<v-list-item-title>Home</v-list-item-title>
			</v-list-item>
		</v-list>

		<v-divider/>

		<v-list>
			<Link :href="route('profile.edit')" class="flex items-center">
				<v-list-item>
					<v-list-item-title>
						<v-icon class="mr-2">mdi-account</v-icon>
						Profile
					</v-list-item-title>
				</v-list-item>
			</Link>

			<Link :href="route('logout')" method="post" class="flex items-center">
				<v-list-item>
					<v-list-item-title>
						<v-icon class="mr-2">mdi-logout</v-icon>
						Log Out
					</v-list-item-title>
				</v-list-item>
			</Link>
		</v-list>
	</v-navigation-drawer>
</template>

<script setup>
import ApplicationLogo from '@/Components/Generic/ApplicationLogo.vue'
import {Link} from '@inertiajs/vue3'
import {ref} from 'vue'

const drawer = ref(false)
</script>
