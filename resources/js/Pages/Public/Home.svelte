<script>
    import { Alert, Card } from "flowbite-svelte";
    export let message;
</script>

<Card>
    <h1 class="text-3xl font-bold">Welcome Page</h1>
    <Alert>
        <span class="font-medium">Info Alert</span>
        {message}
    </Alert>
</Card>
