import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Import icons
import '@mdi/font/css/materialdesignicons.css'

const customTheme = {
	dark: false,
	// This is for overriding the theme
	// colors: {
	// 	background: "#000000",
	// 	surface: "#CCC9DC",
	// 	primary: "#324A5F",
	// 	secondary: "#1B2A41",
	// 	accent: "#7D6B91",
	// 	error: "#FF5252",
	// 	info: "#0C1821",
	// 	success: "#4CAF50",
	// 	warning: "#FFC107",
	// },
}

export default createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'light',
		themes: {
			customTheme
		}
    },
})
