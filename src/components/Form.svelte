<script>
    import {persons} from '../store.js'
    import {onMount} from 'svelte'

    let fam, name, otch

    $: params = "?fam=" + (fam == null ? "": fam) + "&name=" + (name == null ? "": name) + "&otch=" + (otch == null ? "": otch)

    const handleClick = async() => {
        const url = 'http://dellweb:3003/core/' + params
        let res = await fetch(url)
        res = await res.json()
        $persons = res
    }

</script>

<style>
    input {
        margin: 0 0.5em 0 0;
    }
    button {
        margin-left: -0.5em;
    }
    .container {
        margin-top: 1em;
    }
</style>

<div class="container">
<form>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Фамилия" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4" bind:value={fam}>
        <input type="text" class="form-control" placeholder="Имя" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4" bind:value={name}>
        <input type="text" class="form-control" placeholder="Отчество" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4" bind:value={otch}>
        <div class="input-group-append" id="button-addon4">
          <button class="btn btn-primary" type="button" on:click="{handleClick}">Найти</button>
        </div>
      </div>
</form>
</div>
