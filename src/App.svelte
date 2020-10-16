<script>
	import Form from "./components/Form.svelte";
	import Footer from './components/Footer.svelte'
	import SearchResult from "./components/SearchResult.svelte";
</script>

<style>
	main {
		text-align: center;
		padding: 1em;
		margin: 0 auto;
		background-color: #222;
	}

	h1 {
		color: steelblue;
		text-transform: uppercase;
		font-size: calc(2em + 1vw);
		font-weight: 600;
	}

	h2 {
		color: #b2b2b2;
		font-size: calc(0.5em + 1vw);
	}
	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>

<main>
	<h1>Телефонный справочник</h1>
	<h2>Министерство финансов Астраханской области</h2>
</main>
<Form />
<SearchResult />
<Footer />
