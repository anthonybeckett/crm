<template>
    <section class="mt-2">
        <v-table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Primary Contact</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="contact in state.contacts"
                    :key="contact.id"
                >
                    <td>{{ contact.id }}</td>
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.email }}</td>
                    <td>{{ contact.telephone }}</td>
                    <td>{{ contact.primary ? 'Yes' : 'No' }}</td>
                </tr>
            </tbody>
        </v-table>
    </section>
</template>

<script setup>
import { reactive } from 'vue'

const state = reactive({
    contacts: [
        {
            id: 1,
            name: 'John Doe',
            email: 'john.doe@example.com',
            telephone: '07123456789',
            primary: true
        },
        {
            id: 2,
            name: 'Jane Smith',
            email: 'jane.smith@example.com',
            telephone: '01258456789',
            primary: false
        }
    ],
})
</script>