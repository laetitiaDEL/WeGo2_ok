<template>
	<div>
		
		<h1>Error404</h1>
		<p>Cette page n'existe pas.</p>

	</div>
</template>

<script lang='js'>

/**
 * This component, (Error404), is used to  display a 
 * 404 error page when the requested page is not found.
 * 
 * 
 * 
 */


import { defineComponent } from 'vue'

export default defineComponent({
	name: 'Error404',
	components: {
	},
	props: {
		// v-model
		modelValue: {
			default: '',
		},
	},
	emits: {
		// v-model event with validation
		'update:modelValue': (value) => value !== null,
	},
	data() {
		return {
		};
	},
	computed: {
		value: {
			get () {
				return this.modelValue;
			},
			set (value) {
				this.$emit('update:modelValue', value);
			},
		},
	},
	watch: {
		modelValue: {
			async handler (_newValue, _oldValue) {
				// do something
			},
			immediate: true
		},
	},
	beforeMount() {
	},
	mounted() {
	},
	updated() {
	},
	beforeUnmount() {
		// stop the wacher on modelValue
		this.$watch('modelValue', () => {}, {});
	},
	methods: {
	},
});
</script>

<style scoped lang="css">
	div{
		height: 100vh;
	}
</style>