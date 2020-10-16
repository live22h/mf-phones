<script>
    export let person = {};
</script>

<style>
    .card {
        padding: .5em;
        margin: .5em 0;
        cursor: pointer;
    }

    .card:hover {
        background-color: rgba(0, 132, 255, 0.068);
    }

    * + * {
        margin: 0;
    }
</style>

<div class="card">
    <div class="row">
        <div class="col-9">
            <strong>{person.fam} {person.name} {person.otch}</strong>
            <p>{person.post}</p>
            <p class="text-muted">{person.dept}</p>
        </div>
        <div class="col-3">
                <h1>{person.phone}</h1>
                <p>{(person.email == null ? "" : person.email)}</p>
        </div>  
    </div>
</div>