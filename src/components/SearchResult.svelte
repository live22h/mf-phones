<script>
    import { persons } from "../store.js";
    import Result from "./Result.svelte";
</script>

<style>
    .search-result {
        position: relative;
        margin-bottom: 60px;
    }
</style>

<div class="container search-result">
    <p>Найдено записей: {$persons.length}</p>
    {#each $persons as person}
        <Result {person} />
    {/each}
</div>